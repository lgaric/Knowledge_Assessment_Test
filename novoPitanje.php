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
        <title>Novo pitanje</title>
    </head>

    <?php
    require './lgaric.class.php';

    Functions::DostupnostStraniceModeratori("novoPitanje.php");

    $popisGresaka = ""; //globalni popis elemenata s greskom -> za dodavanje klase 

    function ProvjeriPodatke() {
        $greska = "";
        foreach ($_POST as $kljuc => $vrijednost) { //petlja za svaki element forme
            if($kljuc=="hint"){
                //hint može biti null
            }elseif (empty($vrijednost)) { // ako je vrijednost elementa prazna
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

            $pitanje = $_POST['pitanje'];
            $hint = $_POST['hint'];
            $idKategorije = $_POST['Kategorije'];
            $idKorisnika = $_SESSION["id"];
            $bodovi = $_POST['bodovi'];
            

            $odgovor1 = $_POST['odgovor1'];
            $odgovor2 = $_POST['odgovor2'];
            $odgovor3 = $_POST['odgovor3'];
            $odgovor4 = $_POST['odgovor4'];
            if ($odgovor2 != "-" && $odgovor3 != "-" && $odgovor4 != "-") {
                $upit = "INSERT INTO `WebDiP2017x044`.`Pitanja` (`Pitanja_ID`, `Kategorije_ID`, `Korisnici_ID`, `Pitanja_pitanje`, `Pitanja_hint`, `Pitanja_odgovor1`, `Pitanja_odgovor2`, `Pitanja_odgovor3`, `Pitanja_odgovor4`, `Pitanja_bodovi`) VALUES (NULL, '" . $idKategorije . "', '" . $idKorisnika . "', '" . $pitanje . "', '" . $hint . "', '" . $odgovor1 . "', '" . $odgovor2 . "', '" . $odgovor3 . "', '" . $odgovor4 . "', '" . $bodovi . "');";
                $rezultatUnosaModeratora1 = $veza->selectDB($upit); // izvrsi upit
            } elseif ($odgovor2 != "-" && $odgovor3 != "-") {
                $upit = "INSERT INTO `WebDiP2017x044`.`Pitanja` (`Pitanja_ID`, `Kategorije_ID`, `Korisnici_ID`, `Pitanja_pitanje`, `Pitanja_hint`, `Pitanja_odgovor1`, `Pitanja_odgovor2`, `Pitanja_odgovor3`, `Pitanja_bodovi`) VALUES (NULL, '" . $idKategorije . "', '" . $idKorisnika . "', '" . $pitanje . "', '" . $hint . "', '" . $odgovor1 . "', '" . $odgovor2 . "', '" . $odgovor3 . "', '" . $bodovi . "');";
                $rezultatUnosaModeratora1 = $veza->selectDB($upit); // izvrsi upit
            } elseif ($odgovor2 != "-") {
                $upit = "INSERT INTO `WebDiP2017x044`.`Pitanja` (`Pitanja_ID`, `Kategorije_ID`, `Korisnici_ID`, `Pitanja_pitanje`, `Pitanja_hint`, `Pitanja_odgovor1`, `Pitanja_odgovor2`, `Pitanja_bodovi`) VALUES (NULL, '" . $idKategorije . "', '" . $idKorisnika . "', '" . $pitanje . "', '" . $hint . "', '" . $odgovor1 . "', '" . $odgovor2 . "', '" . $bodovi . "');";
                $rezultatUnosaModeratora1 = $veza->selectDB($upit); // izvrsi upit
            } else {
                $upit = "INSERT INTO `WebDiP2017x044`.`Pitanja` (`Pitanja_ID`, `Kategorije_ID`, `Korisnici_ID`, `Pitanja_pitanje`, `Pitanja_hint`, `Pitanja_odgovor1`, `Pitanja_bodovi`) VALUES (NULL, '" . $idKategorije . "', '" . $idKorisnika . "', '" . $pitanje . "', '" . $hint . "', '" . $odgovor1 . "', '" . $bodovi . "');";
                $rezultatUnosaModeratora1 = $veza->selectDB($upit); // izvrsi upit
            }
            $korisnik = $_SESSION["korisnik"];
            Functions::PisiULog("Novo pitanje", "$korisnik je dodao novo pitanje!");
            $veza->zatvoriDB();
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
                    <p class="naslov">Novo pitanje</p>
                </div>
            </div>
        </header>

        <section class="sirina forma">

            <div>
                <form class="form" method="post" name="form1" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <label for="pitanje">Pitanje: </label>
                    <input type="text" id="pitanje" autofocus="autofocus" name="pitanje" size="200" maxlength="200" placeholder="Tko je izumio World Wide Web?" required="required">
<?php
$idKorisnika = $_SESSION["id"];
$upit = "SELECT `Kategorije_ID`, `Kategorije_naziv` FROM `Kategorije` NATURAL JOIN `ModeratorKategorije` WHERE `Korisnici_ID` = $idKorisnika AND `ModeratorKategorije_do` IS NULL";
echo Functions::IspisiComboBox("Kategorije", "Kategorija pitanja: ", $upit, "Odaberite kategoriju", true);
?>
                    <label for="hint">Hint: </label>
                    <input type="text" id="hint" name="hint" size="200" maxlength="200" placeholder="Znanstvenik CERN instituta u Švicarskoj">
                    <label for="bodovi">Bodovi: (1-20) </label>
                    <input type="number" id="bodovi" name="bodovi" min="1" max="20" required="required">
                    <label for="odgovor1">Prvi odgovor: </label>
                    <input type="text" id="odgovor1" name="odgovor1" size="100" maxlength="100" placeholder="Tim-Berners-Lee" required="required">
                    <label for="odgovor2">Drugi odgovor: </label>
                    <input type="text" id="odgovor2" name="odgovor2" size="100" maxlength="100" value="-">
                    <label for="odgovor3">Treći odgovor: </label>
                    <input type="text" id="odgovor3" name="odgovor3" size="100" maxlength="100" value="-">
                    <label for="odgovor4">Četvrti odgovor: </label>
                    <input type="text" id="odgovor4" name="odgovor4" size="100" maxlength="100" value="-">
                    <div class="gumbi">
                        <input name="submit" class="gumb" type="submit" value=" Dodaj pitanje ">
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
