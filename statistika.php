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

        <title>Statistika stranice</title>
    </head>

    <?php
    require './lgaric.class.php';

    Functions::DostupnostStraniceAdministratori("statistika.php");

    function IspisOdabraneTablice() {
        if (isset($_GET["tablica"])) {
            if ($_GET["tablica"] == "dnevnikrada") {
                $upit = "SELECT * FROM `DnevnikRada`";
                echo Functions::IspisTablice($upit, "DnevnikRada", "Dnevnik rada", 1);
            } elseif ($_GET["tablica"] == "kategorije") {
                $upit = "SELECT * FROM `Kategorije`";
                echo Functions::IspisTablice($upit, "Kategorije", "Popis kategorija", 5);
            } elseif ($_GET["tablica"] == "korisnici") {
                $upit = "SELECT * FROM `Korisnici`";
                echo Functions::IspisTablice($upit, "Korisnici", "Popis korisnika", 1, 5, 9, 10);
            } elseif ($_GET["tablica"] == "moderatorkategorije") {
                $upit = "SELECT * FROM `ModeratorKategorije`";
                echo Functions::IspisTablice($upit, "ModeratorKategorije", "Moderatori kategorija");
            } elseif ($_GET["tablica"] == "natjecanja") {
                $upit = "SELECT * FROM `Natjecanja`";
                echo Functions::IspisTablice($upit, "Natjecanja", "Popis natjecanja", 1, 2, 4);
            } elseif ($_GET["tablica"] == "oglasi") {
                $upit = "SELECT * FROM `Oglasi`";
                echo Functions::IspisTablice($upit, "Oglasi", "Popis svih oglasa", 1, 4, 6, 10);
            } elseif ($_GET["tablica"] == "pitanja") {
                $upit = "SELECT * FROM `Pitanja`";
                echo Functions::IspisTablice($upit, "Pitanja", "Popis pitanja", 2);
            } elseif ($_GET["tablica"] == "pozicijaoglasa") {
                $upit = "SELECT * FROM `PozicijaOglasa`";
                echo Functions::IspisTablice($upit, "PozicijaOglasa", "Popis pozicija oglasa");
            } elseif ($_GET["tablica"] == "sudioniknatjecanja") {
                $upit = "SELECT * FROM `SudionikNatjecanja`";
                echo Functions::IspisTablice($upit, "SudionikNatjecanja", "Popis sudionika natjecanja", 6, 1);
            } elseif ($_GET["tablica"] == "tipkorisnika") {
                $upit = "SELECT * FROM `TipKorisnika`";
                echo Functions::IspisTablice($upit, "TipKorisnika", "Popis tipova korisnika", 2);
            } elseif ($_GET["tablica"] == "tocniodgovori") {
                $upit = "SELECT * FROM `TocniOdgovori`";
                echo Functions::IspisTablice($upit, "TocniOdgovori", "Popis točnih odgovora");
            } elseif ($_GET["tablica"] == "vrsteoglasa") {
                $upit = "SELECT * FROM `VrsteOglasa`";
                echo Functions::IspisTablice($upit, "VrsteOglasa", "Popis vrsta oglasa");
            } elseif ($_GET["tablica"] == "zahtjevizablokiranjeoglasa") {
                $upit = "SELECT * FROM `ZahtjeviZaBlokiranjeOglasa`";
                echo Functions::IspisTablice($upit, "ZahtjeviZaBlokiranjeOglasa", "Popis zahtjeva za blokiranjem oglasa", 3);
            } elseif ($_GET["tablica"] == "stranica") {
                $upit = "SELECT * FROM `Stranica`";
                echo Functions::IspisTablice($upit, "Stranica", "Popis stranica");
            } else {
                // tablica ne postoji
            }
        } else {// default ispis loga
            $upit = "SELECT * FROM `DnevnikRada`";
            echo Functions::IspisTablice($upit, "DnevnikRada", "Dnevnik rada", 1);
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
                <div style="text-align: center;"><div id="naslovnica_border">PHP</div><p class="naslov"> Statistika stranice! </p></div></div>
        </header>

        <section id="natjecanja" class="sectionA sirina">
            <div class="boxBijeli">
                <div class="form">
                    <?php
                    $upit = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'WebDiP2017x044'";
                    echo Functions::IspisiComboBox("statistikaPHPComboBox", "Prikazi tablicu: ", $upit, "Odaberi tablicu", true, true);
                    ?>
                    <div class="gumbi">
                        <a href="" id="statistikaPHPGumb" style="margin-bottom: 0;" class="gumb"> Prikaži tablicu </a>
                        <a href="statistikaAjax.php" style="margin-bottom: 0;" class="gumb"> AJAX </a>
                        <a id="print" class="gumb"> Print </a>
                    </div>
                </div>

<?php IspisOdabraneTablice(); ?>
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
