<?php

require './sesija.class.php';
require './baza.class.php';
error_reporting(E_ALL);
Sesija::kreirajSesiju();

class Functions {

    static function NavigacijaDrugiIzbornik() {
        if (isset($_SESSION["korisnik"])) {
            echo "<ul id='drugi'>
                    <li class='desktop'><div>Dobrodošli &nbsp; <div style='color: #915047;'>" . $_SESSION["ime"] . "</div></div></li>
                    <li class='desktop'><a href='prijavaRegistracija.php?mod=odjava'>Odjava</a></li>
                </ul>";
        } else {
            echo "<ul id='drugi'>
                    <li class='desktop'><a href='prijavaRegistracija.php?mod=prijava'>Prijava</a></li>
                    <li class='desktop' id='btnRegistracija'><a style='color: #915047;' href='prijavaRegistracija.php?mod=registracija'>Registracija</a></li>
                </ul>";
        }
    }

    static function GlavnaNavigacija() {
        if (isset($_SESSION["korisnik"])) {
            $tip = $_SESSION["tip"]; // ID uloge
            if ($tip == 1) {
                echo "<li class='desktop'><a href='statistika.php'>Statistika</a></li><li class='desktop'><a href='postavkeStranice.php'>Postavke</a></li>";
            } elseif ($tip == 2) {
                echo "<li class='desktop'><a href='moderatorKategorije.php'>Moje kategorije</a></li><li class='desktop'><a href='popisZahtjevaOglasa.php'>Oglasi</a></li>";
            } elseif ($tip == 3) {
                echo "<li class='desktop'><a href='index.php#kategorije'>Kategorije</a></li><li class='desktop'><a href='mojiOglasi.php'>Moji oglasi</a></li><li class='desktop'><a href='noviOglas.php'>Novi oglas</a></li>";
            }
        } else {
            echo "<li class='desktop'><a href='index.php#kategorije'>Kategorije</a></li>";
        }
    }
    
    static function NavigacijaMobile(){
        //glavna navigacija
        if (isset($_SESSION["korisnik"])) {
            $tip = $_SESSION["tip"]; // ID uloge
            if ($tip == 1) {
                echo "<li class='mobile'><a href='statistika.php'>Statistika</a></li><li class='desktop'><a href='postavkeStranice.php'>Postavke</a></li>";
            } elseif ($tip == 2) {
                echo "<li class='mobile'><a href='moderatorKategorije.php'>Moje kategorije</a></li><li class='desktop'><a href='vrsteOglasa.php'>Oglasi</a></li>";
            } elseif ($tip == 3) {
                echo "<li class='mobile'><a href='index.php#kategorije'>Kategorije</a></li><li class='desktop'><a href='mojiOglasi.php'>Moji oglasi</a></li><li class='desktop'><a href='noviOglas.php'>Novi oglas</a></li>";
            }
        } else {
            echo "<li class='mobile'><a href='index.php#kategorije'>Kategorije</a></li>";
        }
        
        //Prijava/odjava
        if (isset($_SESSION["korisnik"])) {
            echo "<li class='mobile'><a href='prijavaRegistracija.php?mod=odjava'>Odjava</a></li>";
        } else {
            echo "<li class='mobile'><a href='prijavaRegistracija.php?mod=prijava'>Prijava</a></li>
                    <li class='mobile' id='btnRegistracija1'><a style='color: #915047;' href='prijavaRegistracija.php?mod=registracija'>Registracija</a></li>";
        }
    }

    static function PisiULog($radnja, $opis = "") {
        $veza = new Baza();
        $veza->spojiDB();
        if (isset($_SESSION["korisnik"])) {
            $id_korisnika = $_SESSION["id"];
        } else {
            $id_korisnika = 1; // neregistrirani korisnik
        }
        $preglednik = Functions::Preglednik();
        $datum = Functions::DohvatiVirtualnoVrijeme();

        $upit = "INSERT INTO `WebDiP2017x044`.`DnevnikRada` (`DnevnikRada_ID`, `Korisnici_ID`, `DnevnikRada_radnja`, `DnevnikRada_preglednik`, `DnevnikRada_datum`, `DnevnikRada_opis`)VALUES (NULL , '" . $id_korisnika . "', '" . $radnja . "', '" . $preglednik . "', '" . $datum . "', '" . $opis . "');";  //kod generiran PHPAdminom
        $rezultat = $veza->selectDB($upit); // izvrsi upit
        $veza->zatvoriDB();
    }
    
