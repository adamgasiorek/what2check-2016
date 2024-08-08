<?php

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
$insertdate = date("Y-m-d H:i:s", strtotime($_POST['data']));
$odpowiedz = NULL;
if($_POST['parent'] != null)
    $odpowiedz = $_POST['parent'];

$operacja = $polaczenie->prepare("INSERT INTO dzielo_komentarze 
                                  (id_komentarza,komentarz,id_dziela,id_uzytkownika,data,data_modyfikacji,odpowiedz)
                                  VALUES (NULL,:txt,:id_dziela,:id_user,:dataa,NULL,:odpowiedz)");

$operacja->execute(array(':txt' => $_POST['tekst'],':id_dziela' => $_POST['dzieloID'],':id_user' => $_POST['mojeID'],':dataa' => $insertdate,':odpowiedz' => $odpowiedz));


?>