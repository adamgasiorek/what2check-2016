<?php

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$ID = $_POST['id'];

// USUN TO
$operacja = $polaczenie->prepare("DELETE FROM dzielo_komentarze
                                    WHERE id_komentarza =:id_komentarza");

$operacja->execute(array(':id_komentarza' => $ID));

//USUN ODPOWIEDZI
$operacja = $polaczenie->prepare("DELETE FROM dzielo_komentarze
                                    WHERE odpowiedz =:id_komentarza");

$operacja->execute(array(':id_komentarza' => $ID));

// USUN POWIAZANE plusy i minusy z ocen od znajomych
$operacja = $polaczenie->prepare("DELETE FROM dzielo_plusyiminusy
                                    WHERE id_ocenionegoPrzedmiotu =:id AND rodzaj=1");

$operacja->execute(array(':id' => $ID));

?>