    static function UpdateTable($tablica, $stupac, $stupacVrijednost, $id){
        $veza = new Baza();
        $veza->spojiDB();
        $idStupac = $tablica . "_ID";
        $upit = "UPDATE `$tablica` SET `$stupac` = '$stupacVrijednost' WHERE `$idStupac` = '$id'";
        $rezultat = $veza->selectDB($upit); // izvrsi upit
        $veza->zatvoriDB();
    }

    static function DostupnostStraniceRegistrirani($stranica) {
        if (isset($_SESSION["korisnik"])) {
            // svi imaju pristup stranici -> ne cini nista
        } else { // neregistrirani korisnik
            Functions::PisiULog("Zabranjen pristup", "Pristup stranici " . $stranica . " zabranjen neregistriranim korisnicima");
            echo "<script>alert('Pristup zabranjen!');window.location = 'index.php';</script>"; // preusmjeri na pocetnu stranicu
        }
    }

    static function DostupnostStraniceModeratori($stranica) {
        if (isset($_SESSION["korisnik"])) {
            $tip = $_SESSION["tip"]; // ID uloge
            if ($tip != 1 && $tip != 2) {
                Functions::PisiULog("Zabranjen pristup", "Pristup stranici " . $stranica . " zabranjen registriranim i neregistriranim korisnicima");
                echo "<script>alert('Pristup zabranjen!');window.location = 'index.php';</script>"; // preusmjeri na pocetnu stranicu
            }
        } else { // neregistrirani korisnik
            Functions::PisiULog("Zabranjen pristup", "Pristup stranici " . $stranica . " zabranjen registriranim i neregistriranim korisnicima");
            echo "<script>alert('Pristup zabranjen!');window.location = 'index.php';</script>"; // preusmjeri na pocetnu stranicu
        }
    }

    static function DostupnostStraniceAdministratori($stranica) {
        if (isset($_SESSION["korisnik"])) {
            $tip = $_SESSION["tip"]; // ID uloge
            if ($tip != 1) {
                Functions::PisiULog("Zabranjen pristup", "Pristup stranici " . $stranica . " zabranjen svima osim administratoru");
                echo "<script>alert('Zabranjen pristup stranici $stranica');window.location = 'index.php';</script>"; // preusmjeri na pocetnu stranicu
            }
        } else { // neregistrirani korisnik
            Functions::PisiULog("Zabranjen pristup", "Pristup stranici " . $stranica . " zabranjen svima osim administratoru");
            echo "<script>alert('Pristup zabranjen!');window.location = 'index.php';</script>"; // preusmjeri na pocetnu stranicu
        }
    }

    static function Preglednik() {
        $preglednik = $_SERVER['HTTP_USER_AGENT'];
        if (strpos($preglednik, 'MSIE')) {
            return 'Internet Explorer';
        } elseif (strpos($preglednik, 'Chrome')) {
            return 'Google Chrome';
        } elseif (strpos($preglednik, 'Firefox')) {
            return 'Mozilla Firefox';
        } else {
            return 'Preglednik nepoznat!';
        }
    }

    static function IspisTablice($upit, $nazivTablice, $naslovTablice = "Tablica", $prvi = null, $drugi = null, $treci = null, $cetvrti = null) {
        $exit = "";
        $veza = new Baza();
        $veza->spojiDB();
        $rezultat = $veza->selectDB($upit);
        $brojStupaca = mysqli_num_fields($rezultat);
        $brojZapisa = mysqli_num_rows($rezultat);

        $dohvatiZaglavlje = "SELECT column_name from information_schema.columns where table_schema = 'WebDiP2017x044' and table_name = '" . $nazivTablice . "';";
        $columns = $veza->selectDB($dohvatiZaglavlje);

        $exit .=  "<div id='ispisTabliceDiv' class='sirina boxBijeli'>";
        if ($brojZapisa > 0) {
            $exit .=   "<div class='tablica'><table border='1' id='tablica'>
                    <caption class='naslov ravno border_bottom'>" . $naslovTablice . "</caption>";

            $exit .=   Functions::ColGrupe($brojStupaca, $prvi, $drugi, $treci, $cetvrti) . Functions::ZaglavljaTablice($columns, $prvi, $drugi, $treci, $cetvrti) . "<tbody>";

            while ($red = mysqli_fetch_array(($rezultat))) { //za svaki red u bazi ispisi sliku s nazivom
                if($red != null){
                    $exit .=   Functions::RedoviTablice($brojStupaca, $red, $prvi, $drugi, $treci, $cetvrti);
                }
            }
            $exit .=   "</tbody>
                </table></div>";
        } else {
            $exit .=   "<div class='ravno naslov_kartice'>Tablica " . $nazivTablice . " ne sadrži podatke</div>";
        }
        $exit .=   "</div>";

        $veza->zatvoriDB();
        return $exit;
    }

