<?php

$operacja = $polaczenie->prepare("select 'SUM' id_kategoria, COUNT(id_kategoria) as freq 
                                    from dzielo_kategoriawyst
                                    WHERE id_dziela=:id_dziela
                                        Union all
                                        select id_kategoria, COUNT(id_kategoria) as freq 
                                          from dzielo_kategoriawyst
                                          WHERE id_dziela=:id_dziela
                                            group by id_kategoria
                                    ");

$operacja->execute(array(':id_dziela' => $STRONA_ID));
$wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

return $wyniki;

?>