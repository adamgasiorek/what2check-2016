<?php

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$operacja = $polaczenie->prepare("DELETE FROM dzielo_kategoriawyst
                                    WHERE id_dziela=:id_dziela AND id_user=:id_user AND id_kategoria=:id_kategoria");

$operacja->execute(array(':id_dziela' => $_POST['dzieloID'],':id_user' => $_POST['mojeID'],':id_kategoria' => $_POST['id']));

?>