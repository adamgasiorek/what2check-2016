<?php

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$operacja = $polaczenie->prepare("SELECT id_oceny FROM dzielo_oceny WHERE id_dziela=:id_dziela AND id_uzytkownika =:id_user");

$operacja->execute(array(':id_dziela' => $_POST['dzieloID'],':id_user' => $_POST['mojeID']));
$rows = $operacja -> rowCount();
echo $rows;
if($rows == 0)
{
    $operacja = $polaczenie->prepare("UPDATE dzielo_dane 
                                      SET ocena =:ocena
                                      WHERE id_dziela=:id_dziela");

    $operacja->execute(array(':ocena' => ($_POST['ocena']*100), ':id_dziela' => $_POST['dzieloID']));


    $operacja = $polaczenie->prepare("INSERT INTO dzielo_oceny (id_dziela,id_uzytkownika,ocena,status)
                                    VALUES (:id_dziela,:id_user,:ocena,:status)");

    $operacja->execute(array(':id_dziela' => $_POST['dzieloID'],':id_user' => $_POST['mojeID'],':ocena' => ($_POST['ocena']*100),':status'
    =>$_POST['status']));

}


?>