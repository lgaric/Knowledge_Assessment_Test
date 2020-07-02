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
        <title>Nova pozicija oglasa</title>
    </head>

    <?php
    require './lgaric.class.php';

    Functions::DostupnostStraniceAdministratori("novaPozicijaOglasa.php");
    
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

            $nazivPozicijeOglasa = $_POST['nazivPozicijeOglasa'];
            $moderatorPozicije = $_POST['moderatorPozicije'];
            $pozicijaLokacija = $_POST['pozicijaLokacija'];
            
            $upit = " INSERT INTO `WebDiP2017x044`.`PozicijaOglasa` (`PozicijaOglasa_ID` ,`ModeratorKategorije_ID` ,`PozicijaOglasa_lokacija`, `PozicijaOglasa_naziv`)VALUES (NULL , '$moderatorPozicije', '$pozicijaLokacija', '$nazivPozicijeOglasa')";
            $rezultat = $veza->selectDB($upit); // izvrsi upit
            $korisnik = $_SESSION["ime"];
            Functions::PisiULog("Nova pozicija oglasa", "Administrator $korisnik je kreirao novu poziciju oglasa.");
            echo "<script>alert('Nova pozicija oglasa uspješno kreirana!');</script>";
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
                        <?php if (isset($_SESSION["korisnik"])) {
                            echo "<li id='imeKorisnika' class='mobile'><div><div style='color: #915047;'>" . $_SESSION["korisnik"] . "</div></div></li>";
                        }?>
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
                    <p class="naslov">Nova pozicija oglasa</p>
                </div>
            </div>
        </header>

        <section class="sirina forma">

            <div>
                <form class="form" method="post" name="form1" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <label for="nazivPozicijeOglasa">Naziv pozicije: </label>
                    <input type="text" id="nazivPozicijeOglasa" name="nazivPozicijeOglasa" size="75" maxlength="75" placeholder="Pocetna_dolje_lijevo" required="required">
                    <?php
                    $upit = "SELECT `ModeratorKategorije_ID`, `Korisnici_korime` FROM `ModeratorKategorije` NATURAL JOIN `Korisnici` WHERE `TipKorisnika_ID` = '2' GROUP BY `Korisnici_korime`";
                    echo Functions::IspisiComboBox("moderatorPozicije", "Moderator pozicije: ", $upit, "Odaberite moderatora", true);
                    ?>
                     <label for='pozicijaLokacija'>Lokacija pozicije: </label>
                     <select id='pozicijaLokacija' name='pozicijaLokacija'>
                         <option value='' selected='selected'>Odaberite lokaciju</option>
                         <option value='1'>1</option>
                         <option value='2'>2</option>
                         <option value='3'>3</option>
                         <option value='4'>4</option>
                         <option value='5'>5</option>
                         <option value='6'>6</option>
                         <option value='7'>7</option>
                     </select>
                    <div class="gumbi">
                        <input name="submit" class="gumb" type="submit" value=" Kreiraj poziciju oglasa ">
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
