<?php

$operacja = $polaczenie->prepare("select dane.kategoria, COUNT(dane.kategoria) as sumka
                                    from dzielo_oceny ocena
                                    inner join dzielo_dane dane
                                    on ocena.id_dziela = dane.id_dziela
                                    WHERE ocena.id_uzytkownika=:id_uzytkownika
                                    GROUP BY dane.kategoria
                                    ORDER BY sumka DESC");

$operacja->execute(array(':id_uzytkownika' => $STRONA_ID));
$wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

return $wyniki;



//$rows = $operacja -> rowCount();

?>