/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    $('#korime').keyup(function () {
        if ($('#korime').val() != "") {
            var korisnickoIme = $('#korime').val();
            $.ajax({
                method: 'POST',
                url: 'AccessDatabase.php',
                data: {
                    funkcija: "provjeriKorisnickoIme",
                    korime: korisnickoIme
                },
                dataType: 'text',
                success: function (response) {
                    if (response === "Zauzeto") {
                        $('#labelkorime').removeClass('zeleno');
                        $('#labelkorime').addClass('crveno');
                        $('#labelkorime').html('Korisničko ime je zauzeto!');
                    } else if (response === "Slobodno") {
                        $('#labelkorime').removeClass('crveno');
                        $('#labelkorime').addClass('zeleno');
                        $('#labelkorime').html('Korisničko ime je slobodno! :)');
                    }
                },
                error: function () {
                    alert("Error u ajax upitu!");
                }
            });
        }
    });

    // prikaz statistike tablica - AJAX (administrator)
    $('#statistikaComboBox').change(function () {
        var odabranaTablica = $('#statistikaComboBox option:selected').text();
        $.ajax({
            method: 'POST',
            url: 'AccessDatabase.php',
            data: {
                tablica: odabranaTablica
            },
            dataType: 'text',
            success: function (response) {
                if (response === "Error") {
                    $('#ispisTabliceDiv').html('Pogreška prilikom ispisa tablice');
                } else {
                    $('#ispisTabliceDiv').html(response);
                    $('#tablica').DataTable();
                }
            },
            error: function () {
                alert("Error u ajax upitu!");
            }
        });
    });

    // prikaz statistike tablica - PHP (administrator)
    $('#statistikaPHPComboBox').change(function () {
        var odabranaTablica = $('#statistikaPHPComboBox option:selected').text();
        var putanja = "statistika.php?tablica=";
        var novaPutanja = putanja.concat(odabranaTablica);
        $('#statistikaPHPGumb').attr("href", novaPutanja);
    });

    // prikaz statistike natjecanja - PHP
    $('#statistikaNatjecanjaComboBox').change(function () {
        var odabranaTablica = $('#statistikaNatjecanjaComboBox option:selected').val();
        var putanja = "statistikaNatjecanja.php?idNatjecanja=";
        var novaPutanja = putanja.concat(odabranaTablica);
        $('#statistikaGumb').attr("href", novaPutanja);
    });

    // prikaz statistike natjecanja - AJAX
    $('#statistikaNatjecanjaComboBoxAJAX').change(function () {
        var idNatjecanja = $('#statistikaNatjecanjaComboBoxAJAX option:selected').val();
        $.ajax({
            method: 'GET',
            url: 'AccessDatabase.php',
            data: {
                funkcija: "ispisStatistikeNatjecanja",
                idNatjecanja: idNatjecanja
            },
            dataType: 'text',
            success: function (response) {
                $('#ispisTabliceDiv').html(response);
                $('#tablica').DataTable();
            },
            error: function () {
                alert("Error u ajax upitu!");
            }
        });
    });

    $('#menu').click(function () {
        $('.mobile-nav').toggleClass("hidden");
    });

    // blokiraj korisnika - PHP
    $('#korisniciblockComboBoxPHP').change(function () {
        var korime = $('#korisniciblockComboBoxPHP option:selected').text();
        var putanja = "AccessDatabase.php?funkcija=blokiraj&korime=" + korime;
        $('#blockKorisniciGumbPHP').attr("href", putanja);
    });

    // odblokiraj korisnika - PHP
    $('#korisniciunblockComboBoxPHP').change(function () {
        var korime = $('#korisniciunblockComboBoxPHP option:selected').text();
        var putanja = "AccessDatabase.php?funkcija=odblokiraj&korime=" + korime;
        $('#unblockKorisniciGumbPHP').attr("href", putanja);
    });

    
    // blokiraj moderatora - ComboBox
    $('#moderatorblockComboBox').change(function () {
        var idModeratora = $('#moderatorblockComboBox option:selected').val();
        $.ajax({
            method: 'POST',
            url: 'AccessDatabase.php',
            data: {
                funkcija: "ispisCBModeratora",
                block: "yes",
                idModeratora: idModeratora
            },
            dataType: 'text',
            success: function (response) {
                $('#moderatoriCBBlock').html(response);
            },
            error: function () {
                alert("Error u ajax upitu!");
            }
        });
    });
    
    // blokiraj moderatora - PHP
    $('#moderatoriCBBlock').on('change', 'select', function () {
        var idKorisnika = $('#moderatorblockComboBox option:selected').val();
        var idKategorije = $('#kategorijaModeratoraBlock option:selected').val();
        var putanja = "AccessDatabase.php?funkcija=blokirajModeratora&idKorisnika=" + idKorisnika + "&idKategorije=" + idKategorije;
        $('#moderatorBlockGumb').attr("href", putanja);
    });
    
    // blokiraj moderatora - AJAX
    $('#moderatorBlockGumbAJAX').click(function () {
        var idKorisnika = $('#moderatorblockComboBox option:selected').val();
        var idKategorije = $('#kategorijaModeratoraBlock option:selected').val();
        $.ajax({
            method: 'GET',
            url: 'AccessDatabase.php',
            data: {
                funkcija: "blokirajModeratora",
                idKorisnika: idKorisnika,
                idKategorije: idKategorije
            },
            dataType: 'text',
            success: function (response) {
                if (response === "Error") {
                    alert("Pogreška kod blokiranja!");
                } else {
                    alert('Moderator uspješno blokiran!');
                }
            },
            error: function () {
                alert("Error u ajax upitu!");
            }
        });
    });


    // odblokiraj moderatora - ComboBox
    $('#moderatorunblockComboBox').change(function () {
        var idModeratora = $('#moderatorunblockComboBox option:selected').val();
        $.ajax({
            method: 'POST',
            url: 'AccessDatabase.php',
            data: {
                funkcija: "ispisCBModeratora",
                block: "no",
                idModeratora: idModeratora
            },
            dataType: 'text',
            success: function (response) {
                $('#moderatoriCBUnblock').html(response);
            },
            error: function () {
                alert("Error u ajax upitu!");
            }
        });
    });

    // odblokiraj moderatora - PHP
    $('#moderatoriCBUnblock').on('change', 'select', function () {
        var idKorisnika = $('#moderatorunblockComboBox option:selected').val();
        var idKategorije = $('#kategorijaModeratoraUnblock option:selected').val();
        var putanja = "AccessDatabase.php?funkcija=odblokirajModeratora&idKorisnika=" + idKorisnika + "&idKategorije=" + idKategorije;
        $('#moderatorUnblockGumb').attr("href", putanja);
    });


    // odblokiraj moderatora - AJAX
    $('#moderatorUnblockGumbAJAX').click(function () {
        var idKorisnika = $('#moderatorunblockComboBox option:selected').val();
        var idKategorije = $('#kategorijaModeratoraUnblock option:selected').val();
        $.ajax({
            method: 'GET',
            url: 'AccessDatabase.php',
            data: {
                funkcija: "odblokirajModeratora",
                idKorisnika: idKorisnika,
                idKategorije: idKategorije
            },
            dataType: 'text',
            success: function (response) {
                if (response === "Error") {
                    alert("Pogreška kod blokiranja!");
                } else {
                    alert('Moderator uspješno odblokiran!');
                }
            },
            error: function () {
                alert("Error u ajax upitu!");
            }
        });
    });



    $('#statistikaNatjecanjaComboBoxAJAX').change(function () {
        var idNatjecanja = $('#statistikaNatjecanjaComboBoxAJAX option:selected').val();
        $.ajax({
            method: 'GET',
            url: 'AccessDatabase.php',
            data: {
                funkcija: "ispisStatistikeNatjecanja",
                idNatjecanja: idNatjecanja
            },
            dataType: 'text',
            success: function (response) {
                $('#ispisTabliceDiv').html(response);
            },
            error: function () {
                alert("Error u ajax upitu!");
            }
        });
    });

    // ispis pitanja po kategoriji
    $('#novoPitanjeKategorije').change(function () {
        var idKategorije = $('#novoPitanjeKategorije option:selected').val();
        $.ajax({
            method: 'GET',
            url: 'AccessDatabase.php',
            data: {
                funkcija: "IspisPitanjaPoKategoriji",
                idKategorije: idKategorije
            },
            dataType: 'text',
            success: function (response) {
                if (response === "Error") {
                    alert("Ne postoje pitanja za odabranu kategoriju!");
                } else {
                    $('#pitanja').html(response);
                }
            },
            error: function () {
                alert("Error u ajax upitu!");
            }
        });
    });

    // onemoguci kategoriju - PHP
    $('#kategorijeblockComboBox').change(function () {
        var idKategorije = $('#kategorijeblockComboBox option:selected').val();
        var naziv = $('#kategorijeblockComboBox option:selected').text();
        $.ajax({
            method: 'GET',
            url: 'AccessDatabase.php',
            data: {
                funkcija: "onemoguciKategoriju",
                idKategorije: idKategorije,
                natjecanje: naziv
            },
            dataType: 'text',
            success: function (response) {
                if (response === "Error") {
                    alert("Pogreška kod blokiranja!");
                } else {
                    alert("Kategorija " + naziv + "uspješno onemogućena!");
                }
            },
            error: function () {
                alert("Error u ajax upitu!");
            }
        });
    });

    // omoguci kategoriju - PHP
    $('#kategorijeunblockComboBox').change(function () {
        var idKategorije = $('#kategorijeunblockComboBox option:selected').val();
        var naziv = $('#kategorijeunblockComboBox option:selected').text();
        $.ajax({
            method: 'GET',
            url: 'AccessDatabase.php',
            data: {
                funkcija: "omoguciKategoriju",
                idKategorije: idKategorije,
                natjecanje: naziv
            },
            dataType: 'text',
            success: function (response) {
                if (response === "Error") {
                    alert("Pogreška kod blokiranja!");
                } else {
                    alert("Kategorija " + naziv + " uspješno omogućena!");
                }
            },
            error: function () {
                alert("Error u ajax upitu!");
            }
        });
    });

    // blokiraj korisnika - AJAX
    $('#korisniciblockComboBox').change(function () {
        var korime = $('#korisniciblockComboBox option:selected').text();
        $.ajax({
            method: 'GET',
            url: 'AccessDatabase.php',
            data: {
                funkcija: "blokiraj",
                tablica: korime
            },
            dataType: 'text',
            success: function (response) {
                if (response === "Error") {
                    alert("Pogreška kod blokiranja!");
                } else {
                    alert("Korisnik " + korime + " uspješno blokiran!");
                }
            },
            error: function () {
                alert("Error u ajax upitu!");
            }
        });
    });

    // odblokiraj korisnika - AJAX
    $('#korisniciunblockComboBox').change(function () {
        var korime = $('#korisniciunblockComboBox option:selected').text();
        $.ajax({
            method: 'GET',
            url: 'AccessDatabase.php',
            data: {
                funkcija: "odblokiraj",
                tablica: korime
            },
            dataType: 'text',
            success: function (response) {
                if (response === "Error") {
                    alert("Pogreška kod blokiranja!");
                } else {
                    alert("Korisnik " + korime + "  uspješno odblokiran!");
                }
            },
            error: function () {
                alert("Error u ajax upitu!");
            }
        });
    });


    //provjera jesu li lozinke iste
    $('#lozinka2').keyup(function () {
        var lozinka1 = $('#lozinka1').val();
        var lozinka2 = $('#lozinka2').val();
        $('#provjeraLozinke').removeClass('hidden');
        if (lozinka1 === lozinka2) {
            $('#provjeraLozinke').removeClass('crveno');
            $('#provjeraLozinke').addClass('zeleno');
            $('#provjeraLozinke').text("Lozinke su jednake!");
        } else {
            $('#provjeraLozinke').removeClass('zeleno');
            $('#provjeraLozinke').addClass('crveno');
            $('#provjeraLozinke').text("Lozinke ne odgovaraju!");
        }
    });


    $('#email').keyup(function () {
        var regex = new RegExp(/^(?=.{10,30}$)[a-zA-Z0-9]{1,}\.?[a-zA-Z0-9]{0,}@[a-zA-Z0-9]{1,}\.[a-zA-Z]{2,}$/);
        $('#validateEmail').css("font-weight", "bold");
        if (regex.test($('#email').val())) {
            $('#validateEmail').removeClass('crveno');
            $('#validateEmail').addClass('zeleno');
            $('#validateEmail').text("Email adresa: Email is valid!");
        } else {
            $('#validateEmail').removeClass('zeleno');
            $('#validateEmail').addClass('crveno');
            $('#validateEmail').text("Email adresa: Email is NOT valid!");
        }
    });

    $('#print').click(function () {
        print();
    });

    //virtualno vrijeme - AJAX
    $('#ucitajVrijemeAJAX').click(function () {
        $.ajax({
            method: 'GET',
            url: 'AccessDatabase.php',
            data: {
                funkcija: "ucitajVrijeme"
            },
            dataType: 'text',
            success: function (response) {
                if (response === "Error") {
                    alert("Pogreška kod blokiranja!");
                } else {

                    alert('Sustav postavljen na novo vrijeme!');
                }
            },
            error: function () {
                alert("Error u ajax upitu!");
            }
        });
    });
    
    // novi oglas -> vrste - ComboBox
    $('#pozicijaOglasaComboBox').change(function () {
        var idPozicije = $('#pozicijaOglasaComboBox option:selected').val();
        $.ajax({
            method: 'POST',
            url: 'AccessDatabase.php',
            data: {
                funkcija: "ispisVrstaOglasaPoPoziciji",
                idPozicije: idPozicije
            },
            dataType: 'text',
            success: function (response) {
                $('#vrstaOglasa').html(response);
            },
            error: function () {
                alert("Error u ajax upitu!");
            }
        });
    });

    // blokiraj/odobri oglas
    $('#oglasiOznaci').change(function () {
        var idOglasa = $('#oglasiOznaci option:selected').val();
        var putanja = "AccessDatabase.php?funkcija=oglasi&blokiraj=no&idOglasa=" + idOglasa;
        $('#odobriOglas').attr("href", putanja);
        var putanja = "AccessDatabase.php?funkcija=oglasi&blokiraj=yes&idOglasa=" + idOglasa;
        $('#blokirajOglas').attr("href", putanja);
    });
    
    // blokiraj/odobri zahtjev
    $('#zahtjevOznaci').change(function () {
        var idZahtjeva = $('#zahtjevOznaci option:selected').val();
        var putanja = "AccessDatabase.php?funkcija=zahtjevi&blokiraj=no&idZahtjeva=" + idZahtjeva;
        $('#odobriZahtjev').attr("href", putanja);
        var putanja = "AccessDatabase.php?funkcija=zahtjevi&blokiraj=yes&idZahtjeva=" + idZahtjeva;
        $('#blokirajZahtjev').attr("href", putanja);
    });

    //DataTable
    $('#tablica').DataTable({
        "aaSorting": [[0, "asc"], [1, "asc"], [2, "asc"]],
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": true
    });


});

