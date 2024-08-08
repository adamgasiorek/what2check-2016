<?php

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$mojeID = $_POST['mojeID'];

if(isset($_POST['all']))
{
    $operacja = $polaczenie->prepare("SELECT oceny.id_dziela , dane.kategoria,dane.ocena, dane.wyswietlenia, dane.jakosc
                                            FROM dzielo_oceny oceny
                                            INNER JOIN dzielo_dane dane
                                            ON dane.id_dziela = oceny.id_dziela
                                            WHERE id_uzytkownika=:id LIMIT 100");

    $operacja->execute(array(':id' => $mojeID));
    $wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($wyniki);

}
else
{
    if(isset($_POST['kategoria']))
    {
        $operacja = $polaczenie->prepare("SELECT oceny.id_dziela , dane.kategoria,dane.ocena, dane.wyswietlenia, dane.jakosc
                                            FROM dzielo_oceny oceny
                                            INNER JOIN dzielo_dane dane
                                            ON dane.id_dziela = oceny.id_dziela
                                            WHERE dane.kategoria=:kat AND id_uzytkownika=:id LIMIT 100");

        $operacja->execute(array(':kat' => $_POST['kategoria'],':id' => $mojeID));
        $wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($wyniki);

    }
}

?>