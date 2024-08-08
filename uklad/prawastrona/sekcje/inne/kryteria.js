$(document).ready(function(){
    //zaladuj rekomendacje
    $('#Kryteriapokazschow').hide();
    $.post("php/pobierz/mojeOceny.php",{
        all : 1,
        mojeID : STRONA_ID
    },function(data){
        //console.log(data);
        tablicanawynik(data);
    });
    //



    $('#rekczykry').dropdown({
        onChange: function(value, text, $selectedItem) {
            if(value == 0)
                $('#Kryteriapokazschow').show('slide', {direction: 'left'}, 300);
            else
            {
                $('#GRIDY').empty();
                $.post("php/pobierz/mojeOceny.php",{
                    all : 1,
                    mojeID : STRONA_ID
                },function(data){
                    //console.log(data);
                    tablicanawynik(data);
                });
                $('#Kryteriapokazschow').hide('slide', {direction: 'left'}, 300);
            }


        }
    });

    $('#rodzajdziela').dropdown({
        onChange: function(value, text, $selectedItem) {
            console.log(value)
            $('#GRIDY').empty();
            $.post("php/pobierz/mojeOceny.php",{
                kategoria : value,
                mojeID : STRONA_ID
            },function(data){
                tablicanawynik(data);
            });
        }
    });
});