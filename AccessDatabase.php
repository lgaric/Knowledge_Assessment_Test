<?php

require './lgaric.class.php';
$veza = new Baza();
$veza->spojiDB();


//blokiraj
if (isset($_GET["funkcija"]) && $_GET["funkcija"] == "blokiraj") {
    $exit = "";
    $korisime = $_GET["korime"];
    $administrator = $_SESSION["ime"];
    $upit = "UPDATE `Korisnici` SET `Korisnici_status` = '0' WHERE `Korisnici_korime` = '$korisime'";
    Functions::PisiULog("Blokiranje", "Administrator $administrator je blokirao korisnika $korisime");
    $rezultat = $veza->selectDB($upit);

    if ($rezultat != false) {
        $exit .= "<script>alert('Korisnik $korisime uspjesno blokiran!');window.location = 'postavkeStranice.php';</script>"; // vrati se na stranicu postavki
    } else {
        $exit = "Error";
    }
    exit($exit);
}

//odblokiraj
if (isset($_GET["funkcija"]) && $_GET["funkcija"] == "odblokiraj") {
    $exit = "";
    $korisime = $_GET["korime"];
    $administrator = $_SESSION["ime"];
    $upit = "UPDATE `Korisnici` SET `Korisnici_status` = '1' WHERE `Korisnici_korime` = '$korisime'";
    Functions::PisiULog("Odblokiranje", "Administrator $administrator je odblokirao korisnika $korisime");
    $rezultat = $veza->selectDB($upit);

    if ($rezultat != false) {
        $exit .= "<script>alert('Korisnik $korisime uspjesno odblokiran!');window.location = 'postavkeStranice.php';</script>"; // vrati se na stranicu postavki
    } else {
        $exit = "Error";
    }
    exit($exit);
}


//onemoguci kategoriju
if (isset($_GET["funkcija"]) && $_GET["funkcija"] == "onemoguciKategoriju") {
    $exit = "";
    $idKategorije = $_GET["idKategorije"];
    $naziv = $_GET["natjecanje"];
    Functions::UpdateTable("Kategorije", "Kategorije_aktivna", 0, $idKategorije);
    Functions::PisiULog("Blokiranje", "Administrator $administrator je onemogućio kategoriju $naziv");

    if ($rezultat != false) {
        $exit .= "<script>alert('Kategorija $naziv uspješno onemogućena!');window.location = 'postavkeStranice.php';</script>"; // vrati se na stranicu postavki
    } else {
        $exit = "Error";
    }
    exit($exit);
}

// omoguci kategoriju
if (isset($_GET["funkcija"]) && $_GET["funkcija"] == "omoguciKategoriju") {
    $exit = "";
    $idKategorije = $_GET["idKategorije"];
    $naziv = $_GET["natjecanje"];
    Functions::UpdateTable("Kategorije", "Kategorije_aktivna", 1, $idKategorije);
    Functions::PisiULog("Blokiranje", "Administrator $administrator je omogućio kategoriju $naziv");

    if ($rezultat != false) {
        $exit .= "<script>alert('Kategorija $naziv uspješno omogućena!');window.location = 'postavkeStranice.php';</script>"; // vrati se na stranicu postavki
    } else {
        $exit = "Error";
    }
    exit($exit);
}


if (isset($_GET["funkcija"]) && $_GET["funkcija"] == "ucitajVrijeme") {
    $staroVrijeme = Functions::DohvatiVirtualnoVrijeme();
    Functions::PromijeniVirtualnoVrijeme();
    $vrijeme = Functions::DohvatiVirtualnoVrijeme();
    $administrator = $_SESSION["ime"];
    Functions::PisiULog("Virtualno vrijeme", "Administrator $administrator je promijenio virtualno vrijeme sustava. Staro vrijeme: $staroVrijeme | Novo vrijeme: $vrijeme");
    echo "<script>alert('Sustav postavljen na novo vrijeme! Trenutno je: $vrijeme');window.location = 'postavkeStranice.php';</script>";
}

