<?php


$STRONA_ID = $_GET["id"] ?? 0;


if($kategoria != 'X')
{
    $operacja = $polaczenie->prepare("SELECT id_dziela FROM dzielo_dane WHERE kategoria=:kategoria and id_dziela=:id LIMIT 1");
    $operacja->execute(array(':kategoria' => $kategoria,':id' => $STRONA_ID));
    $rows = $operacja -> rowCount();


    if ($rows ==0) {
        header("location: niematakiego.php");
    }
    else
    {
        $operacja = $polaczenie->prepare("UPDATE dzielo_dane SET wyswietlenia=wyswietlenia+1 
                                          WHERE kategoria=:kategoria and id_dziela=:id ");

        $operacja->execute(array(':kategoria' => $kategoria,':id' => $STRONA_ID));
    }

}




