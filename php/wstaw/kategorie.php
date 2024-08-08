<?php

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$operacja = $polaczenie->prepare("INSERT INTO dzielo_kategoriaWyst 
                                  (id_dziela,id_user,id_kategoria)
                                  VALUES (:id_dziela,:id_user,:id_kategoria)");

$operacja->execute(array(':id_dziela' => $_POST['dzieloID'],':id_user' => $_POST['mojeID'],':id_kategoria' => $_POST['id'] ));


?>