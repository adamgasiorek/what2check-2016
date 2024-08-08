<?php

$operacja = $polaczenie->prepare("SELECT id,id_dziela
                                  FROM dzielo_artysci
                                  WHERE jakoKto=:id_dziela 
                                  GROUP BY id_dziela");

$operacja->execute(array(':id_dziela' => $STRONA_ID ));
$wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

return $wyniki;

?>