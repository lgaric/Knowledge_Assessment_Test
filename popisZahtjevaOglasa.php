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
        <title>Popis zahtjeva za oglase</title>
    </head>

    <?php
    require './lgaric.class.php';

    Functions::DostupnostStraniceModeratori("popisZahtjevaOglasa.php");
    ?>
    <body>
        <nav class="navigacija">
            <div class="navigacija_div sirina">
                <ul id="prvi">
                    <li style="padding-right: 40px;" ><a href="index.php"><img id="home" src="Multimedija/Logo_transparent.png" alt="Početna"></a></li>
                    <li class="desktop"><a href="index.php">Kategorije</a></li>
                    <li class="desktop"><a href="novaVrstaOglasa.php">Nova vrsta oglasa</a></li>
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
                        <li class="mobile"><a href="novaVrstaOglasa.php">Nova vrsta oglasa</a></li>
                        <?php Functions::NavigacijaMobile(); ?>
                    </ul>
                </div>
            </div>
        </nav>

        <header>
            <div class="sirina_tekst">
                <div style="text-align: center;"><div id="naslovnica_border">OGLASI</div><p class="naslov"> Zahtjevi vezani uz oglase! </p></div></div>
        </header>

        <section id="natjecanja" class="sectionA sirina">
            <div class="boxBijeli">
                
                <div class="naslov ravno border_bottom paddingTop"> Zahtjevi za izdavanje oglasa </div>
                <div class="form">
                    <?php
                    $upit = "SELECT `Oglasi_ID`, `Oglasi_naziv` FROM `Oglasi` WHERE `Oglasi_odobren` = '0' AND `Oglasi_blokiran` = '0'";
                    echo Functions::IspisiComboBox("oglasiOznaci", "Oglas: ", $upit, "Odaberite oglas");
                    ?>

                    <div class="gumbi">
                        <a id="odobriOglas" style="margin-bottom: 0;" class="gumb" href="">Odobri</a>
                        <a id="blokirajOglas" class="gumb" href="">Blokiraj</a>
                    </div>
                </div>
                <?php
                    $upit = "SELECT * FROM `Oglasi` WHERE `Oglasi_odobren` = '0' AND `Oglasi_blokiran` = '0'";
                    echo Functions::IspisTablice($upit, "Oglasi", "Zahtjevi za oglase", 1, 5, 7, 8) ?>

                
                <div class="naslov ravno border_bottom paddingTop"> Zahtjevi za blokiranje oglasa </div>
                <div class="form">
                    <?php
                    $upit = "SELECT `ZahtjeviZaBlokiranjeOglasa_ID`, `Oglasi_naziv` FROM `ZahtjeviZaBlokiranjeOglasa` z JOIN `Oglasi` o ON .z.`Oglasi_ID` = o.`Oglasi_ID` WHERE `Zahtjev_zahtjevPregledan` = '0'";
                    echo Functions::IspisiComboBox("zahtjevOznaci", "Zahtjev: ", $upit, "Odaberite zahtjev");
                    ?>

                    <div class="gumbi">
                        <a id="odobriZahtjev" style="margin-bottom: 0;" class="gumb" href="">Odobri zahtjev</a>
                        <a id="blokirajZahtjev" class="gumb" href="">Izbriši zahtjev</a>
                    </div>
                </div>
                <?php
                    $upit = "SELECT * FROM `ZahtjeviZaBlokiranjeOglasa` WHERE `Zahtjev_zahtjevPregledan` = '0'";
                    echo Functions::IspisTablice($upit, "ZahtjeviZaBlokiranjeOglasa", "Opis zahtjeva za blokiranje", 5, 6) ?>

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
