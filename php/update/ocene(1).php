<?php

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$operacja = $polaczenie->prepare("UPDATE dzielo_dane
                                      SET ocena =(ocena+:ocena)/2
                                      WHERE id_dziela=:id_dziela");

$operacja->execute(array(':ocena' => ($_POST['ocena']*100), ':id_dziela' => $_POST['dzieloID']));

$operacja = $polaczenie->prepare("UPDATE dzielo_oceny SET ocena=:ocena WHERE id_dziela=:id_dziela AND id_uzytkownika=:id_uzytkownika");

$operacja->execute(array(':ocena' => ($_POST['ocena']*100),':id_dziela' => $_POST['dzieloID'],':id_uzytkownika' => $_POST['mojeID'] ));



?>