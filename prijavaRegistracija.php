<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

function Title() {
    if (isset($_GET["mod"])) {
        if ($_GET["mod"] == "prijava") {
            echo "Prijava";
        } elseif ($_GET["mod"] == "registracija") {
            echo "Registracija";
        }
    }
}
?>
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
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>            
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
        <title><?php Title(); ?></title>
    </head>

    <?php
    require './lgaric.class.php';

    $mod = "prijava"; //default mod je prijava
    if (isset($_GET["mod"])) { //ako je postavljen putem php?mod= ... dohvati tu vrijednost
        $mod = $_GET["mod"];
    }


    function Odjava() { // ako je mod odjava
        if (isset($_GET["mod"]) && $_GET["mod"] == "odjava") {
            $korisnik = $_SESSION["korisnik"];
            Functions::PisiULog("Odjava", "$korisnik se uspješno odjavio!");
            Sesija::obrisiSesiju();
            header('Location: index.php');
        }
    }

    Odjava();

    function KorisnikPrijavljen() {
        if (isset($_SESSION["korisnik"])) {
            echo "<script>alert('Već ste prijavljeni!');window.location = 'index.php';</script>";
        }
    }

    KorisnikPrijavljen();

    function IspisAktivacijeRacuna() {
        if (isset($_GET['aktivacija'])) {
            if ($_GET['aktivacija'] == 'uspjesna') {
                echo 'Račun aktiviran!<br>';
            } elseif ($_GET['aktivacija'] == 'neuspjesna') {
                echo 'Neuspješna aktivacija računa!<br>';
            } else {
                echo 'Link za aktivaciju je istekao!<br>';
            }
        }
    }

    function Registracija() {
        if ($GLOBALS['mod'] == "registracija") {
            return true;
        } elseif ($GLOBALS['mod'] == "prijava") {
            return false;
        }
    }

    $popisGresaka = ""; //globalni popis elemenata s greskom -> za dodavanje klase 

    function ProvjeriPodatke() {
        $greska = "";
        foreach ($_POST as $kljuc => $vrijednost) { // petlja za svaki element forme
            if (preg_match("/[?!#']/", $vrijednost)) { // ako vrijednost polja sadrzi nedozvoljene znakove tj ?!#' 
                if ($kljuc == "lozinka" || $kljuc == "lozinka1" || $kljuc == "lozinka2") { // lozinka može sadržavati nedozvoljene znakove!
                } else {
                    $greska .= "Unijeli ste zabranjeni znak kod polja $kljuc. " . '\n';
                    $GLOBALS['popisGresaka'] .= "Element s greskom: " . $kljuc . "<br>";
                }
            } elseif (empty($vrijednost)) { // ako je vrijednost elementa prazna
                $greska .= " $kljuc vrijednost nije unesena." . '\n';
                $GLOBALS['popisGresaka'] .= "Element s greskom: " . $kljuc . "<br>";
            } elseif ($kljuc == "email") {// ako je element email 
                if (!preg_match("/^[a-zA-Z0-9]{1,}\.?[a-zA-Z0-9]{0,}@[a-zA-Z0-9]{1,}\.[a-zA-Z]{2,}$/", $vrijednost)) { // provjerava ispravnost email formata
                    $greska .= "Email nije ispravnog formata" . '\n';
                    $GLOBALS['popisGresaka'] .= "Element s greskom: " . $kljuc . "<br>";
                }
            }
        }
        if ($GLOBALS['mod'] == "registracija") { // validacija na strani servera kod registracije + ↑ provjera ↑
            $email = $_POST['email'];
            $korime = $_POST['korime'];
            if (!ProvjeraPodatakaKodRegistracije($email, $korime)) {
                $greska .= "Već postoji korisnik s upisanim emailom ili korisničkim imenom" . '\n';
                $GLOBALS['popisGresaka'] .= "Već postoji korisnik s upisanim emailom ili korisničkim imenom <br>";
            }
            if ($_POST['lozinka1'] != $_POST['lozinka2']) { // provjera jesu li lozinka i potvrda lozinke iste
                $greska .= "Lozinke nisu iste" . '\n';
                $GLOBALS['popisGresaka'] .= "Lozinke nisu iste<br>";
            }
        }

        if (!empty($greska)) { //ispisi greske ako ih ima
            echo "<script>alert('$greska');</script>";
        }
    }

    function ProvjeraPodatakaKodRegistracije($email, $korime) { // postoje li email ili korime u bazi
        $veza = new Baza();
        $veza->spojiDB();
        $upit = "SELECT * FROM `Korisnici`"; //kod generiran PHPAdminom
        $rezultat = $veza->selectDB($upit);
        while ($red = mysqli_fetch_array(($rezultat))) { //za svaki red u bazi
            if ($red[3] == $email || $red[2] == $korime) {
                $veza->zatvoriDB();
                return false;
            }
        }
        $veza->zatvoriDB();
        return true;
    }

    function NeispravanElement($element) { // provjera ispravnosti elementa (ako je neispravan dodaj klasu)
        if (strpos($GLOBALS['popisGresaka'], $element)) {
            return true; // ako element ima gresku
        } else {
            return false;
        }
    }

    if (isset($_POST['g-recaptcha-response'])) {
        $response = $_POST['g-recaptcha-response'];
        $secret = "6LchdloUAAAAANbto27i1UWFL1OwJz645MMyWCdb";
        $remoteIP = $_SERVER["REMOTE_ADDR"];
        $captchaResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteIP");
        $listaOdgovora = json_decode($captchaResponse, true); // pretvori odgovor iz stringa u listu
        if ($listaOdgovora['success']) { // provjeri da li je success = true
            RegistrirajKorisnika();
        } else {
            echo "<script>alert('Niste prošli captcha provjeru!');window.location = 'prijavaRegistracija.php?mod=registracija';</script>";
        }
    }

    function RegistrirajKorisnika() {
        //ProvjeriPodatke();
        if (empty($GLOBALS['popisGresaka']) && $GLOBALS['mod'] == "registracija") { //ako nema gresaka zapisi novog korisnika u bazu
            $veza = new Baza();
            $veza->spojiDB();
            $ime = $_POST['ime'];
            $prez = $_POST['prez'];
            $korime = $_POST['korime'];
            $email = $_POST['email'];
            $lozinka1 = $_POST['lozinka1'];
            $datumRegistriranja = Functions::DohvatiVirtualnoVrijeme();

            $salt = "jfdslFsd243" . $korime;
            $kriptirana_lozinka = sha1($lozinka1 . $salt);
            $aktivacijskiKod = PosaljiAktivacijskiKod($email);

            $upit = "INSERT INTO `WebDiP2017x044`.`Korisnici` (`Korisnici_ID` ,`TipKorisnika_ID` ,`Korisnici_korime` ,`Korisnici_email` ,`Korisnici_lozinka` ,"
                    . "`Korisnici_kriptiranaLozinka` ,`Korisnici_datumVrijemeRegistriracije` ,`Korisnici_ime` ,`Korisnici_prezime` ,`Korisnici_status` ,`Korisnici_neuspjesniLogin`,`Korisnici_aktivacijskiKod`)"
                    . " VALUES (NULL , '3', '" . $korime . "', '" . $email . "', '" . $lozinka1 . "', '" . $kriptirana_lozinka . "', '" . $datumRegistriranja . "', "
                    . "'" . $ime . "', '" . $prez . "', '0', '0', '" . $aktivacijskiKod . "');";  //kod generiran PHPAdminom
            echo "<script>alert('$upit');</script>";
            Functions::PisiULog("Registracija", "Korisnik $korime se uspješno registrirao.");
            $rezultat = $veza->selectDB($upit); // izvrsi upit
            $veza->zatvoriDB();
            header("Location: prijavaRegistracija.php?mod=prijava");
        }
    }

    function PosaljiAktivacijskiKod($email) {
        $aktivacijskiKod = '';
        for ($i = 0; $i < 10; $i++) {
            $aktivacijskiKod .= chr(rand(65, 90));
            $aktivacijskiKod .= chr(rand(97, 122));
        }

        $from = "From: info@KAT.hr";
        $aktivacijskiUrl = "http://webdip.barka.foi.hr/2017_projekti/WebDiP2017x044/AccessDatabase.php?funkcija=aktivacijaRacuna&aktivacijskiKod=$aktivacijskiKod";
        $poruka = "DOBRODOŠLI! Aktivirajte Vaš račun klikom na link: $aktivacijskiUrl";
        mail($email, "KAT Team", $poruka, $from);
        return $aktivacijskiKod;
    }

    function ProvjeraPrijave() { // prijava korisnika
        ProvjeriPodatke();
        if (isset($_POST['submit'])) {
            if (empty($GLOBALS['popisGresaka']) && $GLOBALS['mod'] == "prijava") {
                $autorizacija = AutorizacijaKorisnika();
                if ($autorizacija) {
                    header('Location: index.php');
                } elseif (!$autorizacija) {
                    return "<div class='ravno crveno' style='font-weight: bold;'>Neuspješna prijava!</div>";
                } else {
                    return "<div class='ravno crveno' style='font-weight: bold;'>Došlo je do problema prilikom prijave.</div>";
                }
            }
        }
    }

    function AutorizacijaKorisnika() {
        $veza = new Baza();
        $veza->spojiDB();
        $korime = $_POST['korisnickoIme'];
        $lozinka1 = $_POST['lozinka'];
        $salt = "jfdslFsd243" . $korime;
        $kriptirana_lozinka = sha1($lozinka1 . $salt);

        $upit = "SELECT * FROM `Korisnici`"; //kod generiran PHPAdminom
        $rezultat = $veza->selectDB($upit);
        $datum = date("Y-m-d");
        while ($red = mysqli_fetch_array(($rezultat))) { //za svaki red u bazi
            if ($red[2] == $korime) {
                if ($red[5] == $kriptirana_lozinka) {

                    if ($red[10] < 3) { // ako je broj neuspjesnih loginova manji od 3
                        return ProvjeraStatusaIDozvolaPristupa($red);
                    } else {
                        Functions::PisiULog("Neuspješna prijava", "Korisnik $korime se neuspješno prijavio (korisnički račun zaključan!).");
                        echo "<script>alert('Račun zaključan zbog 3 neuspješna logina. Kontaktirajte administratora za reaktivaciju računa.');</script>";
                    }
                } else {
                    $neuspjesniLogin = Functions::AutoIncrementColumn("Korisnici", "Korisnici_neuspjesniLogin", $red[0]); // autoincrement neuspjesni login kod red[0] -> id korisnika

                    if ($neuspjesniLogin == 3) {
                        Functions::PisiULog("Neuspješna prijava", "Korisnik $korime se neuspješno prijavio $neuspjesniLogin. puta. Korisnički račun automatski ZAKLJUČAN!");
                        echo "<script>alert('Račun zaključan zbog 3 neuspješna logina. Kontaktirajte administratora za reaktivaciju računa.');</script>";
                    } else {
                        Functions::PisiULog("Neuspješna prijava", "Korisnik $korime se neuspješno prijavio $neuspjesniLogin. puta.");
                    }
                    $veza->zatvoriDB();
                    return false;
                }
            }
        }
        $veza->zatvoriDB();
        return false;
    }

    function ProvjeraStatusaIDozvolaPristupa($red) {
        $veza = new Baza();
        $veza->spojiDB();

        if ($red[9] == 1) {
            Sesija::kreirajKorisnika($red[2], $red[1], $red[0], $red[7]);
            $sadrzajKolacica = $red[2];
            PostaviKolacic($sadrzajKolacica);

            $upit = "UPDATE `Korisnici` SET `Korisnici_neuspjesniLogin` = '0' WHERE `Korisnici_ID` = '$red[0]'"; // vrati broj neuspjesnih loginova na 0
            $rezultat = $veza->selectDB($upit);

            Functions::PisiULog("Uspješna prijava", "Korisnik $red[2] se uspješno prijavio.");
            $veza->zatvoriDB();
            return true;
        } else {
            $neuspjesniLogin = $red[10];
            $neuspjesniLogin++;
            $upit = "UPDATE `Korisnici` SET `Korisnici_neuspjesniLogin` = '$neuspjesniLogin' WHERE `Korisnici_ID` = '$red[0]'";
            Functions::PisiULog("Neuspješna prijava", "Korisnik $red[2] se pokušao prijaviti. Račun neaktivan!");
            $veza->zatvoriDB();
            return false;
        }
    }

    function PostaviKolacic($sadrzajKolacica) { // ako je oznaceno "Zapamti korisnicko ime" spremi korime u kolacic
        if (isset($_POST['vozac']) && $_POST['vozac'] == 1) {
            $virtualnoVrijeme = Functions::DohvatiVirtualnoVrijeme();
            $vrijedi_do = $virtualnoVrijeme + (86400 * 30); // kolacic traje 30 dana (86400 sec = 1 dan)
            setcookie("posljednjiLogin", $sadrzajKolacica, $vrijedi_do);
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
                <div style="text-align: center;"><div id="naslovnica_border"><?php
                        if (!Registracija()) {
                            echo "Dobrodošli!<br> Unesite ispravne podatke za prijavu!";
                        } else {
                            echo "Dobrodošli!<br> Molimo popunite sva polja s točnim podacima prilikom registracije.";
                        }
                        ?></div><p class="naslov"> <?php
                        IspisAktivacijeRacuna(); //ako je aktiviran racun putem linka
                        if (!Registracija()) {
                            echo "Prijavi se!";
                        } else {
                            echo "Registriraj se!";
                        }
                        ?> </p></div></div>
        </header>

        <section class="sirina forma">

            <div id="Prijava" <?php
                 if (Registracija()) {
                     echo "class='hidden'";
                 }
                 ?>>
                <form class="form" id="form1" method="post" name="form1" action="<?php echo $_SERVER["PHP_SELF"] . "?mod=prijava"; ?>">
                    <?php
                    if (!Registracija()) {
                        $prijava = ProvjeraPrijave();
                        echo "$prijava";
                    }
                    ?>
                    <label for="korisnickoIme">Korisničko ime: </label>
                    <input type="text" id="korisnickoIme" name="korisnickoIme" <?php
                    if (isset($_COOKIE["posljednjiLogin"])) {
                        $korime = $_COOKIE["posljednjiLogin"];
                        echo "value='$korime'";
                    }
                    ?> size="15" maxlength="15"  <?php
                           if (!Registracija()) {
                               echo "autofocus='autofocus'";
                           }
                           ?> placeholder="korisničko ime" required="required">
                    <label for="lozinka">Lozinka: </label>
                    <input type="password" id="lozinka" name="lozinka" size="15" maxlength="15" placeholder="lozinka" required="required">
                    <br><div><input style="width: auto" id="check" type="checkbox" checked name="vozac" value="1"> Zapamti korisničko ime</div>
                    <br><div><a style="color: black;" href='resetirajLozinku.php'>Zaboravljena lozinka?</a></div>
                    <div class="gumbi">
                        <input name="submit" class="gumb" type="submit" value=" Prijavi se ">
                        <input class="gumb" type="reset" value=" Inicijaliziraj "> 
                    </div>
                </form><br>
                <div class="ravno">Administrator -> Username: <b>lgaric</b> | Password: <b>lgaric</b></div>
                <div class="ravno">Moderator -> Username: <b>lklopotan</b> | Password: <b>lklopotan</b></div>
                <div class="ravno">Registrirani korisnik -> Username: <b>agrigic</b> | Password: <b>agrigic</b></div>
            </div>
            <br><br><br><br>
            <div id="Registracija" <?php
                 if (!Registracija()) {
                     echo "class='hidden'";
                 }
                 ?>>
                <form class="form" id="form2" method="post" name="form1" action="<?php echo $_SERVER["PHP_SELF"] . "?mod=registracija"; ?>">
                    <label <?php
                        if (NeispravanElement("ime")) {
                            echo "class='noInput'";
                        }
                        ?> for="ime">Ime: </label>
                    <input class="check" type="text" id="ime" name="ime" size="25" maxlength="25" <?php
                           if (Registracija()) {
                               echo "autofocus='autofocus'";
                           }
                           ?> placeholder="Ime" required="required">
                    <label <?php
                        if (NeispravanElement("prez")) {
                            echo "class='noInput'";
                        }
                        ?> for="prez">Prezime: </label>
                    <input class="check" type="text" id="prez" name="prez" size="25" maxlength="25" placeholder="Prezime" required="required">
                    <label <?php
                        if (NeispravanElement("korime")) {
                            echo "class='noInput'";
                        }
                        ?> id="labelkorime" for="korime">* Korisničko ime: </label>
                    <input class="check" type="text" id="korime" name="korime" size="20" maxlength="20" placeholder="Korisničko ime" required="required">
                    <label <?php
                        if (NeispravanElement("email")) {
                            echo "class='noInput'";
                        }
                        ?> id="validateEmail" for="email">* Email adresa: </label>
                    <input type="email" id="email" name="email" size="45" maxlength="45" placeholder="ime.prezime@posluzitelj.xxx" required="required">
                    <div id="provjeraLozinke" class="ravno hidden"></div>
                    <label <?php
                        if (NeispravanElement("lozinka1")) {
                            echo "class='noInput'";
                        }
                        ?> for="lozinka1">Lozinka: </label>
                    <input type="password" id="lozinka1" name="lozinka1" size="64" maxlength="64" placeholder="Lozinka" required="required">

                    <label <?php
                        if (NeispravanElement("lozinka2")) {
                            echo "class='noInput'";
                        }
                        ?> for="lozinka2">Ponovi pozinku: </label>
                    <input type="password" id="lozinka2" name="lozinka2" size="64" maxlength="64" placeholder="Lozinka" required="required"><br>
                    <div class="g-recaptcha" data-sitekey="6LchdloUAAAAAFbpPwGO9bjcdpBVlQkr1r-ac7pc"></div>

                    <div class="gumbi">
                        <input name="submit" class="gumb" id="registracija" type="submit" value=" Registriraj se ">
                        <a id="prijava_gumb" class="gumb" href="prijavaRegistracija.php">Prijava</a>
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