if (isset($_GET["funkcija"]) && $_GET["funkcija"] == "IspisPitanjaPoKategoriji") {
    $idKategorije = $_GET["idKategorije"];
    $exit = "";
    $upit = "SELECT * FROM `Pitanja` NATURAL JOIN  `Kategorije` WHERE `Kategorije_ID` = $idKategorije"; //kod generiran PHPAdminom
    $rezultat = $veza->selectDB($upit);
    if ($rezultat === null) {
        exit($exit);
    }
    $brojRezultata = mysqli_num_rows($rezultat);
    $idPitanja = 1;

    while ($red = mysqli_fetch_array($rezultat)) { // spremi sva pitanja u listu
        $listaPitanja[$idPitanja] = $red[3];
        $listaIdeva[$idPitanja] = $red[1];
        $idPitanja++;
        $brojPitanja = 1;
    }
    $rezultat = $veza->selectDB($upit);
    $idPitanja = 1;
    $labelBrojPitanja = 1;
    while ($red = mysqli_fetch_array($rezultat)) { //ispisi sva pitanja u combo box
        $idPitanja++;
        $exit .= "<label for='pitanje$idPitanja'>$labelBrojPitanja. Pitanje: </label><select id='pitanje$idPitanja' name='pitanje$idPitanja'>"
                . "<option value='0' selected='selected'>Odaberite pitanje</option>";
        $brojPitanja = 1;
        while ($brojPitanja <= $brojRezultata) {
            $exit .= "<option value='$listaIdeva[$brojPitanja]'>$listaPitanja[$brojPitanja]</option>";
            $brojPitanja++;
            $idPitanja++;
        }
        $exit .= "</select>";
        $labelBrojPitanja++;
    }
    if ($idPitanja === 1) {
        exit("Error");
    } else {
        exit($exit);
    }
}


if (isset($_GET["funkcija"]) && $_GET["funkcija"] == "blokirajModeratora") {
    $exit = "";
    $idKategorije = $_GET["idKategorije"];
    $idKorisnika = $_GET["idKorisnika"];
    $datum = Functions::DohvatiVirtualnoVrijeme();
    $upit = "UPDATE `ModeratorKategorije` SET `ModeratorKategorije_do` = '$datum' WHERE `Korisnici_ID` = '$idKorisnika' AND `Kategorije_ID` = '$idKategorije'";
    $rezultat = $veza->selectDB($upit);
    $administrator = $_SESSION["korisnik"];
    Functions::PisiULog("Blokiranje moderatora", "Administrator $administrator je blokirao pristup kategoriji ID = $idKategorije moderatoru s ID-em: $idKorisnika");
    echo "<script>alert('Moderator uspjesno blokiran te mu je zabranjen pristup odabranoj kategoriji!');window.location = 'postavkeStranice.php';</script>";
}

if (isset($_GET["funkcija"]) && $_GET["funkcija"] == "odblokirajModeratora") {
    $exit = "";
    $idKategorije = $_GET["idKategorije"];
    $idKorisnika = $_GET["idKorisnika"];
    $datum = Functions::DohvatiVirtualnoVrijeme();
    $upit = "UPDATE `ModeratorKategorije` SET `ModeratorKategorije_do` = NULL WHERE `Korisnici_ID` = '$idKorisnika' AND `Kategorije_ID` = '$idKategorije'";
    $rezultat = $veza->selectDB($upit);
    $administrator = $_SESSION["korisnik"];
    Functions::PisiULog("Odblokiranje moderatora", "Administrator $administrator je dozvolio pristup kategoriji ID = $idKategorije moderatoru s ID-em: $idKorisnika");
    echo "<script>alert('Moderator uspjesno odblokiran te mu je dozvoljen pristup odabranoj kategoriji!');window.location = 'postavkeStranice.php';</script>";
}


/*   Funkcije za AJAX upite!    */


