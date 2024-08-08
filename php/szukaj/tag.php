<?php

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');


if(isset($_POST['term']))
{
    $term = trim(strip_tags($_POST['term']));
    $a_json = array();
    $a_json_row = array();

    $operacja = $polaczenie->prepare("SELECT nazwa
                                      FROM tagi_info
                                      WHERE nazwa LIKE ? LIMIT 3 ");

    $operacja->execute(array("%$term%"));
    $wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);


    foreach ($wyniki as $wynik) {
        array_push($a_json, $wynik['nazwa']);
    }

    echo json_encode($a_json);

}

?>