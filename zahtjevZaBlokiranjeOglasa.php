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
        <title>Zahtjev za blokiranje oglasa</title>
    </head>

    <?php
    require './lgaric.class.php';

    Functions::DostupnostStraniceRegistrirani("zahtjevZaBlokiranjeOglasa.php");

    if (isset($_POST['submit'])) {
        $idOglasa = $_POST['idOglasa'];
        $razlog = $_POST['razlogBlokiranja'];
        $datum = Functions::DohvatiVirtualnoVrijeme();
        $idKorisnika = $_SESSION['id'];
        $korisnik = $_SESSION['korisnik'];

        $veza = new Baza();
        $veza->spojiDB();

        $upit = " INSERT INTO `WebDiP2017x044`.`ZahtjeviZaBlokiranjeOglasa` (`ZahtjeviZaBlokiranjeOglasa_ID` , `Oglasi_ID` , `Korisnici_ID` , `Zahtjev_datumZahtjeva` , `Zahtjev_razlog` ,`Zahtjev_zahtjevOdobren`, `Zahtjev_zahtjevPregledan`)VALUES (NULL , '" . $idOglasa . "', '" . $idKorisnika . "', '" . $datum . "', '" . $razlog . "', NULL, '0');";  //kod generiran PHPAdminom
        Functions::PisiULog("Zahtjev za blokiranje oglasa", "Korisnik $korisnik poslao zahtjev za blokiranje oglasa.");
        $rezultat = $veza->selectDB($upit); // izvrsi upit
        $veza->zatvoriDB();
        echo "<script>alert('Vasa prijava ce biti razmotrena od strane moderatora. Hvala!');window.location = 'index.php';</script>";
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
                    <div id="naslovnica_border">Dobrodošli!</div>
                    <p class="naslov">Zahtjev za blokiranje oglasa</p>
                </div>
            </div>
        </header>

        <section class="sirina forma">
            <div>
                <form class="form" method="post" name="form1" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <input type='number' name='idOglasa' value='<?php if (isset($_GET['id'])) {
                        echo $_GET['id'];
                    } ?>' class='hidden'>
                    <label for="razlogBlokiranja">Razlog: </label>
                    <textarea name="razlogBlokiranja" id="razlogBlokiranja" rows="30" cols="60" maxlength="580" placeholder="Unesite razlog blokiranja oglasa"></textarea>
                    <div class="gumbi">
                        <input name="submit" class="gumb" type="submit" value=" Pošalji zahtjev ">
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
