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
        <title>Postavke stranice</title>
    </head>

    <?php
    require './lgaric.class.php';

    Functions::DostupnostStraniceAdministratori("postavkeStranice.php");
    ?>
    <body>
        <nav class="navigacija">
            <div class="navigacija_div sirina">
                <ul id="prvi">
                    <li style="padding-right: 40px;" ><a href="index.php"><img id="home" src="Multimedija/Logo_transparent.png" alt="Početna"></a></li>
                    <li class="desktop"><a href="novaKategorija.php">Nova kategorija</a></li>
                    <li class="desktop"><a href="novaPozicijaOglasa.php">Nova pozicija</a></li>
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
                        <li class="mobile"><a href="novaKategorija.php">Nova kategorija</a></li>
                        <li class="mobile"><a href="novaPozicijaOglasa.php">Nova pozicija</a></li>
                        <?php Functions::NavigacijaMobile(); ?>
                    </ul>
                </div>
            </div>
        </nav>

        <header>
            <div class="sirina_tekst">
                <div style="text-align: center;"><div id="naslovnica_border">POSTAVKE</div><p class="naslov"> Postavke stranice! </p></div></div>
        </header>

        <section id="natjecanja" class="sectionA sirina">
            <div class='boxBijeli'>
                <div class="naslov ravno border_bottom"> Korisnici - PHP </div>

                <div class="form">
                    <?php
                    Functions::IspisiComboBoxKorisnika("korisniciblockComboBoxPHP", "Blokiraj korisnika: ", "Odaberite korisnika");
                    ?>
                    <div class="gumbi">
                        <a href="" id="blockKorisniciGumbPHP" class="gumb"> Blokiraj </a>
                    </div>
                    <br><br>
                </div>

                <div class="form">
                    <?php
                    Functions::IspisiComboBoxKorisnika("korisniciunblockComboBoxPHP", "Odblokiraj korisnika: ", "Odaberite korisnika");
                    ?>
                    <div class="gumbi">
                        <a href="" id="unblockKorisniciGumbPHP" class="gumb"> Odblokiraj </a>
                    </div>
                </div>
                <br>
                <div class="naslov ravno border_bottom paddingTop"> Korisnici - AJAX </div>
                <div class="form">
                    <?php
                    Functions::IspisiComboBoxKorisnika("korisniciblockComboBox", "Blokiraj korisnika: ", "Odaberite korisnika");
                    ?>
                    <br><br>
                </div>

                <div class="form">
                    <?php
                    Functions::IspisiComboBoxKorisnika("korisniciunblockComboBox", "Odblokiraj korisnika: ", "Odaberite korisnika");
                    ?>
                </div>
                <br>
                <div class="naslov ravno border_bottom paddingTop"> Kategorije - AJAX </div>
                <div class="form">
                    <?php
                    $upit = "SELECT * FROM `Kategorije`";
                    echo Functions::IspisiComboBox("kategorijeblockComboBox", "Omogući kategoriju: : ", $upit, "Odaberite kategoriju");
                    ?>
                    <br><br>
                </div>

                <div class="form">
                    <?php
                    echo Functions::IspisiComboBox("kategorijeunblockComboBox", "Omogući kategoriju: : ", $upit, "Odaberite kategoriju");
                    ?>
                </div><br>

                <div class="naslov ravno border_bottom paddingTop"> Blokiraj moderatora kategorije </div>
                <div class="form">
                    <?php Functions::IspisiComboBoxKorisnika("moderatorblockComboBox", "Moderator: ", "Odaberite moderatora"); ?>
                    <div id="moderatoriCBBlock">
                        <?php
                        $upit = "SELECT * FROM `Kategorije`";
                        echo Functions::IspisiComboBox("kategorijaModeratoraBlock", "Kategorija: ", $upit, "Odaberite kategoriju");
                        ?>
                    </div>
                </div>
                <div class="gumbi">
                    <a href="" id="moderatorBlockGumb" style="margin-bottom: 0;" class="gumb"> Blokiraj - PHP </a>
                    <a id="moderatorBlockGumbAJAX" class="gumb"> Blokiraj - AJAX </a>
                </div>
                <br><br>

                <div class="naslov ravno border_bottom paddingTop"> Odlokiraj moderatora kategorije </div>
                <div class="form">
                    <?php Functions::IspisiComboBoxKorisnika("moderatorunblockComboBox", "Moderator: ", "Odaberite moderatora"); ?>
                    <div id="moderatoriCBUnblock">
                    <?php
                    $upit = "SELECT * FROM `Kategorije`";
                    echo Functions::IspisiComboBox("kategorijaModeratoraUnblock", "Kategorija: ", $upit, "Odaberite kategoriju");
                    ?>
                    </div>
                </div>
                <div class="gumbi">
                    <a href="" id="moderatorUnblockGumb" style="margin-bottom: 0;" class="gumb"> Odblokiraj - PHP </a>
                    <a id="moderatorUnblockGumbAJAX" class="gumb"> Odblokiraj - AJAX </a>
                </div>
                <br><br>

                <br>
                <div class="naslov ravno border_bottom paddingTop"> UPDATE </div>
                <form class="form" id="form2" method="post" name="form1" action="AccessDatabase.php?funkcija=updateTable">
                    <label for="update">UPDATE </label>
                    <input type="text" id="update" name="update" size="40" maxlength="40" placeholder="Korisnici" required="required">
                    <label for="set">SET </label>
                    <input type="text" id="set" name="set" size="40" maxlength="40" placeholder="Korisnici_status" required="required">
                    <label for="jednako">= </label>
                    <input type="text" id="jednako" name="jednako" size="40" maxlength="40" placeholder="0" required="required">
                    <label for="whereID">WHERE ID = </label>
                    <input type="text" id="whereID" name="whereID" size="5" maxlength="5" placeholder="3" required="required">
                    <div class="gumbi">
                        <input name="submit" class="gumb" type="submit" value=" UPDATE ">
                    </div>
                    <br><br>
                </form>

                <div class="naslov ravno border_bottom paddingTop"> DELETE </div>
                <form class="form" id="form2" method="post" name="form1" action="AccessDatabase.php?funkcija=deleteColumn">
                    <label for="delete">DELETE FROM </label>
                    <input type="text" id="delete" name="delete" size="40" maxlength="40" placeholder="Korisnici" required="required">
                    <label for="whereID">WHERE ID = </label>
                    <input type="text" id="whereID" name="whereID" size="5" maxlength="5" placeholder="3" required="required">
                    <div class="gumbi">
                        <input name="submit" class="gumb" type="submit" value=" DELETE ">
                    </div>
                    <br><br>
                </form>
                <br>
                <div class="naslov ravno border_bottom paddingTop"> Virtualno vrijeme </div>
                <form target="_blank" action="http://barka.foi.hr/WebDiP/pomak_vremena/vrijeme.php" method="POST">
                    <div class="form">
                        <label for="pomak">Pomak u broju sati: </label>
                        <input type="text" id="pomak" name="pomak" size="20" required="required">
                    </div>
                    <br>
                    <div class="gumbi">
                        <input name="submit" class="gumb" type="submit" value=" Postavi novo vrijeme ">
                        <a href="AccessDatabase.php?funkcija=ucitajVrijeme" style="margin-bottom: 0;" id="ucitajVrijeme" class="gumb"> Učitaj vrijeme u sustav - PHP </a>
                        <a id="ucitajVrijemeAJAX" class="gumb"> Učitaj vrijeme u sustav - AJAX </a>
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
