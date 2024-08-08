<?php

$operacja = $polaczenie->prepare("SELECT ocena,status FROM dzielo_oceny WHERE id_dziela = $STRONA_ID AND id_uzytkownika = $JA_ID");

$operacja->execute();
$wyniki = $operacja->fetch();

if($wyniki['ocena'] != null)
$wyniki['ocena'] /= 100;
return $wyniki;



?>