if (isset($_POST["funkcija"]) && $_POST["funkcija"] == "ispisCBModeratora") {
    $exit = "";
    $idModeratora = $_POST["idModeratora"];
    $block = $_POST["block"];
    if ($block == "yes") {
        $upit = "SELECT * FROM `Kategorije` NATURAL JOIN `ModeratorKategorije` WHERE `Korisnici_ID` = $idModeratora AND `ModeratorKategorije_do` IS NULL";
        $exit = Functions::IspisiComboBox("kategorijaModeratoraBlock", "Kategorija: ", $upit, "Odaberite kategoriju");
    } else {
        $upit = "SELECT * FROM `Kategorije` NATURAL JOIN `ModeratorKategorije` WHERE `Korisnici_ID` = $idModeratora AND `ModeratorKategorije_do` IS NOT NULL";
        $exit = Functions::IspisiComboBox("kategorijaModeratoraUnblock", "Kategorija: ", $upit, "Odaberite kategoriju");
    }
    if ($exit == "") {
        exit("Error");
    } else {
        exit($exit);
    }
}


// vraća html oglasa
if (isset($_POST["funkcija"]) && $_POST["funkcija"] == "IspisOglasa") {
    $idOglasa = $_POST["idOglasa"];
    $exit = "";
    $veza = new Baza();
    $veza->spojiDB();

    $upit = "SELECT *FROM `Oglasi` WHERE `Oglasi_ID` = $idOglasa"; //kod generiran PHPAdminom
    $rezultat = $veza->selectDB($upit);

    while ($red = mysqli_fetch_array(($rezultat))) { //za svaki red u bazi ispisi sliku s nazivom
        $exit .= "<a class='oglasi_grid' href='AccessDatabase.php?funkcija=proslijediOglas&idOglasa=$red[0]'>
                        <img class='slikaoglasa' src='Multimedija/" . $red[10] . "' alt='" . $red[3] . "'>

                        <div class='opis_oglasa'>
                            <div class='naslov_oglasa'> " . $red[3] . " </div> 
                            <div class='tekst_oglasa'> " . $red[5] . " </div> 
                        </div>
                    </a>
                    <a href='zahtjevZaBlokiranjeOglasa.php?id=" . $red[0] . "' class='oglas_block'>Neprimjeren oglas?</a>";
    }
    $veza->zatvoriDB();
    exit($exit);
}


if (isset($_POST["funkcija"]) && $_POST["funkcija"] == "provjeriKorisnickoIme") {
    $korisime = $_POST["korime"];

    $upit = "SELECT * FROM `Korisnici` WHERE `Korisnici_korime` = '$korisime'";
    $rezultat = $veza->selectDB($upit);
    if (mysqli_num_rows($rezultat) > 0) {
        exit("Zauzeto");
    } else {
        exit("Slobodno");
    }
}

