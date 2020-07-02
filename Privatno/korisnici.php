<?php
require '../baza.class.php';

function Ispis() {
    $veza = new Baza();
    $veza->spojiDB();
    $upit = "SELECT * FROM `Korisnici`";
    $rezultat = $veza->selectDB($upit);

    while ($red = mysqli_fetch_array(($rezultat))) {
        print "<tr><td>$red[0]</td><td>$red[1]</td><td>$red[2]</td><td>$red[3]</td><td>$red[4]</td><td>$red[7]</td><td>$red[8]</td></tr>\n";
    }
    $veza->zatvoriDB();
}
?>

<!DOCTYPE html>
<html lang="hr">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/lgaric.css">
        <link rel="stylesheet" type="text/css" href="CSS/lgaric_prilagodbe.css">
        <meta name="naslov" content="Pocetna stranica">
        <meta name="datum posljednje promjene" content="3.4.2018">
        <meta name="autor" content="Luka Garić">
        <link href="https://fonts.googleapis.com/css?family=BioRhyme" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
        <title>Ispis korisnika</title>
    </head>
    <body>
        <div>
            <table border='1' id='tablica'>
                <caption>Korisnici</caption>
                <thead>
                    <tr id='tablicaHeader'>
                        <th>ID</th>
                        <th>Tip korisnika</th>
                        <th>Korisničko ime</th>
                        <th>Email</th>
                        <th>Lozinka</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                    </tr>
                </thead>
                <tbody>
                    <?php Ispis(); ?>
                </tbody>
            </table>
        </div>
    </body>
</html>