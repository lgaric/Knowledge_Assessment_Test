<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/lgaric.css">
        <link rel="stylesheet" type="text/css" href="CSS/lgaric_prilagodbe.css">
        <meta name="naslov" content="Pocetna stranica">
        <meta name="datum posljednje promjene" content="3.4.2018">
        <meta name="autor" content="Luka Garić">
        <link rel="icon" href="http://webdip.barka.foi.hr/2017_projekti/WebDiP2017x044/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=BioRhyme" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>            
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
        <title>Natjecanje</title>
    </head>

    <?php
    require './lgaric.class.php';
    ProvjeraNatjecanja(); // provjeri da li je natjecanje predano (ako da izracunaj rezultat i upisi u bazu)
    $tocniOdgovori = "";
    
    function ProvjeriDostupnostNatjecanja() {
        if (isset($_GET["idNatjecanja"])) {
            $idNatjecanja = $_GET["idNatjecanja"];
            $veza = new Baza();
            $veza->spojiDB();
            $upit = "SELECT * FROM `Natjecanja` WHERE `Natjecanja_ID` = " . $idNatjecanja; //kod generiran PHPAdminom
            $rezultat = $veza->selectDB($upit);
            while ($red = mysqli_fetch_array(($rezultat))) {
                $maxSudionika = $red[8];
                $brojSudionika = $red[10];
                $natjecanjeOd = $red[6];
                $natjecanjeDo = $red[7];
            }
            if($brojSudionika < $maxSudionika){ // dozvoljeni broj sudionika
                $natjecanjeDostupno = Functions::IspitajVrijeme($natjecanjeOd, $natjecanjeDo);
                if($natjecanjeDostupno === true){
                    IspisiPitanja();
                }else{
                    // zapisi u log pokusaj pristupa natjecanju
                    if(isset($_SESSION['korisnik'])){
                        $korisnik = $_SESSION['korisnik'];
                        Functions::PisiULog("Natjecanje isteklo", "Korisnik $korisnik pokušao pristupiti natjecanju. Vrijeme za natjecanje je isteklo!");
                    }else{
                        Functions::PisiULog("Natjecanje isteklo", "Neregistrirani korisnik pokušao pristupiti natjecanju. Vrijeme za natjecanje je isteklo!");
                    }
                    Functions::UpdateTable("Natjecanja", "Natjecanja_status", 0, $idNatjecanja);
                    echo "<script>alert('Isteklo je vrijeme natjecanja!');window.location = 'index.php';</script>";
                }
            }else{
                if(isset($_SESSION['korisnik'])){
                    $korisnik = $_SESSION['korisnik'];
                    Functions::PisiULog("Natjecanje popunjeno", "Korisnik $korisnik pokušao pristupiti natjecanju. Dosegnut maximalni broj sudionika!");
                }else{
                    Functions::PisiULog("Natjecanje popunjeno", "Neregistrirani korisnik pokušao pristupiti natjecanju. Dosegnut maximalni broj sudionika!");
                }
                Functions::UpdateTable("Natjecanja", "Natjecanja_status", 0, $idNatjecanja);
                echo "<script>alert('Dosegnut maximalni broj sudionika!');window.location = 'index.php';</script>";
            }
            $veza->zatvoriDB();
            return $rezultat;
        }
    }

    function IspisiPitanja() {
        if (isset($_GET["idNatjecanja"])) {
            $idNatjecanja = $_GET["idNatjecanja"];
            $action = $_SERVER['PHP_SELF'] . "?idNatjecanja=" . $idNatjecanja . "&zavrseno=da";
            echo "<div><form novalidate method='post' name='form1' action='$action'>";
            $idNatjecanja = $_GET["idNatjecanja"];
            IspisNatjecanja($idNatjecanja);
            echo "<input name='submit' class='gumb pitanja' type='submit' value=' Predaj odgovore '>
                    </div>
                </form></div>";
        }
    }


    function IspisNatjecanja($idNatjecanja) {
        $rezultat = DohvatiPitanjaPoNatjecanju($idNatjecanja);
        $brojPitanja = 1;
        $datumPocetka = Functions::DohvatiVirtualnoVrijeme();
        Functions::AutoIncrementColumn("Natjecanja", "Natjecanja_brojSudionika", "$idNatjecanja"); // povecaj broj sudionika za 1
        echo "<div class='pitanja_Box'>";
        echo "<div class='pitanja'> <label for='nadimak'>Nadimak na natjecanju: </label>
                    <input type='text' name='nadimak' required='required'></div>
                    <input type='datetime-local' name='pocetak' value='$datumPocetka' class='hidden'>";

        while ($red = mysqli_fetch_array(($rezultat))) { //za svaki red u bazi ispisi pitanje
            echo "<div class='pitanja'> <label for='pitanje$brojPitanja'>$red[4] </label>
                    <input type='text' name='pitanje$brojPitanja' required='required'></div>";
            $brojPitanja++;
        }
        return true;
    }

    function DohvatiPitanjaPoNatjecanju($idNatjecanja) {
        $veza = new Baza();
        $veza->spojiDB();
        $upit = "SELECT * FROM `PitanjaNatjecanja` NATURAL JOIN `Pitanja` WHERE `Natjecanja_ID` = " . $idNatjecanja; //kod generiran PHPAdminom
        $rezultat = $veza->selectDB($upit);
        $veza->zatvoriDB();
        return $rezultat;
    }

    function ProvjeraNatjecanja() {
        if (isset($_GET['zavrseno']) && isset($_POST['submit'])) {
            $idNatjecanja = $_GET['idNatjecanja'];
            $pitanja = DohvatiPitanjaPoNatjecanju($idNatjecanja);
            SpremiRezultat($pitanja);
        }
    }

    function SpremiRezultat($pitanja) {
        $pitanjeBroj = 1;
        $rezultat = 0;
        $brojTocnihOdgovora = 0;
        $brojPitanja = mysqli_num_rows($pitanja);
        if (isset($_SESSION["id"])) {
            $idKorisnika = $_SESSION["id"];
        } else {
            $idKorisnika = 1; // neregistrirani korisnik
        }
        $idNatjecanja = $_GET["idNatjecanja"];
        $nadimak = $_POST["nadimak"];
        $vrijemePocetka = $_POST["pocetak"];
        var_dump($vrijemePocetka);
        $vrijemeZavrsetka = Functions::DohvatiVirtualnoVrijeme();

        while ($red = mysqli_fetch_array(($pitanja))) { // dohvati pitanja i ispitaj tocnost odgovora
            $tocniOdgovori1 = $red[6]; // tocni odgovori
            $tocniOdgovori2 = $red[7]; // tocni odgovori
            $tocniOdgovori3 = $red[8]; // tocni odgovori
            $tocniOdgovori4 = $red[9]; // tocni odgovori
            $trenutnoPitanje = "pitanje" . $pitanjeBroj;  // kljuc pitanja 
            $pitanjeZaIspitati = $_POST["$trenutnoPitanje"]; // vrijednost pitanja
            if ($pitanjeZaIspitati == $tocniOdgovori1 || $pitanjeZaIspitati == $tocniOdgovori2 || $pitanjeZaIspitati == $tocniOdgovori3 || $pitanjeZaIspitati == $tocniOdgovori4) {
                $rezultat = $rezultat + $red[10];
                $brojTocnihOdgovora++;
            }
            $pitanjeBroj++;
        }
        $tocniOdgovori = $brojTocnihOdgovora . "/" . $brojPitanja;

        ProvjeriPodatke();  // sva polja moraju biti unešena!
        if (empty($GLOBALS['popisGresaka'])) { //ako nema gresaka zapisi podatke u bazu
            $veza = new Baza();
            $veza->spojiDB();
            $upit = " INSERT INTO `WebDiP2017x044`.`SudionikNatjecanja` (`SudionikNatjecanja_ID`, `Korisnici_ID` ,`Natjecanje_ID` ,`SudionikNatjecanja_nadimak` ,`SudionikNatjecanja_rezultat` ,`SudionikNatjecanja_tocniOdgovori` ,`SudionikNatjecanja_pocetakRjesavanja` ,`SudionikNatjecanja_zavrsetakRjesavanja`)VALUES (NULL, '$idKorisnika', '$idNatjecanja', '$nadimak', '$rezultat' , '$tocniOdgovori' , '$vrijemePocetka' , '$vrijemeZavrsetka');";
            $rezultat = $veza->selectDB($upit); // izvrsi upit
            $veza->zatvoriDB();
            header("Location: statistikaNatjecanja.php?idNatjecanja=$idNatjecanja");
        }
    }

    $popisGresaka = ""; //globalni popis elemenata s greskom -> za dodavanje klase 
    function ProvjeriPodatke() {
        $greska = "";
        foreach ($_POST as $kljuc => $vrijednost) { //petlja za svaki element forme
            if($kljuc == "pocetak"){
                // ne radi ništa
            }elseif (empty($vrijednost)) { // ako je vrijednost elementa prazna
                $greska .= " $kljuc vrijednost nije unesena." . '\n';
                global $popisGresaka;
                $popisGresaka .= "Element s greskom: " . $kljuc . "<br>";
            }
        }
        if (!empty($greska)) {
            echo "<script>alert('$greska');</script>"; // ispisi sve greske (ako ih ima)
        }
    }

    function SpremiPodatkeUBazu() {
        $rezultat = ProvjeriPodatke();
        if (empty($GLOBALS['popisGresaka'])) { //ako nema gresaka zapisi podatke u bazu(Zadatak: 2c)
            $veza = new Baza();
            $veza->spojiDB();
            $nadimakSudionika = $_POST['nadimak'];
            if (isset($_SESSION["id"])) {
                $idKorisnika = $_SESSION["id"];
            } else {
                $idKorisnika = 1; // neregistrirani korisnik
            }
            $idNatjecanja = $_GET["idNatjecanja"];
            $vrijemePocetka = date("H:i:s");
            $vrijemeZavrsetka = date("H:i:s");

            if ($rezultat > 1) {
                $tocniOdgovori = $rezultat / 5;
            } else {
                $tocniOdgovori = 0;
            }

            $upit = " INSERT INTO `WebDiP2017x044`.`SudionikNatjecanja` (`Korisnici_ID` ,`Natjecanje_ID` ,`SudionikNatjecanja_nadimak` ,`SudionikNatjecanja_rezultat` ,`SudionikNatjecanja_tocniOdgovori` ,`SudionikNatjecanja_pocetakRjesavanja` ,`SudionikNatjecanja_zavrsetakRjesavanja`)VALUES ('$idKorisnika', '$idNatjecanja', '$nadimakSudionika', '$rezultat' , '$tocniOdgovori' , '$vrijemePocetka' , '$vrijemeZavrsetka');";
            $rezultat = $veza->selectDB($upit); // izvrsi upit
            $veza->zatvoriDB();
            header("Location: index.php");
        }
    }
    ?>

    <body>
        <nav class="navigacija">
            <div class="navigacija_div sirina">
                <ul id="prvi">
                    <li style="padding-right: 40px;" ><a href="index.php"><img id="home" src="Multimedija/Logo_transparent.png" alt="Početna"></a></li>
                    <?php Functions::GlavnaNavigacija(); ?>
                </ul>
                <?php Functions::NavigacijaDrugiIzbornik(); ?>
                <img id='menu' src='Multimedija/mobile-menu.png' alt='Mobile menu'>
                <div class='mobile-nav hidden'>
                    <ul id='mobile-nav'>
                        <?php if (isset($_SESSION["korisnik"])) {
                            echo "<li id='imeKorisnika' class='mobile'><div><div style='color: #915047;'>" . $_SESSION["korisnik"] . "</div></div></li>";
                        }?>
                        <?php Functions::NavigacijaMobile(); ?>
                    </ul>
                </div>
            </div>
        </nav>

        <header>
            <div class="sirina_tekst">
                <div style="text-align: center;"><div id="naslovnica_border">Molimo odgovorite na sva pitanja!</div><p class="naslov"> SRETNO! </p></div></div>
        </header>

        <section id="natjecanja" class="sectionA sirina">
            <div class="forma">
                <?php ProvjeriDostupnostNatjecanja(); ?>
            </div>
        </section>

        <footer class="footer sirina">
            <div id="footer_div">
                <div id="autor">Autor stranice</div>
                <address>Kontakt: <a href="mailto:lgaric@foi.hr">Luka Garić</a></address>
                <p>&copy; 2018 L.Garić</p>
            </div>
            <div style="text-align: center">
                <a class="validate" href="http://validator.w3.org/check?uri=referer">
                    <figure>
                        <img src="Multimedija/HTML5.png" alt="HTML5" height="75" width="75">
                        <figcaption>Validate</figcaption>
                    </figure>
                </a>
                <a class="validate" href="https://jigsaw.w3.org/css-validator/validator?uri=<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
                    <figure>
                        <img src="Multimedija/CSS3.png" alt="CSS3" height="75" width="75">
                        <figcaption>Validate</figcaption>
                    </figure>
                </a>
            </div>
        </footer>
        <script src="JS/lgaric.js" type="text/javascript"></script>
    </body>
</html>