if (isset($_POST["tablica"])) {

    $tablica = $_POST["tablica"];
    if ($tablica == "dnevnikrada") {
        $upit = "SELECT * FROM `DnevnikRada`";
        $rezultat = Functions::IspisTablice($upit, "DnevnikRada", "Dnevnik rada", 1);
    } elseif ($tablica == "kategorije") {
        $upit = "SELECT * FROM `Kategorije`";
        $rezultat = Functions::IspisTablice($upit, "Kategorije", "Popis kategorija", 5);
    } elseif ($tablica == "korisnici") {
        $upit = "SELECT * FROM `Korisnici`";
        $rezultat = Functions::IspisTablice($upit, "Korisnici", "Popis korisnika", 1, 5, 9, 10);
    } elseif ($tablica == "moderatorkategorije") {
        $upit = "SELECT * FROM `ModeratorKategorije`";
        $rezultat = Functions::IspisTablice($upit, "ModeratorKategorije", "Moderatori kategorija");
    } elseif ($tablica == "natjecanja") {
        $upit = "SELECT * FROM `Natjecanja`";
        $rezultat = Functions::IspisTablice($upit, "Natjecanja", "Popis natjecanja", 1, 2, 4);
    } elseif ($tablica == "oglasi") {
        $upit = "SELECT * FROM `Oglasi`";
        $rezultat = Functions::IspisTablice($upit, "Oglasi", "Popis svih oglasa", 1, 4, 6, 10);
    } elseif ($tablica == "pitanjanatjecanja") {
        $upit = "SELECT * FROM `Oglasi`";
        $rezultat = Functions::IspisTablice($upit, "Pitanja natjecanja", "Popis svih pitanja po natjecanju");
    } elseif ($tablica == "pitanja") {
        $upit = "SELECT * FROM `Pitanja`";
        $rezultat = Functions::IspisTablice($upit, "Pitanja", "Popis pitanja", 2);
    } elseif ($tablica == "pozicijaoglasa") {
        $upit = "SELECT * FROM `PozicijaOglasa`";
        $rezultat = Functions::IspisTablice($upit, "PozicijaOglasa", "Popis pozicija oglasa");
    } elseif ($tablica == "sudioniknatjecanja") {
        $upit = "SELECT * FROM `SudionikNatjecanja`";
        $rezultat = Functions::IspisTablice($upit, "SudionikNatjecanja", "Popis sudionika natjecanja", 6, 1);
    } elseif ($tablica == "tipkorisnika") {
        $upit = "SELECT * FROM `TipKorisnika`";
        $rezultat = Functions::IspisTablice($upit, "TipKorisnika", "Popis tipova korisnika", 2);
    } elseif ($tablica == "tocniodgovori") {
        $upit = "SELECT * FROM `TocniOdgovori`";
        $rezultat = Functions::IspisTablice($upit, "TocniOdgovori", "Popis točnih odgovora");
    } elseif ($tablica == "vrsteoglasa") {
        $upit = "SELECT * FROM `VrsteOglasa`";
        $rezultat = Functions::IspisTablice($upit, "VrsteOglasa", "Popis vrsta oglasa");
    } elseif ($tablica == "zahtjevizablokiranjeoglasa") {
        $upit = "SELECT * FROM `ZahtjeviZaBlokiranjeOglasa`";
        $rezultat = Functions::IspisTablice($upit, "ZahtjeviZaBlokiranjeOglasa", "Popis zahtjeva za blokiranjem oglasa", 3);
    } elseif ($tablica == "stranica") {
        $upit = "SELECT * FROM `Stranica`";
        $rezultat = Functions::IspisTablice($upit, "Stranica", "Popis stranica");
    } else {
        $rezultat = "Error";
    }
    if ($rezultat === "Error") {
        exit("Error");
    } else {
        exit($rezultat);
    }
}



if (isset($_GET["funkcija"]) && $_GET["funkcija"] == "aktivacijaRacuna") {
    $aktivacijskiKod = $_GET["aktivacijskiKod"];
    $upit = "SELECT * FROM `Korisnici` WHERE `Korisnici_aktivacijskiKod` = '$aktivacijskiKod'";
    $rezultat = $veza->selectDB($upit);
    $uspjesnaAktivacija = false;
    if (mysqli_num_rows($rezultat) > 0) {
        while ($red = mysqli_fetch_array(($rezultat))) {
            $vrijemeRegistracije = $red[6];
            $linkTrajeDo = date("Y-m-d H:i:s", strtotime('+7 hour', strtotime($vrijemeRegistracije))); // 7 sati unaprijed
            $trenutnoVrijeme = Functions::DohvatiVirtualnoVrijeme();
            if ($trenutnoVrijeme < $linkTrajeDo) {
                Functions::PisiULog("Aktivacija računa", "Korisnik $red[7] $red[8] upravo aktivirao korisnički račun!");
                $uspjesnaAktivacija = true;
            } else {
                Functions::PisiULog("Aktivacija neuspješna", "Korisnik $red[7] $red[8] nije uspio aktivirati račun! Link za aktivaciju je istekao");
            }
        }
        if ($uspjesnaAktivacija == true) {
            $upit = "UPDATE `Korisnici` SET `Korisnici_status` = '1' WHERE `Korisnici_aktivacijskiKod` = '$aktivacijskiKod'";
            $rezultat = $veza->selectDB($upit);
            header("Location: prijavaRegistracija.php?aktivacija=uspjesna");
        } else {
            header("Location: prijavaRegistracija.php?aktivacija=isteklo");
        }
    } else {
        header("Location: prijavaRegistracija.php?aktivacija=neuspjesna");
    }
}

