<?php

$operacja = $polaczenie->prepare("SELECT ocena FROM dzielo_dane WHERE id_dziela = $STRONA_ID");

$operacja->execute();
$wyniki = $operacja->fetch();

return number_format($wyniki['ocena']/100, 2, '.', '')



?>