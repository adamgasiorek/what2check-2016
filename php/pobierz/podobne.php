<?php
$operacja = $polaczenie->prepare("SELECT id_podobienstwa as idek, id_podobizny2 as id2, id_podobizny1 as id1 ,id_uzytkownika as id_uzytkownika
                                  FROM dzielo_podobne
                                  WHERE id_podobizny1=:id_dziela OR id_podobizny2=:id_dziela   ");

$operacja->execute(array(':id_dziela' => $STRONA_ID ));
$wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

return $wyniki;

?>