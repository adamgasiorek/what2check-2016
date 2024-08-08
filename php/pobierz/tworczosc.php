<?php

$operacja = $polaczenie->prepare("SELECT id,id_dziela, rodzaj, jakoKto
                                  FROM dzielo_artysci
                                  WHERE id_artysty=:id_dziela ");

$operacja->execute(array(':id_dziela' => $STRONA_ID ));
$wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

return $wyniki;

?>