if (isset($_GET["funkcija"]) && $_GET["funkcija"] == "ispisStatistikeNatjecanja") {
    $idNatjecanja = $_GET["idNatjecanja"];
    $upit = "SELECT * FROM `SudionikNatjecanja` WHERE `Natjecanje_ID` = $idNatjecanja";
    $exit = Functions::IspisTablice($upit, "SudionikNatjecanja", "Popis sudionika natjecanja", 1, 2, 7);
    exit($exit);
}

if (isset($_GET["funkcija"]) && $_GET["funkcija"] == "updateTable") {
    $tablica = $_POST["update"];
    $stupac = $_POST["set"];
    $stupacVrijednost = $_POST["jednako"];
    $id = $_POST["whereID"];
    $administrator = $_SESSION["ime"];
    Functions::UpdateTable($tablica, $stupac, $stupacVrijednost, $id);
    Functions::PisiULog("Update", "Administrator $administrator izvršio update nad tablicom $tablica. Promjena: $stupac = $stupacVrijednost WHERE ID = $id");
    echo "<script>alert('Update nad tablicom $tablica izvrsen!');window.location = 'postavkeStranice.php';</script>";
}

if (isset($_GET["funkcija"]) && $_GET["funkcija"] == "deleteColumn") {
    $tablica = $_POST["delete"];
    $stupacID = $tablica . "_ID";
    $id = $_POST["whereID"];
    $administrator = $_SESSION["ime"];
    $upit = "DELETE FROM `WebDiP2017x044`.`$tablica` WHERE `$tablica`.`$stupacID` = $id";
    $rezultat = $veza->selectDB($upit);
    Functions::PisiULog("DELETE", "Administrator $administrator izbrisao redak s ID-em $id iz tablice $tablica");
    echo "<script>alert('Obrisan redak $id!');window.location = 'postavkeStranice.php';</script>";
}


// ispis vrste oglasa po poziciji
if (isset($_POST["funkcija"]) && $_POST["funkcija"] == "ispisVrstaOglasaPoPoziciji") {
    $idPozicije = $_POST["idPozicije"];
    $upit = "SELECT `VrsteOglasa_ID`, `VrsteOglasa_naziv` FROM `VrsteOglasa` NATURAL JOIN `PozicijaOglasa` WHERE `PozicijaOglasa_ID` = $idPozicije";
    $exit = Functions::IspisiComboBox("VrsteOglasa", "Vrsta oglasa: ", $upit, "Odaberite vrstu oglasa", true);
    exit($exit);
}

if (isset($_POST["funkcija"]) && $_POST["funkcija"] == "dohvatiBrojOglasa") {
    $upit = "SELECT * FROM `Oglasi`";
    $rezultat = $veza->selectDB($upit);
    $brojOglasa = mysqli_num_rows($rezultat);

    $exit = array("BrojOglasa" => $brojOglasa);
    exit(json_encode($exit));
}

