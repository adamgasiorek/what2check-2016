<?php

$operacja = $polaczenie->prepare("SELECT id,id_artysty,rodzaj
                                  FROM zespol_artysci
                                  WHERE id_zespolu=:id_zespolu ");

$operacja->execute(array(':id_zespolu' => $STRONA_ID ));
$wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

return $wyniki;

?>