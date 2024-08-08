<?php

$operacja = $polaczenie->prepare("select ocena , COUNT(ocena) as sumka
                                    from dzielo_oceny 
                                    WHERE id_uzytkownika=:id_uzytkownika
                                    GROUP BY ocena");

$operacja->execute(array(':id_uzytkownika' => $STRONA_ID));
$wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

return $wyniki;



//$rows = $operacja -> rowCount();

?>