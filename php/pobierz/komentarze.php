<?php
$polaczenie = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$operacja = $polaczenie->prepare("SELECT kom.komentarz, kom.data, kom.data_modyfikacji, kom.odpowiedz, kom.id_uzytkownika as idek, kom.id_komentarza
                                  FROM dzielo_komentarze kom
                                  WHERE kom.id_dziela=:id_dziela   ");

$operacja->execute(array(':id_dziela' =>  $_POST['dzieloID'] ));
$wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);

$a_json = array();
foreach ($wyniki as $wynik) {

    $operacja = $polaczenie->prepare("SELECT SUM(plus) as ile
                                  FROM dzielo_plusyiminusy
                                  WHERE id_ocenionegoPrzedmiotu=:id AND id_dziela=:id_dziela AND rodzaj=1  ");
    $operacja->execute(array(':id' =>  $wynik['id_komentarza'],':id_dziela' =>  $_POST['dzieloID'] ));
    $wyniki2 = $operacja->fetch();

    $operacja = $polaczenie->prepare("SELECT login
                                  FROM uzytkownika_konta
                                  WHERE id_uzytkownika=:id   ");
    $operacja->execute(array(':id' =>  $wynik['idek'] ));
    $wyniki3 = $operacja->fetch();

    if($wynik['data_modyfikacji'] == NULL)
        $wynik['data_modyfikacji'] = $wynik['data'];

    if($wynik['idek']  == $_POST['mojeID'] )
        $created_by_current_user = true;
    else
        $created_by_current_user = false;

    $operacja = $polaczenie->prepare("SELECT plus
                                  FROM dzielo_plusyiminusy
                                  WHERE id_uzytkownika=:id AND id_ocenionegoPrzedmiotu=:idek AND id_dziela=:id_dziela AND rodzaj=1   ");
    $operacja->execute(array(':id' =>  $_POST['mojeID'] , ':idek' =>  $wynik['id_komentarza'],':id_dziela' =>  $_POST['dzieloID']  ));
    $rows = $operacja -> rowCount();
    $wyniki4 = $operacja->fetch();

    $user_has_upvoted = false;
    if($rows >= 1)
        $user_has_upvoted = true;

    $object = array(
        'id' => $wynik['id_komentarza'],
        'parent' => $wynik['odpowiedz'],
        'created' => $wynik['data'],
        'modified' => $wynik['data_modyfikacji'],
        'content' => $wynik['komentarz'],
        "upvote_count" => $wyniki2['ile'] ?? 0,
        "fullname" => $wyniki3['login'],
        "profile_picture_url" => "FILES/profile/2.jpg",
        "created_by_current_user" => $created_by_current_user,
        "user_has_upvoted" => $user_has_upvoted,
        "mojaocena" => $wyniki4['plus'],
        "idKom" => $wynik['id_komentarza']
    );

    array_push($a_json, $object);

}

echo json_encode($a_json);
?>