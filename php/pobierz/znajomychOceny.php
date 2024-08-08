<?php

$operacja = $polaczenie->prepare("SELECT ocena,id_uzytkownika,id_oceny
                                  FROM dzielo_oceny 
                                  WHERE id_dziela = $STRONA_ID AND id_uzytkownika != $JA_ID AND status=1");

$operacja->execute();
$wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

return $wyniki;



?>