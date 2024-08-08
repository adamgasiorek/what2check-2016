<?php

$operacja = $polaczenie->prepare("SELECT info.nazwa as nazwa, wystawione.status as status
                                  FROM tagi_wystawione wystawione
                                  INNER JOIN tagi_info info
                                  ON info.id=wystawione.id_tagu
                                  WHERE wystawione.id_dziela=:id_dziela AND wystawione.id_user = :id_user 
                                  ORDER BY wystawione.id ASC ");

$operacja->execute(array(':id_dziela' => $STRONA_ID ,':id_user' => $JA_ID ));
$wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

return $wyniki;

?>