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
        <title>Knowledge Assessment Test</title>
    </head>

    <?php
    require './lgaric.class.php';
    ?>

    <body>
        <nav class="navigacija">
            <div class="navigacija_div sirina">
                <ul id="prvi">
                    <li style="padding-right: 40px;" ><a href="index.php"><img id="home" src="Multimedija/Logo_transparent.png" alt="Početna"></a></li>
                    <li class="desktop"><a href="o_autoru.html">O autoru</a></li>
                    <li class="desktop"><a href="dokumentacija.html">Dokumentacija</a></li>
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
                        <li class="mobile"><a href="o_autoru.html">O autoru</a></li>
                        <li class="mobile"><a href="dokumentacija.html">Dokumentacija</a></li>
                        <?php Functions::NavigacijaMobile(); ?>
                    </ul>
                </div>
            </div>
        </nav>

        <header>
            <div id="glavnaSlika"><img style="height: 700px;" src="Multimedija/Naslovnica.jpeg" alt="Naslovna slika">
                <div style="text-align: center;"><div class="sirina_tekst" id="naslovnica_tekst">Knowledge without practice is useless. Practice without knowledge is dangerous.</div> <a id="gumb_kategorije" href="index.php#kategorije">Kategorije</a></div></div>
        </header>

        <section id="kategorije" class="sectionA sirina">
            <h1 class="naslov paddingTop">Kategorije</h1>

            <div class="kartice_box">
                <?php Functions::IspisKategorija() ?>
            </div>

            <div id="oglasi" class="form">
                <div class="oglas" id="oglas-1">

                </div>
                <div class="oglas" id="oglas-2">

                </div>
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
        <script src="JS/oglasi.js" type="text/javascript"></script>
    </body>
</html>