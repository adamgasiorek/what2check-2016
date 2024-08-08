<?php

$operacja = $polaczenie->prepare("SELECT plus
                                  FROM dzielo_plusyiminusy
                                  WHERE id_uzytkownika=:id AND id_ocenionegoPrzedmiotu=:idek AND id_dziela=:id_dziela AND rodzaj=:rodzaj   ");
$operacja->execute(array(':id' =>  $JA_ID,':idek' =>  $idek,':id_dziela' =>  $STRONA_ID,':rodzaj' =>  $rodzaj ));
$wyniki = $operacja->fetch();

if($wyniki['plus'] == 1)
    return 'positive';
else if($wyniki['plus'] == -1)
    return 'negative';
else
    return 'primary';

?>