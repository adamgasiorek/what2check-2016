<?php
include('../funkcje/polaczenia.php');

var_dump($_POST);

$TYTUL = '';
$OPIS = '';

foreach(array_keys($_POST) as $nmkey)
{
    if(substr($nmkey, 1, 5) == "Tytul")
    {
        $TYTUL .= substr($nmkey, 0, 1).";".$_POST[$nmkey];
    }
    else if(substr($nmkey, 1, 5) == "Opis")
    {
        if($_POST[$nmkey] != '')
            $OPIS .= substr($nmkey, 0, 1).";".$_POST[$nmkey];
    }


//    if(ctype_digit ( substr($nmkey, 0, 1) ))
//    {
//        echo "liczba";
//    }
}


echo $TYTUL." i ".$OPIS;




$operacja = $polaczenie->prepare("INSERT INTO dodane_dziela(id_user,tytulik,opis) VALUES(:id_user,:tytulik,:opis)");
$operacja->execute(array(':id_user' => $JA_ID,':tytulik' => $TYTUL,':opis' => $OPIS));
$lastinsertId = $polaczenie->lastInsertId();


//IKONA
$data = $_POST['image-data'];
$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
file_put_contents('../TEST/ikony/'.$lastinsertId.'.jpg', $data);

// ORGINALNE
$data2 = $_POST['image-data2'];
$data2 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data2));
file_put_contents('../TEST/orginalne/'.$lastinsertId.'.jpg', $data2);






?>