    static function ColGrupe($brojStupaca, $prvi, $drugi, $treci, $cetvrti) {
        $exit = ""; 
        if ($prvi != null && $drugi != null && $treci != null && $cetvrti != null) {
            $exit .=   "<colgroup>";
            $colWidth = 100 / $brojStupaca;
            for ($i = 0; $i < $brojStupaca; $i++) {
                if ($i == 0 || $i == $prvi || $i == $drugi || $i == $treci || $i == $cetvrti) {
                    // Ne ispisujemo 
                } else {
                    $exit .=   "<col style='width: " . $colWidth . "%'>";
                }
            }
            $exit .=   "</colgroup>";
        } elseif ($prvi != null && $drugi != null && $treci != null) {
            $exit .=   "<colgroup>";
            $colWidth = 100 / $brojStupaca;
            for ($i = 0; $i < $brojStupaca; $i++) {
                if ($i == 0 || $i == $prvi || $i == $drugi || $i == $treci) {
                    // Ne ispisujemo 
                } else {
                    $exit .=   "<col style='width: " . $colWidth . "%'>";
                }
            }
            $exit .=   "</colgroup>";
        } elseif ($prvi != null && $drugi != null) {
            $exit .=   "<colgroup>";
            $colWidth = 100 / $brojStupaca;
            for ($i = 0; $i < $brojStupaca; $i++) {
                if ($i == 0 || $i == $prvi || $i == $drugi) {
                    // Ne ispisujemo
                } else {
                    $exit .=   "<col style='width: " . $colWidth . "%'>";
                }
            }
            $exit .=   "</colgroup>";
        } elseif ($prvi != null) {
            $exit .=   "<colgroup>";
            $colWidth = 100 / $brojStupaca;
            for ($i = 0; $i < $brojStupaca; $i++) {
                if ($i == 0 || $i == $prvi) {
                    // Ne ispisujemo
                } else {
                    $exit .=   "<col style='width: " . $colWidth . "%'>";
                }
            }
            $exit .=   "</colgroup>";
        } else {
            $exit .=   "<colgroup>";
            $colWidth = 100 / $brojStupaca;
            for ($i = 0; $i < $brojStupaca; $i++) {
                if ($i == 0) {
                    // Ne ispisujemo ID
                } else {
                    $exit .=   "<col style='width: " . $colWidth . "%'>";
                }
            }
            $exit .=   "</colgroup>";
        }
        return $exit;
    }

    static function ZaglavljaTablice($columns, $prvi, $drugi, $treci, $cetvrti) {
        $exit =  "";
        $exit .=   "<thead><tr>";
        $brojRedova = 0;
        while ($red = mysqli_fetch_array(($columns))) { //za svaki red u bazi ispisi sliku s nazivom
            if ($prvi != null && $drugi != null && $treci != null && $cetvrti != null) {
                if ($brojRedova == 0 || $brojRedova == $prvi || $brojRedova == $drugi || $brojRedova == $treci || $brojRedova == $cetvrti) {
                    // Ne ispisujemo 
                } else {
                    $exit .=   "<th>" . $red[0] . "</th>"; // ima samo jedan stupac
                }
            } elseif ($prvi != null && $drugi != null && $treci != null) {
                if ($brojRedova == 0 || $brojRedova == $prvi || $brojRedova == $drugi || $brojRedova == $treci) {
                    // Ne ispisujemo 
                } else {
                    $exit .=   "<th>" . $red[0] . "</th>"; // ima samo jedan stupac
                }
            } elseif ($prvi != null && $drugi != null) {
                if ($brojRedova == 0 || $brojRedova == $prvi || $brojRedova == $drugi) {
                    // Ne ispisujemo 
                } else {
                    $exit .=   "<th>" . $red[0] . "</th>"; // ima samo jedan stupac
                }
            } elseif ($prvi != null) {
                if ($brojRedova == 0 || $brojRedova == $prvi) {
                    // Ne ispisujemo 
                } else {
                    $exit .=   "<th>" . $red[0] . "</th>"; // ima samo jedan stupac
                }
            } else {
                if ($brojRedova == 0) {
                    // Ne ispisujemo ID
                } else {
                    $exit .=   "<th>" . $red[0] . "</th>"; // ima samo jedan stupac
                }
            }
            $brojRedova++;
        }
        $exit .=   "</tr></thead>";
        
        return $exit;
    }

