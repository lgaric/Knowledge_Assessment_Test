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
        <title>Nova kategorija</title>
    </head>

    <?php
    require './lgaric.class.php';

    $popisGresaka = ""; //globalni popis elemenata s greskom -> za dodavanje klase 

    function ProvjeriPodatke() {
        $greska = "";
        foreach ($_POST as $kljuc => $vrijednost) { //petlja za svaki element forme
            if (empty($vrijednost)) { // ako je vrijednost elementa prazna
                $greska .= " $kljuc vrijednost nije unesena." . '\n';
                $GLOBALS['popisGresaka'] .= "Element s greskom: " . $kljuc . "<br>";
            } elseif ($kljuc == "opisKategorije") {
                if ($vrijednost{0} !== strtoupper($vrijednost{0}) || strlen($vrijednost) < 15) { // ako je prvo slovo malo ili ima manje od 5 znakova
                    $greska .= "Opis kategorije mora početi s velikim slovom i sadržavati minimalno 15 znakova" . '\n';
                    $GLOBALS['popisGresaka'] .= "Element s greskom: " . $kljuc . "<br>";
                }
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

            $nazivKategorije = $_POST['nazivKategorije'];
            $opisKategorije = $_POST['opisKategorije'];
            $datum = Functions::DohvatiVirtualnoVrijeme();
            if (isset($_FILES['userfile'])) { // prijenos datoteke na posluzitelj
                $nazivDatoteke = Functions::PrijenosDatoteke();
            }
            $upit = "INSERT INTO `WebDiP2017x044`.`Kategorije` (`Kategorije_ID`, `Kategorije_naziv`, `Kategorije_datumKreiranja`, `Kategorije_opis`, `Kategorije_slika`, `Kategorije_aktivna`) VALUES (NULL, '" . $nazivKategorije . "', '" . $datum . "', '" . $opisKategorije . "', '" . $nazivDatoteke . "', '1');";
            $rezultat = $veza->selectDB($upit); // izvrsi upit
            
            $korisnik = $_SESSION["ime"];
            Functions::PisiULog("Nova kategorija", "Administrator $korisnik je kreirao novu kategoriju.");
            
            $IDKategorije = Functions::DohvatiNoviID("Kategorije");
            
            // Unos prvog moderatora
            $idKorisnika1 = $_POST['Moderator1'];
            $upit = "INSERT INTO `WebDiP2017x044`.`ModeratorKategorije` (`ModeratorKategorije_ID`, `Kategorije_ID`, `Korisnici_ID`, `ModeratorKategorije_od`, `ModeratorKategorije_do`) VALUES (NULL, '" . $IDKategorije . "', '" . $idKorisnika1 . "', '" . $datum . "', NULL);";
            $rezultatUnosaModeratora1 = $veza->selectDB($upit); // izvrsi upit
            $postaviModeratora = "UPDATE `WebDiP2017x044`.`Korisnici` SET `TipKorisnika_ID` = '2' WHERE `Korisnici`.`Korisnici_ID` = " . $idKorisnika1 . ";";
            $update = $veza->selectDB($postaviModeratora); // izvrsi upit
            
            // Unos drugog moderatora
            if($_POST['Moderator2'] != -1){
                $idKorisnika2 = $_POST['Moderator2'];
            $upit = "INSERT INTO `WebDiP2017x044`.`ModeratorKategorije` (`ModeratorKategorije_ID`, `Kategorije_ID`, `Korisnici_ID`, `ModeratorKategorije_od`, `ModeratorKategorije_do`) VALUES (NULL, '" . $IDKategorije . "', '" . $idKorisnika2 . "', '" . $datum . "', NULL);";
            $rezultatUnosaModeratora2 = $veza->selectDB($upit); // izvrsi upit
            $postaviModeratora = "UPDATE `WebDiP2017x044`.`Korisnici` SET `TipKorisnika_ID` = '2' WHERE `Korisnici`.`Korisnici_ID` = " . $idKorisnika2 . ";";
            $update = $veza->selectDB($postaviModeratora); // izvrsi upit
            }
            
            // Unos trećeg moderatora 
            if($_POST['Moderator3'] != -1){
                $idKorisnika3 = $_POST['Moderator3'];
            $upit = "INSERT INTO `WebDiP2017x044`.`ModeratorKategorije` (`ModeratorKategorije_ID`, `Kategorije_ID`, `Korisnici_ID`, `ModeratorKategorije_od`, `ModeratorKategorije_do`) VALUES (NULL, '" . $IDKategorije . "', '" . $idKorisnika3 . "', '" . $datum . "', NULL);";
            $rezultatUnosaModeratora3 = $veza->selectDB($upit); // izvrsi upit
            $postaviModeratora = "UPDATE `WebDiP2017x044`.`Korisnici` SET `TipKorisnika_ID` = '2' WHERE `Korisnici`.`Korisnici_ID` = " . $idKorisnika3 . ";";
            $update = $veza->selectDB($postaviModeratora); // izvrsi upit
            }
            $veza->zatvoriDB();
            echo "<script>alert('Kategorija uspješno kreirana! Odabrani korisnici su sada moderatori kategorije $nazivKategorije!');</script>";
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
                    <p class="naslov">Nova kategorija</p>
                </div>
            </div>
        </header>

        <section class="sirina forma">

            <div>
                <form novalidate class="form" enctype="multipart/form-data" method="post" name="form1" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <label for="nazivKategorije">Naziv kategorije: </label>
                    <input type="text" id="nazivKategorije" autofocus="autofocus" name="nazivKategorije" size="75" maxlength="75" placeholder="Informatika" required="required">
                    <?php
                    $upit = "SELECT `Korisnici_ID`, `Korisnici_korime` FROM `Korisnici`";
                    echo Functions::IspisiComboBox("Moderator1", "Odaberite prvog moderatora", $upit, "Prvi moderator", true);
                    echo Functions::IspisiComboBox("Moderator2", "Odaberite drugog moderatora", $upit, "Drugi moderator");
                    echo Functions::IspisiComboBox("Moderator3", "Odaberite trećeg moderatora", $upit, "Treci moderator");
                    ?>
                    <label for="opisKategorije">Opis kategorije: </label>
                    <textarea name="opisKategorije" id="opisKategorije" rows="20" cols="60" maxlength="600" placeholder="Opis kategorije"></textarea>
                    <input type="hidden" name="MAX_FILE_SIZE" value="102400" />
                    Slika kategorije: <i>[max: 100kB]</i><br><input name="userfile" type="file" />
                    <div class="gumbi">
                        <input name="submit" class="gumb" type="submit" value=" Kreiraj kategoriju ">
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
