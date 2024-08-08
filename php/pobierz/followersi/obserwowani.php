<?php

$idTego = $_POST['idTego'];

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$operacja = $polaczenie->prepare("SELECT id
                                  FROM uzytkownika_znajomi 
                                  WHERE id_uzytkownika1=:id  ");
$operacja->execute(array(':id' => $idTego));
//$wyniki = $operacja->fetch();
$rows = $operacja -> rowCount();


echo $rows;

?>