    static function RedoviTablice($brojStupaca, $red, $prvi, $drugi, $treci, $cetvrti) {
        $exit =  "";
        $exit .=   "<tr>";
        if ($prvi != null && $drugi != null && $treci != null && $cetvrti != null) {
            for ($i = 0; $i < $brojStupaca; $i++) {
                if ($i == 0 || $i == $prvi || $i == $drugi || $i == $treci || $i == $cetvrti) {
                    // Ne ispisujemo 
                } else {
                    $exit .=   "<td class='hide_mobile'>" . $red[$i] . "</td>";
                }
            }
        } elseif ($prvi != null && $drugi != null && $treci != null) {
            for ($i = 0; $i < $brojStupaca; $i++) {
                if ($i == 0 || $i == $prvi || $i == $drugi || $i == $treci) {
                    // Ne ispisujemo 
                } else {
                    $exit .=   "<td class='hide_mobile'>" . $red[$i] . "</td>";
                }
            }
        } elseif ($prvi != null && $drugi != null) {
            for ($i = 0; $i < $brojStupaca; $i++) {
                if ($i == 0 || $i == $prvi || $i == $drugi) {
                    // Ne ispisujemo 
                } else {
                    $exit .=   "<td class='hide_mobile'>" . $red[$i] . "</td>";
                }
            }
        } elseif ($prvi != null) {
            for ($i = 0; $i < $brojStupaca; $i++) {
                if ($i == 0 || $i == $prvi) {
                    // Ne ispisujemo 
                } else {
                    $exit .=   "<td class='hide_mobile'>" . $red[$i] . "</td>";
                }
            }
        } else {
            for ($i = 0; $i < $brojStupaca; $i++) {
                if ($i == 0) {
                    // ID -> ne ispisuj
                } else {
                    $exit .=   "<td class='hide_mobile'>" . $red[$i] . "</td>";
                }
            }
        }
        $exit .=   "</tr>";
        return $exit;
    }

    static function IspisiComboBox($naziv, $label, $upit, $defaultVrijednost = " ", $required = false, $autoincrement = false) {
        $exit = "";
        $veza = new Baza();
        $veza->spojiDB();
        $rezultat = $veza->selectDB($upit);
        $exit .= "<label for='$naziv'>$label</label><select id='$naziv' name='$naziv'>";
        if ($required) {
            $exit .= "<option value='' selected='selected'>$defaultVrijednost</option>";
        } else {
            $exit .= "<option value='-1' selected='selected'>$defaultVrijednost</option>";
        }
        if (!$autoincrement) {
            while ($red = mysqli_fetch_array(($rezultat))) { //za svaki red u bazi ispisi option
                $exit .= "<option value='$red[0]'>$red[1]</option>";
            }
        } else {
            $id = 1;
            while ($red = mysqli_fetch_array(($rezultat))) { //za svaki red u bazi ispisi option
                $exit .= "<option value='$id'>$red[0]</option>";
                $id++;
            }
        }

        $exit .= "</select>";
        return $exit;
    }

    //ignorira neregistriranog korisnika
    static function IspisiComboBoxKorisnika($naziv, $label, $defaultVrijednost = " ") {
        $veza = new Baza();
        $veza->spojiDB();
        $upit = "SELECT `Korisnici_ID`, `Korisnici_korime`  FROM `Korisnici`";
        $rezultat = $veza->selectDB($upit);
        echo "<label for='$naziv'>$label</label><select id='$naziv' name='$naziv'> <option value='-1' selected='selected'>$defaultVrijednost</option>";

        $korisnikID = 1;
        while ($red = mysqli_fetch_array(($rezultat))) { //za svaki red u bazi ispisi sliku s nazivom
            if($korisnikID === 1){
                // ignoriraj neregistriranog korisnika
            }else{
                echo "<option value='$red[0]'>$red[1]</option>";
            }
            $korisnikID++;
        }

        echo "</select>";
    }

