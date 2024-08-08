<?php
$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$operacja = $polaczenie->prepare("SELECT id FROM uzytkownika_znajomi WHERE id_uzytkownika1=:id");

$operacja->execute(array(':id' => $_POST['idTego']));
$rows = $operacja -> rowCount();
echo $rows;

if($rows == 0)
{
    $operacja = $polaczenie->prepare("INSERT INTO uzytkownika_znajomi (id_uzytkownika1,id_uzytkownika2)
                                    VALUES (:id_uzytkownika1,:id_uzytkownika2)");

    $operacja->execute(array(':id_uzytkownika1' => $_POST['mojeID'],':id_uzytkownika2' => $_POST['idTego']));
}
else
{
    $operacja = $polaczenie->prepare("DELETE FROM uzytkownika_znajomi 
                                        WHERE id_uzytkownika1=:id1 AND id_uzytkownika2=:id2");

    $operacja->execute(array(':id1' => $_POST['mojeID'],':id2' => $_POST['idTego']));
}



?>