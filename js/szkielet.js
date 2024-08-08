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
            '<div style="font-size: 50%;">2016</div>'+
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


jQuery.fn.sortDivs = function sortDivs() {
    $("> div", this[0]).sort(dec_sort).appendTo(this[0]);
    function dec_sort(a, b){ return ($(b).data("sort")) > ($(a).data("sort")) ? 1 : -1; }
}

function intnakat(liczba)
{
    if(liczba == 1)
        return 'film';
    else if(liczba == 2)
        return 'muzyka';
    else if(liczba == 3)
        return 'artysta';
};

function intnakraj(liczba)
{
        if(liczba == 1)
            return 'gb';
        else if(liczba == 2)
            return 'pl'
};


/////////////////////////////////////////////////////////////
$(document).ready(function() {

    $('a#zmienjezyk').click(function(){
        $('div#zmienjezyk').modal('show');
    });

    moment.locale(intnakraj(JEZYK_ID));

    // DLA TABSOW
     $('#AccordionOcenkikat').accordion({ exclusive: true });


    $('.likq').click(function(event){
        if($(this).hasClass('voteoff'))
        {
            return false;
        }
        else
        {
            if(JA_ID == 0)
            {
                location.href='login.php';
            }
            else
            {
                var rodzaj = $(this).children('.rodzaj').text();
                var idek = $(this).children('.idek').text();
                var plusik;

                if($(this).hasClass('positive') )
                {
                    $(this).removeClass('positive');
                    $(this).addClass('negative');
                    $(this).children('.ilosc').text(parseInt($(this).text())-2);
                    plusik = -1;
                }
                else if($(this).hasClass('negative') )
                {
                    $(this).removeClass('negative');
                    $(this).addClass('primary');
                    $(this).children('.ilosc').text(parseInt($(this).text())+1);
                    plusik = 0;
                }
                else if($(this).hasClass('primary') )
                {
                    $(this).removeClass('primary');
                    $(this).addClass('positive');
                    $(this).children('.ilosc').text(parseInt($(this).text())+1);
                    plusik = 1;
                }

                console.log(JA_ID + " " + STRONA_ID + " " + rodzaj + " " + idek + " " + plusik)
                $.post("php/wstaw/plusczyminus.php",{
                    mojeID : JA_ID,
                    dzieloID: STRONA_ID,
                    rodzaj : rodzaj,
                    id : idek,
                    plus: plusik
                });
            }
            return false;
        }
    });

});