    static function PrijenosDatoteke() { // copyright: Matija Novak; altered by: Luka Garić
        $userfile = $_FILES['userfile']['tmp_name'];
        $userfile_name = $_FILES['userfile']['name'];
        $userfile_size = $_FILES['userfile']['size'];
        $userfile_type = $_FILES['userfile']['type'];
        $userfile_error = $_FILES['userfile']['error'];
        if ($userfile_error > 0) {
            $greska = 'Problem: ';
            switch ($userfile_error) {
                case 1: $greska .= 'Veličina veća od ' . ini_get('upload_max_filesize');
                    break;
                case 2: $greska .= 'Veličina veća od ' . $_POST["MAX_FILE_SIZE"] . 'B';
                    break;
                case 3: $greska .= 'Datoteka djelomično prenesena';
                    break;
                case 4: $greska .= 'Datoteka nije prenesena';
                    break;
            }
            echo "<script>alert('$greska');</script>";
            exit;
        }

        $upfile = 'Multimedija/' . $userfile_name;

        if (is_uploaded_file($userfile)) {
            if (!move_uploaded_file($userfile, $upfile)) {
                echo "<script>alert('Problem: nije moguće prenijeti datoteku na odredište');</script>";
                exit;
            }
        } else {
            echo "<script>alert('Problem: mogući napad prijenosom. Datoteka: ' " . $userfile_name . ");</script>";
            exit;
        }
        return "$userfile_name";
    }
    
    static function DohvatiLink($uri){
        $preusmjeri = 'https://barka.foi.hr/WebDiP' . $uri;
        return $preusmjeri;
    }

    static function DohvatiNoviID($tablica) {
        $veza = new Baza();
        $veza->spojiDB();
        $upitNoviID = "SELECT MAX(" . $tablica . "_ID) FROM `$tablica`";
        $noviIDRezultat = $veza->selectDB($upitNoviID); // izvrsi upit
        $noviIDLista = mysqli_fetch_array($noviIDRezultat);
        $noviID = $noviIDLista[0];
        return $noviID;
    }

    static function IspisKategorija($idModeratora = "") {
        $veza = new Baza();
        $veza->spojiDB();
        if ($idModeratora == "") {
            $upit = "SELECT * FROM `Kategorije` WHERE `Kategorije_aktivna` = '1'"; //kod generiran PHPAdminom
        } else {
            $upit = "SELECT *FROM `Kategorije` NATURAL JOIN `ModeratorKategorije` WHERE `Korisnici_ID` = $idModeratora AND `ModeratorKategorije_do` IS NULL"; //kod generiran PHPAdminom
        }

        $rezultat = $veza->selectDB($upit);
        while ($red = mysqli_fetch_array(($rezultat))) { //za svaki red u bazi ispisi sliku s nazivom
            echo "<div class='Duplakartica'> 
                    <a href='popisNatjecanja.php?idKategorije=" . $red[0] . "'>
                        <img class='slikaDupleKartice' src='Multimedija/" . $red[4] . "' alt='" . $red[1] . "'>
                        <div class='opis_kartice'>
                            <div class='naslov_kartice'> " . $red[1] . " </div> 
                            <div class='tekst_kartice'> " . $red[3] . " </div> 
                        </div>
                    </a>
                </div>";
        }
        $veza->zatvoriDB();
    }

    static function IspisNatjecanja($idKategorije = "", $svaNatjecanja = false) {
        $veza = new Baza();
        $veza->spojiDB();

        if ($idKategorije == "") {
            $upit = "SELECT * FROM `Natjecanja`"; //kod generiran PHPAdminom
        } else {
            if($svaNatjecanja === true){
                $upit = "SELECT * FROM `Natjecanja` NATURAL JOIN  `Kategorije` WHERE `Kategorija_ID` = $idKategorije AND `Kategorije_ID` = $idKategorije"; //kod generiran PHPAdminom
            }else{
                $upit = "SELECT * FROM `Natjecanja` NATURAL JOIN  `Kategorije` WHERE `Kategorija_ID` = $idKategorije AND `Natjecanja_status` = 1 AND `Kategorije_ID` = $idKategorije"; //kod generiran PHPAdminom
            }
        }
        $rezultat = $veza->selectDB($upit);
        $brojNatjecanja = 0;
        while ($red = mysqli_fetch_array(($rezultat))) { //za svaki red u bazi ispisi sliku s nazivom
            $brojNatjecanja++;
            echo "<div class='kartica'> 
                    <a href='natjecanje.php?idNatjecanja=" . $red[0] . "'>
                        <img class='slikaKartice' src='Multimedija/" . $red[9] . "' alt='" . $red[9] . "'>
                        <div class='opis_kartice'>
                            <div class='naslov_kartice'> " . $red[3] . " </div> 
                            <div class='tekst_kartice'> " . $red[5] . " </div> 
                        </div>
                    </a>
                </div>";
        } 
        if($brojNatjecanja === 0){
            echo "<div id='nemaNatjecanja' class='ravno naslov_kartice'> Trenutno nema aktualnih natjecanja za odabranu kategoriju! </div>";
        }
        $veza->zatvoriDB();
    }

