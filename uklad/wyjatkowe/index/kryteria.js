
$(document).ready(function(){
    //zaladuj rekomendacje
    $('#Kryteriapokazschow').hide();
    $.post("php/pobierz/index.php",{
        rekomendacja : 1
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
                $.post("php/pobierz/index.php",{
                    rekomendacja : 1
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
            $.post("php/pobierz/index.php",{
                kategoria : value
            },function(data){
                tablicanawynik(data);
            });
        }
    });
});


// /////////// KRYTERIA
// var rekomendacja = 0;
// var indeksikKAT = 0;
//
//
// $('.ui.modal').modal({
//     blurring: true
// });
//
// $('#showUST').click(function(){
//     $('#filtry').modal('show');
// });
//
// $('.ui.image').click(function(){
//     if($(this).hasClass('disabled'))
//     {
//         $(this).siblings('.ui.image').addClass('disabled');
//         $(this).removeClass('disabled');
//         var kategoria;
//         indeksikKAT = parseInt($('.ui.image').index(this))+1;
//         if(indeksikKAT == 1)
//             kategoria = 'film';
//         else if(indeksikKAT == 2)
//             kategoria = 'muzyka';
//         else if(indeksikKAT == 3)
//             kategoria = 'artysta';
//
//         $('span#cowybrane').text( kategoria );
//     }
// });
//
// $('#anuluj').click(function(){
//     $('.kryteriaczyrek').eq(0).click();
// });
//
// $('#zatwierdz').click(function(){
//     $('#GRIDY').empty();
//     if(rekomendacja == 1)
//     {
//         console.log("indeksikKAT " + indeksikKAT);
//         $.post("php/pobierz/index.php",{
//             kategoria : indeksikKAT
//         },function(data){
//             tablicanawynik(data);
//         });
//     }
//     else
//     {
//         $.post("php/pobierz/index.php",{
//             rekomendacja : 1
//         },function(data){
//             tablicanawynik(data);
//         });
//     }
// });
// //$('.ui.dropdown').dropdown();
//
// $('.kryteriaczyrek').click(function(){
//     if($(this).hasClass('disabled'))
//     {
//         $(this).removeClass('disabled');
//         $(this).siblings('.kryteriaczyrek').addClass('disabled');
//
//         var indx = $('.kryteriaczyrek').index(this);
//         if(indx == 1)
//             $('#segmentt').removeClass('disabled');
//         else
//             $('#segmentt').addClass('disabled');
//
//         rekomendacja = indx;
//     }
// });