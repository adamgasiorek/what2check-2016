<?php

// INT NA KATEGORIE
function intToKategoria(int $kat) :string
{
    if($kat == 1)
        return "film";
    else if($kat == 2)
        return "muzyka";
    else if($kat == 3)
        return "artysta";

}

//INT NA IMG
function obrazekAdres(bool $ikona, int $id) :string
{
    global $jezykID;

    $filename = 'FILES/dziela/';

    if($ikona)
        $filename.= 'ikona/';
    else
        $filename.= 'orginalne/';

    $filename.= $jezykID.'/'.$id.'.jpg';

    if (file_exists($filename)) {
        return $filename;
    } else {
        $filename = 'FILES/dziela/';

        if($ikona)
            $filename.= 'ikona/';
        else
            $filename.= 'orginalne/';

        $filename.= '1/'.$id.'.jpg';
        return $filename;
    }
}



$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');


if(isset($_POST['term']))
{
    $term = trim(strip_tags($_POST['term']));
    $jezykID = $_POST['jezyk'];
    $kat = $_POST['kat'];
    $idek = $_POST['idek'];
    $a_json = array();
    $a_json_row = array();
    $ideki = array();

    $operacja = $polaczenie->prepare("SELECT `$jezykID`,idek
                                      FROM tlumaczenia                                  
                                      WHERE `$jezykID` LIKE ? and rodzaj=2 and idek !=$idek
                                      LIMIT 3 ");

    $operacja->execute(array("%$term%"));
    $wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);


    foreach ($wyniki as $wynik) {
        $operacja = $polaczenie->prepare("SELECT kategoria
                                          FROM dzielo_dane                                  
                                          WHERE id_dziela= ?");

        $operacja->execute(array($wynik['idek']));
        $wynik2 = $operacja->fetch();

        if($kat == $wynik2['kategoria']  )
        {
            array_push($ideki, $wynik['idek']);
            $a_json_row['nazwa'] = $wynik[$jezykID];
            $a_json_row['idek'] = $wynik['idek'];
            $a_json_row['kategoria'] = intToKategoria($wynik2['kategoria']);
            $a_json_row['kat'] = $wynik2['kategoria'];
            $a_json_row['img'] = obrazekAdres(true,$wynik['idek']);
            array_push($a_json, $a_json_row);
        }
    }

    // ZEBY SIE NIE POWTARZALY W JEDNYCH WYNIKACH TE SAME
    if(count($a_json) < 3)
    {
        if(count($ideki) > 0)
        {
            $placeHolders = implode(', ', array_fill(0, count($ideki), '?'));
            $operacja = $polaczenie->prepare("SELECT `1`,idek
                                      FROM tlumaczenia
                                      WHERE rodzaj=2 and idek NOT IN ($placeHolders) AND `1` LIKE ? and idek !=$idek
                                      LIMIT 3 ");
            $indexx = 1;
            foreach ($ideki as $valuex) {
                $operacja->bindValue($indexx, $valuex, PDO::PARAM_INT);
                $indexx++;
            }
            $operacja->bindValue($indexx, "%$term%", PDO::PARAM_STR);

            $operacja->execute();
            $wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            $operacja = $polaczenie->prepare("SELECT `1`,idek
                                      FROM tlumaczenia
                                      WHERE rodzaj=2 AND `1` LIKE ? and idek !=$idek
                                      LIMIT 3 ");
            $operacja->bindValue(1, "%$term%", PDO::PARAM_STR);

            $operacja->execute();
            $wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);
        }





        foreach ($wyniki as $wynik) {
            $operacja = $polaczenie->prepare("SELECT kategoria
                                          FROM dzielo_dane
                                          WHERE id_dziela= ?");

            $operacja->execute(array($wynik['idek']));
            $wynik2 = $operacja->fetch();

            if($kat == $wynik2['kategoria'] ) {
                $a_json_row['nazwa'] = $wynik['1'];
                $a_json_row['idek'] = $wynik['idek'];
                $a_json_row['kategoria'] = intToKategoria($wynik2['kategoria']);
                $a_json_row['kat'] = $wynik2['kategoria'];
                $a_json_row['img'] = obrazekAdres(true, $wynik['idek']);
                array_push($a_json, $a_json_row);
            }
        }
    }

    echo json_encode($a_json);

}

?>