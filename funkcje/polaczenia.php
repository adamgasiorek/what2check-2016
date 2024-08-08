<?php
declare(strict_types = 1);

session_start();

// POLACZENIE Z BAZA
$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

// USTAWIENIE JEZYKA i MOJEGO ID
$jezykID = $_SESSION["jezykID"] ?? 1;
$JA_ID = $_SESSION["ID_USER"] ?? 0;


// JESLI ZALOGOWANY USTAW NAZWE
if ($JA_ID != 0)
{
    $operacja = $polaczenie->prepare("SELECT login FROM uzytkownika_konta WHERE id_uzytkownika=:id_uzytkownika ");
    $operacja->execute(array(':id_uzytkownika' => $JA_ID));
    $wyniki = $operacja->fetch();
    $JA_NAZWA = $wyniki['login'];
}


//TLUMACZENIE
function tlumaczenie(int $idek,int $rodzaj) :string
{
    global $jezykID,$polaczenie;

    $operacja = $polaczenie->prepare("SELECT `$jezykID` FROM tlumaczenia WHERE idek=:id and rodzaj=:rodzaj  LIMIT 1");
    $operacja->execute(array(':id' => $idek,':rodzaj' => $rodzaj));
    $wyniki = $operacja->fetch();

    if($wyniki[$jezykID] == NULL)
    {
        $operacja = $polaczenie->prepare("SELECT `1` FROM tlumaczenia WHERE idek=:id and rodzaj=:rodzaj  LIMIT 1");
        $operacja->execute(array(':id' => $idek,':rodzaj' => $rodzaj));
        $wyniki = $operacja->fetch();

        if($wyniki['1'] == NULL)
            return '';
        else
            return $wyniki['1'];

    }
    else
        return $wyniki[$jezykID];
}


//TLUMACZENIE
function idToKategoria(int $idek) :string
{
    global $polaczenie;

    $operacja = $polaczenie->prepare("SELECT kategoria FROM dzielo_dane WHERE id_dziela=:id LIMIT 1");
    $operacja->execute(array(':id' => $idek));
    $wyniki = $operacja->fetch();

    return $wyniki['kategoria'];
}

// INT NA KATEGORIE
function intToKategoria(int $kat) :string
{
    if($kat == 1)
        return "film";
    else if($kat == 2)
        return "muzyka";
    else if($kat == 3)
        return "artysta";
    else if($kat == 4)
        return "album";
    else if($kat == 5)
        return "zespol";

}

//INT TO KRAJ
function intToKraj(int $kraj) :string
{
    if($kraj == 1)
        return "gb";
    else if($kraj == 2)
        return "pl";

}

//INT NA IMG
function obrazekAdres(bool $ikona, int $id) :string
{
    $filename = 'FILES/dziela/';

    if($ikona)
        $filename.= 'ikona/';
    else
        $filename.= 'orginalne/';

    $filename.= $id.'.jpg';

    return $filename;
}