    static function ZapisiNovoVrijemeUDatoteku($sekunde) {
        $datoteka = fopen("virtualnoVrijeme.txt", "w+");
        fwrite($datoteka, $sekunde);
        fclose($datoteka);
    }

    static function PromijeniVirtualnoVrijeme() {
        $url = "http://barka.foi.hr/WebDiP/pomak_vremena/pomak.php?format=json";

        if (!($datoteka = fopen($url, 'r'))) {
            echo "Problem: nije moguće otvoriti url: " . $url;
            exit;
        }

        $json_string = fread($datoteka, 50);
        $json = json_decode($json_string, false); // objekt
        $sati = $json->WebDiP->vrijeme->pomak->brojSati;
        fclose($datoteka);
        $sekunde = $sati * 60 * 60;
        Functions::ZapisiNovoVrijemeUDatoteku($sekunde);
    }

    static function DohvatiVirtualnoVrijeme() {
        $sekunde = file_get_contents("virtualnoVrijeme.txt");
        $time = time() + $sekunde;
        $virtualnoVrijeme = date('Y-m-d H:i:s', $time);
        return $virtualnoVrijeme;
    }

    static function AutoIncrementColumn($table, $column, $ID) {
        $veza = new Baza();
        $veza->spojiDB();
        $ColumnID = $table . "_ID";


        //dohvati stari broj
        $dohvatiStariBroj = "SELECT `$column` FROM `$table` WHERE `$ColumnID` = '$ID'";
        $stariBroj = $veza->selectDB($dohvatiStariBroj);
        $brojUListi = mysqli_fetch_row($stariBroj);
        $broj = $brojUListi[0];


        //povecaj broj za 1 i update tablicu
        $broj++;
        $upit = "UPDATE `$table` SET `$column` = '$broj' WHERE `$ColumnID` = '$ID'";
        $rezultat = $veza->selectDB($upit);
        $veza->zatvoriDB();
        return $broj;
    }

    static function IspitajVrijeme($natjecanjeOd, $natjecanjeDo) {
        $vrijeme = Functions::DohvatiVirtualnoVrijeme();
        if ($vrijeme >= $natjecanjeOd && $vrijeme < $natjecanjeDo) {
            return true;
        } else {
            return false;
        }
    }
    
    static function IspisOglasaPoKorisniku($idKorisnika, $odobreni=false) {
        $veza = new Baza();
        $veza->spojiDB();

        if($odobreni == true){
            $upit = "SELECT * FROM `Oglasi` WHERE `Korisnici_ID` = $idKorisnika AND `Oglasi_odobren` = '1'";
        }else{
            $upit = "SELECT * FROM `Oglasi` WHERE `Korisnici_ID` = $idKorisnika AND `Oglasi_odobren` = '0'";
        }
        $rezultat = $veza->selectDB($upit);
        $brojOglasa = 0;
        while ($red = mysqli_fetch_array(($rezultat))) { //za svaki red u bazi ispisi sliku s nazivom
            $brojOglasa++;
            echo "<div class='kartica'> 
                    <a href='" . $red[6] . "'>
                        <img class='slikaKartice' src='Multimedija/" . $red[10] . "' alt='" . $red[3] . "'>
                        <div class='opis_kartice'>
                            <div class='naslov_kartice'> " . $red[3] . " </div> 
                            <div class='tekst_kartice'> " . $red[5] . " </div> 
                        </div>
                    </a>
                </div>";
        } 
        if($brojOglasa === 0){
            echo "<div id='nemaNatjecanja' class='ravno naslov_kartice'> Nemate niti jedan zahtjev za kreiranje oglasa! </div>";
        }
        $veza->zatvoriDB();
    }

}
