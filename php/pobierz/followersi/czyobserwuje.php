<?php

$idTego = $_POST['idTego'];
$mojeID = $_POST['mojeID'];

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$operacja = $polaczenie->prepare("SELECT id
                                  FROM uzytkownika_znajomi 
                                  WHERE id_uzytkownika2=:id AND id_uzytkownika1=:id2   ");
$operacja->execute(array(':id' => $idTego,':id2' => $mojeID));
//$wyniki = $operacja->fetch();
$rows = $operacja -> rowCount();


echo $rows;

?>