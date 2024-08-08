<?php

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$operacja = $polaczenie->prepare("SELECT id FROM tagi_info WHERE nazwa=:nazwa ");
$operacja->execute(array(':nazwa' => $_POST['tag']));
$rows = $operacja -> rowCount();

if($rows == 0)
{
    /// DODAJE DO BAZY TAGOW
    $operacja = $polaczenie->prepare("INSERT INTO tagi_info (nazwa,popularnosc) VALUES (:nazwa,1)");
    $operacja->execute(array(':nazwa' => $_POST['tag']));
    $TAG_ID = $polaczenie->lastInsertId('id');
}
else
{
    $wyniki = $operacja->fetch();
    $TAG_ID = $wyniki['id'];
}


$operacja = $polaczenie->prepare("DELETE FROM tagi_wystawione WHERE id_dziela=:id_dziela AND id_user=:id_user AND id_tagu=:id_tagu ");
$operacja->execute(array(':id_dziela' => $_POST['dzieloID'],':id_user' => $_POST['mojeID'],':id_tagu' => $TAG_ID));


?>