if (isset($_GET["funkcija"]) && $_GET["funkcija"] == "oglasi") {
    $blokiraj = $_GET["blokiraj"];
    $idOglasa = $_GET["idOglasa"];
    $korisnik = $_SESSION["ime"];

    if ($blokiraj == "yes") { // oglas nije prihvaćen od strane moderatora
        Functions::UpdateTable("Oglasi", "Oglasi_blokiran", 1, $idOglasa);
        Functions::PisiULog("Oglas odbijen", "Korisnik $korisnik je odbio zahtjev za kreiranje novog oglasa s ID-em $idOglasa");
    } else {
        Functions::UpdateTable("Oglasi", "Oglasi_odobren", 1, $idOglasa);
        Functions::PisiULog("Oglas odobren", "Korisnik $korisnik je prihvatio zahtjev za kreiranje novog oglasa s ID-em $idOglasa. Novi oglas je prihvaćen!");
    }
    if ($blokiraj == "yes") {
        echo "<script>alert('Oglas nije odobren!');window.location = 'popisZahtjevaOglasa.php';</script>";
    } else {
        echo "<script>alert('Oglas uspjesno odobren!');window.location = 'popisZahtjevaOglasa.php';</script>";
    }
}

if (isset($_GET["funkcija"]) && $_GET["funkcija"] == "zahtjevi") {
    $blokiraj = $_GET["blokiraj"];
    $idZahtjeva = $_GET["idZahtjeva"];
    $korisnik = $_SESSION["ime"];

    if ($blokiraj == "no") { // zahtjev je odobren! (nemoj blokirati zahtjev)
        Functions::UpdateTable("ZahtjeviZaBlokiranjeOglasa", "Zahtjev_zahtjevOdobren", 0, $idZahtjeva);
        Functions::PisiULog("Zahtjev odbijen", "Korisnik $korisnik je odbio zahtjev za blokiranje oglasa s ID-em $idZahtjeva");
    } else { // zahtjev odobren! -> blokiranje oglasa
        Functions::UpdateTable("ZahtjeviZaBlokiranjeOglasa", "Zahtjev_zahtjevOdobren", 1, $idZahtjeva);
        $upit = "SELECT `Oglasi_ID` FROM `ZahtjeviZaBlokiranjeOglasa` WHERE `ZahtjeviZaBlokiranjeOglasa_ID` = " . $idZahtjeva . ";";
        $rezultat = $veza->selectDB($upit);
        $red = mysqli_fetch_assoc($rezultat);
        $idOglasa = $red["Oglasi_ID"];
        Functions::UpdateTable("Oglasi", "Oglasi_blokiran", 1, $idOglasa);
        Functions::UpdateTable("Oglasi", "Oglasi_odobren", 0, $idOglasa);
        Functions::PisiULog("Zahtjev prihvaćen", "Korisnik $korisnik je prihvatio zahtjev za blokiranje oglasa s ID-em $idZahtjeva. Oglas s ID-em $idOglasa je blokiran!");
    }
    Functions::UpdateTable("ZahtjeviZaBlokiranjeOglasa", "Zahtjev_zahtjevPregledan", 1, $idZahtjeva);
    if ($blokiraj == "no") {
        echo "<script>alert('Zahtjev za blokiranje oglasa odobren! Oglas uspjesno blokiran.');window.location = 'popisZahtjevaOglasa.php';</script>";
    } else {
        echo "<script>alert('Zahtjev za blokiranje oglasa izbrisan!');window.location = 'popisZahtjevaOglasa.php';</script>";
    }
}


if (isset($_GET["funkcija"]) && $_GET["funkcija"] == "proslijediOglas") {
        $idOglasa = $_GET["idOglasa"];
        echo "<script>alert('Uslo u funkciju!');</script>";
        Functions::AutoIncrementColumn("Oglasi", "Oglasi_brojKlikova", $idOglasa);
        $upit = "SELECT * FROM `Oglasi` WHERE `Oglasi_ID` = " . $idOglasa . ";";
        $rezultat = $veza->selectDB($upit);
        $red = mysqli_fetch_assoc($rezultat);
        $urlOglasa = $red["Oglasi_URL"];
        if ($urlOglasa != null) {
            header("Location: $urlOglasa");
        } else {
            echo "<script>alert('Uz oglas nije priložen link!');window.location = 'index.php';</script>";
        }
    }

$veza->zatvoriDB();
