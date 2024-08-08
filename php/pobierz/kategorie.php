<?php

$operacja = $polaczenie->prepare("SELECT id
                                  FROM dzielo_kategoria 
                                  WHERE kategoria=$kategoria ");

$operacja->execute();
$wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

return $wyniki;

?>