<table class="ui fixed table" style="font-size: 120%;">
    <tbody>
        <tr class="center aligned">
            <td>Punkty</td>
            <td>10k</td>
        </tr>
        <tr class="center aligned">
            <td>Obserwujacy</td>
            <td id="obserwujacyIlosc">0</td>
        </tr>
        <tr class="center aligned">
            <td>Obserwowani</td>
            <td id="obserwowaniIlosc">0</td>
        </tr>
    </tbody>
    <button id="obserwujitd" class="<?php if($JA_ID==$STRONA_ID) echo 'disabled'; ?> fluid toggle ui button">Obserwuj!</button>
</table>

<script>
    $('#obserwujitd').state({
            text: {
                inactive : 'Obserwuj!',
                active   : 'Obserwowanie'
            }});

    $.post("php/pobierz/followersi/czyobserwuje.php",
        {
            mojeID : JA_ID,
            idTego: STRONA_ID
        },function(data){
            if(data == 1)
            {
                $('#obserwujitd').addClass('active');
                $('#obserwujitd').text('Obserwowanie');
            }


        });

    $('#obserwujitd').click(function(){
    console.log(STRONA_ID)
           $.post("php/wstaw/followersi.php",{
                   mojeID : JA_ID,
                   idTego: STRONA_ID
               });

            if($(this).hasClass('active'))
                $('#obserwujacyIlosc').text( parseInt($('#obserwujacyIlosc').text())+1 );
            else
                $('#obserwujacyIlosc').text( parseInt($('#obserwujacyIlosc').text())-1 );
    });



    $.post("php/pobierz/followersi/obserwujacy.php",
        {
            idTego: STRONA_ID
        },function(data){
            $('#obserwujacyIlosc').text( data );
        });


    $.post("php/pobierz/followersi/obserwowani.php",
        {
            idTego: STRONA_ID
        },function(data){
            $('#obserwowaniIlosc').text( data );
        });

</script>