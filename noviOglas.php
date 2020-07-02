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
        <title>Novi oglas</title>
    </head>

    <?php
    require './lgaric.class.php';

    Functions::DostupnostStraniceRegistrirani("noviOglas.php");
    
    $popisGresaka = ""; //globalni popis elemenata s greskom -> za dodavanje klase 

    function ProvjeriPodatke() {
        $greska = "";
        foreach ($_POST as $kljuc => $vrijednost) { //petlja za svaki element forme
            if (empty($vrijednost)) { // ako je vrijednost elementa prazna
                $greska .= " $kljuc vrijednost nije unesena." . '\n';
                $GLOBALS['popisGresaka'] .= "Element s greskom: " . $kljuc . "<br>";
            }
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

            $nazivOglasa = $_POST['nazivOglasa'];
            $VrsteOglasa = $_POST['VrsteOglasa'];
            $idKorisnika = $_SESSION['id'];
            $datum = Functions::DohvatiVirtualnoVrijeme();
            $opisOglasa = $_POST['opisOglasa'];
            $urlOglasa = $_POST['urlOglasa'];
            
            if (isset($_FILES['userfile'])) { // prijenos datoteke na posluzitelj
                $nazivDatoteke = Functions::PrijenosDatoteke();
            }
            
            $upit = " INSERT INTO `WebDiP2017x044`.`Oglasi` (`Oglasi_ID` ,`VrstaOglasa_ID` ,`Korisnici_ID` ,`Oglasi_naziv` ,`Oglasi_datumKreiranja` ,`Oglasi_opis` ,`Oglasi_URL` ,`Oglasi_odobren` ,`Oglasi_blokiran` ,`Oglasi_brojKlikova` ,`Oglasi_slika`)VALUES (NULL , '$VrsteOglasa', '$idKorisnika', '$nazivOglasa', '$datum', '$opisOglasa', '$urlOglasa' , '0', '0', '0', '$nazivDatoteke')";
            $rezultat = $veza->selectDB($upit); // izvrsi upit
            $korisnik = $_SESSION["korisnik"];
            Functions::PisiULog("Novi oglas", "Korisnik $korisnik je poslao zahtjev za kreiranje novog oglasa.");
            echo "<script>alert('Zahtjev za kreiranje oglasa je poslan moderatorima na procjenu!');</script>";
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
                        <?php
                        if (isset($_SESSION["korisnik"])) {
                            echo "<li id='imeKorisnika' class='mobile'><div><div style='color: #915047;'>" . $_SESSION["korisnik"] . "</div></div></li>";
                        }
                        ?>
<?php Functions::NavigacijaMobile(); ?>
                    </ul>
                </div>
            </div>
        </nav>

        <header>
            <div class="sirina_tekst">
                <div style="text-align: center;">
                    <div id="naslovnica_border">Molimo Vas da popunite sva polja!</div>
                    <p class="naslov">Novi oglas</p>
                </div>
            </div>
        </header>

        <section class="sirina forma">

            <div>
                <form class="form" enctype="multipart/form-data" method="post" name="form1" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <label for="nazivOglasa">Naziv oglasa: </label>
                    <input type="text" id="nazivOglasa" name="nazivOglasa" size="75" maxlength="75" placeholder="Samsung S8" required="required">
                    <?php
                    $upit = "SELECT `PozicijaOglasa_ID`, `PozicijaOglasa_naziv` FROM `PozicijaOglasa`";
                    echo Functions::IspisiComboBox("pozicijaOglasaComboBox", "Lokacija oglasa: ", $upit, "Odaberite lokaciju oglasa", true);
                    ?>
                    <div id="vrstaOglasa">
                        <?php
                        $upit = "SELECT `VrsteOglasa_ID`, `VrsteOglasa_naziv` FROM `VrsteOglasa`";
                        echo Functions::IspisiComboBox("VrsteOglasa", "Vrsta oglasa: ", $upit, "Odaberite vrstu oglasa", true);
                        ?>
                    </div>
                    <label for="opisOglasa">Opis oglasa: </label>
                    <textarea name="opisOglasa" id="opisOglasa" rows="20" cols="60" maxlength="600" placeholder="Opis oglasa"></textarea>
                    <label for="urlOglasa">Url oglasa: </label>
                    <input type="text" id="urlOglasa" name="urlOglasa" size="100" maxlength="100" placeholder="http://www.google.hr">
                    <input type="hidden" name="MAX_FILE_SIZE" value="102400" />
                    Slika oglasa: <i>[max: 100kB]</i><br><input name="userfile" type="file" />
                    <div class="gumbi">
                        <input name="submit" class="gumb" type="submit" value=" Kreiraj oglas ">
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
