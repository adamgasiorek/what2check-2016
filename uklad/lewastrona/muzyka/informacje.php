<?php


$operacja = $polaczenie->prepare("SELECT rok,kraj_kod FROM muzyka_dane WHERE id_muzyki=:id_muzyki LIMIT 1");
$operacja->execute(array(':id_muzyki' => $STRONA_ID));
$wyniki = $operacja->fetch();

echo "ROK ".$wyniki['rok']."<br>";

//echo intToKraj($wyniki['kraj_kod']);
?>