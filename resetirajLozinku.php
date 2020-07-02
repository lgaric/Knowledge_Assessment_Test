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

    if (isset($_POST["korime"])) {
        $veza = new Baza();
        $veza->spojiDB();
        $korime = $_POST["korime"];
        $upit = "SELECT * FROM `WebDiP2017x044`.`Korisnici` WHERE `Korisnici_korime` = '$korime'";
        $rezultat = $veza->selectDB($upit); // izvrsi upit
        if (mysqli_num_rows($rezultat) > 0) {
            while ($red = mysqli_fetch_array(($rezultat))) {
                $email = $red[3];
                $duzinaLozinke = rand(10, 15);
                $novaLozinka = '';
                for ($i = 0; $i < $duzinaLozinke; $i++) {
                    $novaLozinka .= chr(rand(33, 125));
                }

                $salt = "jfdslFsd243" . $red[2];
                $kriptirana_lozinka = sha1($novaLozinka . $salt);

                $upit = "UPDATE `WebDiP2017x044`.`Korisnici` SET `Korisnici_lozinka` = '$novaLozinka', `Korisnici_kriptiranaLozinka` = '$kriptirana_lozinka' WHERE `Korisnici_korime` = '$korime'";
                $rezultat = $veza->selectDB($upit); // izvrsi upit
                
                $poruka = "Zatražili ste resetiranje lozinke na našoj stranici 'Knowledge Assessment Test'. Vaša nova lozinka: $novaLozinka";
                Functions::PisiULog("Resetiranje lozinke", "Korisnik $korime zatražuje resetiranje lozinke. Nova lozinka poslana na email: $email.");
                $from = "From: info@KAT.hr";

                mail($email, "KAT Team", $poruka, $from);
                echo "<script>alert('Nova lozinka poslana na email');window.location = 'prijavaRegistracija.php?mod=prijava';</script>";
            }
        }else{
            echo "<script>alert('Korisničko ime nije u sustavu!');window.location = 'resetirajLozinku.php?';</script>";
        }
        $veza->zatvoriDB();
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
                    <div id="naslovnica_border">Dobrodošli!<br>Unesite korisničko ime za resetiranje lozinke!</div>
                    <p class="naslov">Resetiranje lozinke!</p>
                </div>
            </div>
        </header>

        <section class="sirina forma">

            <div>
                <form class="form" method="post" name="form1" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <label for="korime">Korisničko ime: </label>
                    <input type="text" id="korime" autofocus="autofocus" name="korime" size="25" maxlength="25" placeholder="Korisnicko ime" required="required">
                    <div class="gumbi">
                        <br>
                        <input name="submit" class="gumb" type="submit" value=" Resetiraj ">
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
