<?php

$operacja = $polaczenie->prepare("SELECT wyswietlenia FROM dzielo_dane WHERE id_dziela = $STRONA_ID");

$operacja->execute();
$wyniki = $operacja->fetch();

return $wyniki['wyswietlenia'];



?>