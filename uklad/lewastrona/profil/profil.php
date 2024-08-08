
<div id="ramkaobrazka" class="ui raised segment" >
    <?php
    $operacja = $polaczenie->prepare("SELECT login FROM uzytkownika_konta WHERE id_uzytkownika=:id LIMIT 1");
    $operacja->execute(array(':id' => $STRONA_ID));
    $wyniki = $operacja->fetch();

    echo "<h1 id='tytul'>".$wyniki['login']."</h1>";


    echo "<img class='obrazek' src='FILES/profile/".$STRONA_ID.".jpg' />";

    include('uklad/lewastrona/profil/podobrazkiem.php');
    ?>
</div>


<script>
    $("#tytul").fitText(1.2,{ minFontSize: '20px', maxFontSize: '40px' });
</script>