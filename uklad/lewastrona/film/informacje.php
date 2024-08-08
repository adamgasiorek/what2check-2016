<?php


$operacja = $polaczenie->prepare("SELECT rok,czas_trwania,kraj_kod FROM fimy_dane WHERE id_filmu=:id_filmu LIMIT 1");
$operacja->execute(array(':id_filmu' => $STRONA_ID));
$wyniki = $operacja->fetch();

echo "ROK ".$wyniki['rok']."<br>";

echo "czas  ".$wyniki['czas_trwania']."<br>";

//echo intToKraj($wyniki['kraj_kod']);
?>