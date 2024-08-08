<?php

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');


if(isset($_POST['rekomendacja']))
{
    $operacja = $polaczenie->prepare("SELECT id_dziela,kategoria,ocena,wyswietlenia,jakosc,rok
                                      FROM dzielo_dane LIMIT 100");

    $operacja->execute();
    $wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($wyniki);

}
else
{
    if(isset($_POST['kategoria']))
    {
        $operacja = $polaczenie->prepare("SELECT id_dziela,kategoria ,ocena,wyswietlenia,jakosc,rok
                                          FROM dzielo_dane WHERE kategoria=:kat LIMIT 100");

        $operacja->execute(array(':kat' => $_POST['kategoria']));
        $wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($wyniki);

    }
}

?>