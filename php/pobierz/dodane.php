<?php

$operacja = $polaczenie->prepare("SELECT *
                                  FROM dodane_dziela ");

$operacja->execute();
$wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

return $wyniki;

?>