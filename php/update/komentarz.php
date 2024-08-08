<?php

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');


$operacja = $polaczenie->prepare("UPDATE dzielo_komentarze SET data_modyfikacji=:dataa, komentarz=:komentarz WHERE id_komentarza=:id_komentarza ");

$operacja->execute(array(':komentarz' => $_POST['komentarz'],':id_komentarza' => $_POST['id_komentarza'],':dataa' => $_POST['data'] ));




?>