$(document).ready(function () {

    function PrikaziRandomOglas(pozicija) {
        var brojOglasa = 0;
        $.ajax({
            url: 'AccessDatabase.php',
            method: 'POST',
            dataType: 'json',
            data: {
                funkcija: 'dohvatiBrojOglasa'
            },
            success: function (response) {
                brojOglasa = response["BrojOglasa"];
                var idOglasa = Math.floor((Math.random() * (brojOglasa-1)) + 1);
                IspisiOglas(idOglasa, pozicija);
            }, error: function () {
                alert("Error");
            }
        });
    }

    function IspisiOglas(idOglasa, pozicija) {
        $.ajax({
            url: 'AccessDatabase.php',
            method: 'POST',
            dataType: 'text',
            data: {
                funkcija: 'IspisOglasa',
                idOglasa: idOglasa
            }, success: function (response) {
                $('#oglas-' + pozicija).html(response);
            }, error: function () {
                alert("Error");
            }
        });
    }
    PrikaziRandomOglas(1);
    PrikaziRandomOglas(2);
    PrikaziRandomOglas(3);
    PrikaziRandomOglas(4);
    PrikaziRandomOglas(5);
    PrikaziRandomOglas(6);
    PrikaziRandomOglas(7);

});