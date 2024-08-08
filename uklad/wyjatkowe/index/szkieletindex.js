function UrlExists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status!=404;
}

function obrazekAdres(ikona, id)
{
    var filename = 'FILES/dziela/';

    if(ikona)
        filename+= 'ikona/';
    else
        filename += 'orginalne/';

    filename += id+'.jpg';

    return filename;
}

function intnakat(liczba)
{
    if(liczba == 1)
        return 'film';
    else if(liczba == 2)
        return 'muzyka';
    else if(liczba == 3)
        return 'artysta';
    else if(liczba == 4)
        return 'album';
    else if(liczba == 5)
        return 'zespol';
};

function tlumaczenie(idek, rodzaj)
{
    var result="";
    $.ajax({
        method: "POST",
        url: "php/pobierz/tlumaczeniejs.php",
        data: { jezykID: JEZYK_ID, id: idek, rodzaj: 2},
        async: false,
        success:function(data) {
            result = data;
        }
    });
    return result;
}

function tablicanawynik(data)
{
    var array = JSON.parse(data);

        for(var index = 0; index < array.length; ++index) {
            var obiekt = array[index];
            //console.log(  );

            $('#GRIDY').append('<div class="card gridzik" style="background-color:black;" >'+
                '<div class="image">'+
                '<img class="gridzikimg img-responsive" src="'+obrazekAdres(true,obiekt.id_dziela)+'">'+
                '</div>'+

                '<div class="tytulik" style="font-size: 200%;">'+


                '<a style="color:inherit;" href="'+intnakat(obiekt.kategoria)+".php?id="+obiekt.id_dziela+'">'+
                '<div class="ui header grey inverted tytulikheader" style="cursor:pointer">'+
                tlumaczenie(obiekt.id_dziela,2)+
                '<div style="font-size: 50%;">'+intnakat(obiekt.kategoria)+'</div>'+

                '</div>'+
                '</a>'+
                '</div>'+
                '<div class="Buttoniki ui fluid buttons compact grey" style="position: absolute;bottom: 0;">'+
                '<div class="ui icon button" >'+
                '<i class="icon star yellow"></i><span class="ocenadopor">'+(obiekt.ocena/100).toFixed(2)+'</span>'+
                '</div>'+
                '<div class="ui icon button">'+
                '<i class="icon unhide black"></i><span class="wysdopor"> <span class="ocenadopor">'+obiekt.wyswietlenia+'</span>'+
                '</div>'+
                '<div class="ui button">'+
                '<i class="icon signal"></i><span class="jakoscdopor">70</span>%'+
                '</div>'+
                '</div>'+
                '</div>');


            $('.tytulik, .Buttoniki').hide();

    }
}




$(document).ready(function() {

    $('#szukajWg').dropdown({
        onChange: function(value, text, $selectedItem) {
            $("#Wyszukiwarka").val("");
        }
    });


});