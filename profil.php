<?php
include('funkcje/polaczenia.php');

$wymiary = ["four","eight"]; // STOSUNEK LEWEGO DO PRAWEGO TABA (SUMA=12)
$kategoria = 'X'; // PROFIL
include('funkcje/informacje.php');
?>
<!DOCTYPE html>
<html >
    <head >

        <?php
        include('biblioteki/biblioteki.php');
        include('szkielet/info.php');
        include('biblioteki/tabslib.php');
        ?>

        <title >What2Check</title >

    </head >
    <body >
        <?php
        include('szkielet/startOkna.php');
        include('szkielet/dwiepolowki.php');
        include('szkielet/lewastrona.php');

        // LEWA STRONA
        include('uklad/lewastrona/profil/profil.php');
        //echo "adasko";
        include('szkielet/prawastrona.php');
        // PRAWA STRONA
        include('uklad/prawastrona/tab/profil.php'); //profil -- DO ZMIANY zaleznie od kategori

        include('szkielet/startsekcjitabs.php');

        include('uklad/prawastrona/tabssekcje/profil.php'); //profil -- DO ZMIANY zaleznie od kategori
        // KONIEC PRAWA STRONA

        include('szkielet/koniecprawastrona.php');
        include('szkielet/koniecOkna.php');
        ?>
    </body >

</html >


