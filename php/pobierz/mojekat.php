<?php
$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$operacja = $polaczenie->prepare("SELECT id_kategoria
                                  FROM dzielo_kategoriawyst 
                                  WHERE id_dziela=:id_dziela AND id_user=:id_user ");

$operacja->execute(array(':id_dziela' => $_POST['dzieloID'],':id_user' => $_POST['mojeID']));
$wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

$a_json = array();
foreach ($wyniki as $wynik) {
    array_push($a_json,$wynik['id_kategoria']);
}

echo json_encode($a_json);

?>