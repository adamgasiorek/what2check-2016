<?php

$operacja = $polaczenie->prepare("SELECT SUM(plus) as sumka
                                  FROM dzielo_plusyiminusy
                                  WHERE id_ocenionegoPrzedmiotu=:id AND id_dziela=:id_dziela AND rodzaj=:rodzaj  ");
$operacja->execute(array(':id' =>  $idek,':id_dziela' =>  $STRONA_ID,':rodzaj' =>  $rodzaj ));
$wyniki = $operacja->fetch();

return $wyniki;

?>