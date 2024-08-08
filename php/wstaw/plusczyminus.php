<?php

$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$operacja = $polaczenie->prepare("SELECT id_plusaminusa FROM dzielo_plusyiminusy 
                                  WHERE id_dziela=:id_dziela AND id_uzytkownika =:id_user AND id_ocenionegoPrzedmiotu=:id AND rodzaj=:rodzaj");

$operacja->execute(array(':id_dziela' => $_POST['dzieloID'],':id_user' => $_POST['mojeID'],':id' => $_POST['id'],':rodzaj' => $_POST['rodzaj']));
$rows = $operacja -> rowCount();

if($rows == 0)
{
    $operacja = $polaczenie->prepare("INSERT INTO dzielo_plusyiminusy (id_dziela,id_uzytkownika,id_ocenionegoPrzedmiotu,rodzaj,plus)
                                        VALUES (:id_dziela,:id_user,:id,:rodzaj,:plus)");

    $operacja->execute(array(':id_dziela' => $_POST['dzieloID'],':id_user' => $_POST['mojeID'],':id' => $_POST['id'],':rodzaj' => $_POST['rodzaj'],':plus' => $_POST['plus']));
}
else
{
    if($_POST['plus'] == 0) // 0 to po cholere to trzymac jak mozna usunac
    {
        $operacja = $polaczenie->prepare("DELETE FROM dzielo_plusyiminusy
                                          WHERE id_dziela=:id_dziela AND id_uzytkownika =:id_user AND id_ocenionegoPrzedmiotu=:id AND rodzaj=:rodzaj");

        $operacja->execute(array(':id_dziela' => $_POST['dzieloID'],':id_user' => $_POST['mojeID'],':id' => $_POST['id'],':rodzaj' => $_POST['rodzaj']));
    }
    else
    {
        //JUZ JEST WIEC UPDATE
        $operacja = $polaczenie->prepare("UPDATE dzielo_plusyiminusy SET plus=:plus
                                          WHERE id_dziela=:id_dziela AND id_uzytkownika =:id_user AND id_ocenionegoPrzedmiotu=:id AND rodzaj=:rodzaj");

        $operacja->execute(array(':id_dziela' => $_POST['dzieloID'],':id_user' => $_POST['mojeID'],':id' => $_POST['id'],':rodzaj' => $_POST['rodzaj'],':plus' => $_POST['plus']));
    }

}



?>