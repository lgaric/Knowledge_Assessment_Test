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
        <title>Novo natjecanje</title>
    </head>

    <?php
    require './lgaric.class.php';

    Functions::DostupnostStraniceModeratori("novoNatjecanje.php");

    

    $popisGresaka = ""; //globalni popis elemenata s greskom -> za dodavanje klase 

    function ProvjeriPodatke() {
        $greska = "";
        $brojPitanja = 0;
        foreach ($_POST as $kljuc => $vrijednost) { //petlja za svaki element forme
            if (strpos($kljuc, "pitanje") !== false) {
                if ($vrijednost != 0) {
                    $brojPitanja++;
                }
            } elseif (empty($vrijednost)) { // ako je vrijednost elementa prazna
                $greska .= " $kljuc vrijednost nije unesena." . '\n';
                $GLOBALS['popisGresaka'] .= "Element s greskom: " . $kljuc . "<br>";
            } elseif ($kljuc == "opisKategorije") {
                if ($vrijednost{0} !== strtoupper($vrijednost{0}) || strlen($vrijednost) < 15) { // ako je prvo slovo malo ili ima manje od 5 znakova
                    $greska .= "Opis kategorije mora početi s velikim slovom i sadržavati minimalno 15 znakova" . '\n';
                    $GLOBALS['popisGresaka'] .= "Element s greskom: " . $kljuc . "<br>";
                }
            }
        }
        if ($brojPitanja < 5) { // minimalno 5 pitanja
            $greska .= "Odaberite minimalno 5 pitanja" . '\n';
            $GLOBALS['popisGresaka'] .= "Nije odabrano minimalno 5 pitanja";
        }
        if (!empty($greska)) {
            echo "<script>alert('$greska');</script>"; // ispisi sve greske (ako ih ima)
        }
    }

    if (isset($_POST['submit'])) { // pokreni funkciju ako je submit postavljen (kliknut gumb)
        ProvjeriPodatke();
        if (empty($GLOBALS['popisGresaka'])) { //ako nema gresaka zapisi podatke u bazu(Zadatak: 2c)
            $veza = new Baza();
            $veza->spojiDB();

            $nazivNatjecanja = $_POST['nazivNatjecanja'];
            $opisNatjecanja = $_POST['opisNatjecanja'];
            $idKategorije = $_POST['novoPitanjeKategorije'];
            $brojSudionika = $_POST['brojSudionika'];
            $datum = Functions::DohvatiVirtualnoVrijeme();
            $datumOd = $_POST['pocetak'];
            $datumDo = $_POST['kraj'];

            if (isset($_FILES['userfile'])) { // prijenos datoteke na posluzitelj
                $nazivDatoteke = Functions::PrijenosDatoteke();
            }
            $upit = "INSERT INTO `WebDiP2017x044`.`Natjecanja` (`Natjecanja_ID`, `Kategorija_ID`, `Natjecanja_status`, `Natjecanja_naziv`, `Natjecanja_datumKreiranja`, `Natjecanja_opis`, `Natjecanja_od`, `Natjecanja_do`, `Natjecanja_maxSudionika`, `Natjecanja_slika`) VALUES (NULL, '" . $idKategorije . "', '1', '" . $nazivNatjecanja . "', '" . $datum . "', '" . $opisNatjecanja . "', '" . $datumOd . "', '" . $datumDo . "', '" . $brojSudionika . "', '" . $nazivDatoteke . "');";
            $rezultat = $veza->selectDB($upit); // izvrsi upit


            $idNatjecanja = Functions::DohvatiNoviID("Natjecanja");
            foreach ($_POST as $kljuc => $vrijednost) { // unesi pitanja u tablicu
                if (strpos($kljuc, "pitanje") !== false) {
                    if ($vrijednost != 0) {
                        $upit = " INSERT INTO `WebDiP2017x044`.`PitanjaNatjecanja` (`Pitanja_ID` ,`Natjecanja_ID`)VALUES ('$vrijednost', '$idNatjecanja')";
                        $rezultat = $veza->selectDB($upit); // izvrsi upit
                    }
                }
            }
            $korisnik = $_SESSION["korisnik"];
            Functions::PisiULog("Novo natjecanje", "$korisnik je dodao novo natjecanje!");
            $veza->zatvoriDB();
            echo "<script>alert('Natjecanje uspješno kreirano!');</script>";
        }
    }
    ?>
    <body>
        <nav class="navigacija">
            <div class="navigacija_div sirina">
                <ul id="prvi">
                    <li style="padding-right: 40px;" ><a href="index.php"><img id="home" src="Multimedija/Logo_transparent.png" alt="Početna"></a></li>
                    <li class="desktop"><a href="index.php">Kategorije</a></li>
                    <?php Functions::GlavnaNavigacija(); ?>
                </ul>
                <?php Functions::NavigacijaDrugiIzbornik(); ?>
                <img id='menu' src='Multimedija/mobile-menu.png' alt='Mobile menu'>
                <div class='mobile-nav hidden'>
                    <ul id='mobile-nav'>
                        <?php
                        if (isset($_SESSION["korisnik"])) {
                            echo "<li id='imeKorisnika' class='mobile'><div><div style='color: #915047;'>" . $_SESSION["korisnik"] . "</div></div></li>";
                        }
                        ?>
                        <li class="mobile"><a href="index.php">Kategorije</a></li>
