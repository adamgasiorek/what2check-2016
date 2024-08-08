<div id="INFO" style="display: none;">
    <?php

    echo '<span id="STRONA_ID">'.$STRONA_ID.'</span>';
    echo '<span id="JA_ID">'.$JA_ID.'</span>';
    echo '<span id="JEZYK_ID">'.$jezykID.'</span>';
    echo '<span id="KATEGORIA">'.$kategoria.'</span>';

    ?>
</div>


<script>
    var STRONA_ID = $('#INFO').children('#STRONA_ID').text();
    var JA_ID = $('#INFO').children('#JA_ID').text();
    var JEZYK_ID = $('#INFO').children('#JEZYK_ID').text();
    var KATEGORIA = $('#INFO').children('#KATEGORIA').text();

</script>