<?php

    $jezykID = $_POST['jezykID'];
    $idek = $_POST['id'];
    $rodzaj = $_POST['rodzaj'];

    $polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

    $operacja = $polaczenie->prepare("SELECT `$jezykID` FROM tlumaczenia WHERE idek=:id and rodzaj=:rodzaj  LIMIT 1");
    $operacja->execute(array(':id' => $idek,':rodzaj' => $rodzaj));
    $wyniki = $operacja->fetch();

    if($wyniki[$jezykID] == NULL)
    {
        $operacja = $polaczenie->prepare("SELECT `1` FROM tlumaczenia WHERE idek=:id and rodzaj=:rodzaj  LIMIT 1");
        $operacja->execute(array(':id' => $idek,':rodzaj' => $rodzaj));
        $wyniki = $operacja->fetch();

        if($wyniki['1'] == NULL)
            echo '';
        else
            echo $wyniki['1'];

    }
    else
        echo $wyniki[$jezykID];


?>