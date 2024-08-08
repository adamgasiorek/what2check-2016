<?php
$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$operacja = $polaczenie->prepare("SELECT info.nazwa as nazwa, wystawione.status as status, COUNT(*) as ile
                                  FROM tagi_wystawione wystawione
                                  INNER JOIN tagi_info info
                                  ON info.id=wystawione.id_tagu
                                  WHERE wystawione.id_dziela=:id_dziela AND wystawione.id_user =:id_user 
                                  GROUP BY info.id,status
                                  ORDER BY ile DESC ");

$operacja->execute(array(':id_dziela' => $STRONA_ID ,':id_user' => $znajomyID ));
$wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

return $wyniki;

?>