<?php Functions::NavigacijaMobile(); ?>
                    </ul>
                </div>
            </div>
        </nav>

        <header>
            <div class="sirina_tekst">
                <div style="text-align: center;">
                    <div id="naslovnica_border">Dobrodošli!</div>
                    <p class="naslov">Novo natjecanje</p>
                </div>
            </div>
        </header>

        <section class="sirina forma">

            <div>
                <form class="form" enctype="multipart/form-data" method="post" name="form1" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <label for="nazivNatjecanja">Naziv natjecanja: </label>
                    <input type="text" id="nazivNatjecanja" autofocus="nazivNatjecanja" name="nazivNatjecanja" size="75" maxlength="75" placeholder="Web dizajn i programiranje" required="required">
                    <?php
                    $tipKorisnika = $_SESSION["tip"];
                    if($tipKorisnika == "1"){
                        $upit = "SELECT `Kategorije_ID`, `Kategorije_naziv` FROM `Kategorije`";
                    }else{
                        $idKorisnika = $_SESSION["id"];
                        $upit = "SELECT `Kategorije_ID`, `Kategorije_naziv` FROM `Kategorije` NATURAL JOIN `ModeratorKategorije` WHERE `Korisnici_ID` = $idKorisnika AND `ModeratorKategorije_do` IS NULL";
                    }
                    echo Functions::IspisiComboBox("novoPitanjeKategorije", "Kategorija natjecanja: ", $upit, "Odaberite kategoriju", true);
                    ?>
                    <label for="brojSudionika">Maximalni broj sudionika: (10-200) </label>
                    <input type="number" id="brojSudionika" name="brojSudionika" min="10" max="200" required="required">
                    <label for="lozinka">Opis natjecanja: </label>
                    <textarea name="opisNatjecanja" id="opisNatjecanja" rows="20" value="-" cols="60" maxlength="600" placeholder="Opis natjecanja"></textarea>
                    <label for="pocetak">Traje od: </label>
                    <input type="datetime-local" id="pocetak" name="pocetak" size="30" placeholder="YYYY-mm-dd HH:mm:ss" required="required">
                    <label for="kraj">Traje do: </label>
                    <input type="datetime-local" id="kraj" name="kraj" placeholder="YYYY-MM-DD HH:mm:ss" size="30">

                    <input type="hidden" name="MAX_FILE_SIZE" value="102400" />
                    Slika natjecanja: [max 100KB]<br><input name="userfile" type="file" />
                    <div id="pitanja"> </div>
                    <div id="gumbi" class="gumbi">
                        <input name="submit" class="gumb" type="submit" value=" Kreiraj natjecanje ">
                    </div>
                </form>
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
