
<div class="ui raised segment">
    <?php
    include('uklad/lewastrona/tytul.php');

    $operacja = $polaczenie->prepare("SELECT youtube FROM muzyka_youtube WHERE id=:id LIMIT 1");
    $operacja->execute(array(':id' => $STRONA_ID));
    $wyniki = $operacja->fetch();

    echo '<div class="ui embed" data-source="youtube" data-id="'.$wyniki['youtube'].'" data-placeholder="'.obrazekAdres(0,$STRONA_ID).'"></div>';


    include('uklad/lewastrona/podobrazkiem/podobrazkiem.php');
    ?>
</div>


<script>
    $('.ui.embed').embed();
</script>