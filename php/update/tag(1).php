<?php

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');


$operacja = $polaczenie->prepare("SELECT wystawione.id
                                  FROM tagi_wystawione wystawione
                                  INNER JOIN tagi_info info
                                  ON info.id=wystawione.id_tagu
                                  WHERE info.nazwa=:nazwa AND wystawione.id_dziela=:id_dziela AND wystawione.id_user = :id_user ");

$operacja->execute(array(':nazwa' => $_POST['tag'] ,':id_dziela' => $_POST['dzieloID'] , ':id_user' => $_POST['mojeID'] ));
$rows = $operacja -> rowCount();

if($rows == 1)
{
    $wyniki = $operacja->fetch();
    $idek = $wyniki['id'];

    $operacja = $polaczenie->prepare("UPDATE tagi_wystawione SET status=:status WHERE id=:idek");

    $operacja->execute(array(':status' => $_POST['status'],':idek' => $idek ));
}




?>