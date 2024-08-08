$(document).ready(function() {

$('.rating').rating({clearable : true});

    $('#ratingoon').rating({
        onRate: function(value) {
            $('span#mojaocena').text(value+5);
            $("#ratingoff > .icon").addClass( "active selected" );
            console.log("oceniam " + (value+5))
            $.post("php/update/ocene.php",
                {
                    mojeID : JA_ID,
                    dzieloID: STRONA_ID,
                    ocena: (value+5)
                }
            );
        },
        clearable : true
    });


    $('.ratingoff').rating('disable');

    $( "#ratingoon" ).mouseover(function() {
        $("#ratingoff > .icon").addClass( "active selected" );
    }).mouseleave(function() {
        if( $('span#mojaocena').text() != 0)
            $("#ratingoff >.icon").removeClass( "selected" );


    });



    


//    ZMIANA CZCINKI Z PODOBA SIE NA NIE ITP
    if( !$('.podobasie').hasClass('aktywny') )
        $('div#mojaocenka').hide();

    $('.aktywnoscjakas').click(function(){
        var zalogowany = JA_ID;
        if(zalogowany == 0) // Zalogowany?
        {
            //alert("zaloguj sie!!!")
            location.href='login.php';
        }
        else
        {
            if($(this).hasClass('aktywny') )
            {
                $('.aktywnoscjakas').removeClass('nieaktywny');
                $(this).removeClass('aktywny');
                $.post("php/usun/ocene.php",
                    {
                        mojeID : JA_ID,
                        dzieloID: STRONA_ID
                    }
                );
            }
            else
            {
                $('.aktywnoscjakas').removeClass('aktywny').addClass('nieaktywny');
                $(this).removeClass('nieaktywny').addClass('aktywny');
                var ocena = 0;
                if(($('.aktywnoscjakas').index(this)+1) == 1)
                    ocena = 5;

                $.post("php/wstaw/ocene.php",
                    {
                        mojeID : JA_ID,
                        dzieloID: STRONA_ID,
                        ocena: ocena,
                        status: ($('.aktywnoscjakas').index(this)+1)
                    });

            }

            if($(this).hasClass('podobasie') )
                $('div#mojaocenka').toggle('fade',500);
            else
                $('div#mojaocenka').hide();
        }
    });



    /////////////// KATEGORIA
    var blokuj = true;
    $('.ui.dropdown').dropdown({
        maxSelections: 3,
        onAdd : function(addedValue, addedText, $addedChoice){
            if(!blokuj)
            {
                $.post("php/wstaw/kategorie.php",{
                    mojeID : JA_ID,
                    dzieloID: STRONA_ID,
                    id: addedValue
                });
            }
        },
        onRemove : function(removedValue, removedText, $removedChoice){
            //console.log( removedValue );
            $.post("php/usun/kategorie.php",
                {
                    mojeID : JA_ID,
                    dzieloID: STRONA_ID,
                    id: removedValue
                });
        }

    });

    var tablicamoichzaznaczonych;

    $.post("php/pobierz/mojekat.php",
        {
            mojeID : JA_ID,
            dzieloID: STRONA_ID
        },function(data){
            $('.ui.dropdown').dropdown('set selected',$.parseJSON(data));
            blokuj = false;
        });


    if(JA_ID == 0)
        $('.ui.dropdown').dropdown({ action: function(text, value){
            location.href = 'login.php';
        }});


    $('.chart').horizBarChart({
        selector: '.bar',
        speed: 1000
    });
    ///////////////////////////////////


});