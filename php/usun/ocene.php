<?php

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$operacja = $polaczenie->prepare("SELECT id_oceny FROM dzielo_oceny
                                    WHERE id_dziela =:id_dziela AND 
                                    id_uzytkownika = :id_user ");
$operacja->execute(array(':id_dziela' => $_POST['dzieloID'],':id_user' => $_POST['mojeID']));
$wyniki = $operacja->fetch();

$ID = $wyniki['id_oceny'];

$operacja = $polaczenie->prepare("DELETE FROM dzielo_oceny
                                    WHERE id_oceny =:id_oceny");

$operacja->execute(array(':id_oceny' => $ID));

// USUN POWIAZANE plusy i minusy z ocen od znajomych
$operacja = $polaczenie->prepare("DELETE FROM dzielo_plusyiminusy
                                    WHERE id_ocenionegoPrzedmiotu =:id AND rodzaj=2");

$operacja->execute(array(':id' => $ID));

?>