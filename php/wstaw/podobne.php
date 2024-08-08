<?php

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$operacja = $polaczenie->prepare("SELECT id_podobienstwa FROM dzielo_podobne WHERE id_podobizny1=:id_dziela AND id_podobizny2=:id_dziela2 ");

$operacja->execute(array(':id_dziela' => $_POST['dzieloID'],':id_dziela2' => $_POST['id_podobnego']));
$rows = $operacja -> rowCount();

if($rows == 0)
{
    $operacja = $polaczenie->prepare("INSERT INTO dzielo_podobne (id_uzytkownika,id_podobizny1,id_podobizny2)
                                      VALUES (:id_user,:id_dziela,:id_dziela2)");

    $operacja->execute(array(':id_dziela' => $_POST['dzieloID'],':id_dziela2' => $_POST['id_podobnego'],':id_user' => $_POST['mojeID']));
    echo true;
}
else
    echo false;



?>