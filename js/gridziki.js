$(document).ready(function() {
    $(".tytulikheader").fitText(1,{ minFontSize: '30px', maxFontSize: '45px' });
    $('.tytulik, .Buttoniki').hide();

    //// KLIKANIE NA GRIDZKI
    $(document).click(function(event) {
        if (!$(event.target).is(".gridzik")) {
            if(ostatniehide != null)
            {
                ostatniehide.find('.tytulik').hide();
                ostatniehide.find('.Buttoniki').hide();
                ostatniefade.fadeTo( 300 , 1);
                ostatniefade = null,ostatniehide = null;
            }
        }
    });

    var ostatniefade = null,ostatniehide = null;

    $('.GRIDZIKI').on('click', '.gridzik', function() {
        //console.log("clikc")
        var to = $(this);

        if(to.find('.tytulik').is(":visible") )
        {
            console.log("przejdz do strony");
        }
        else
        {
            if(ostatniehide == null)
                ostatniehide = to;
            else
            {
                ostatniehide.find('.tytulik').hide();
                ostatniehide.find('.Buttoniki').hide();
                ostatniehide =  to;
            }

            if(ostatniefade == null)
                ostatniefade =  $(this).find('.gridzikimg');
            else
            {
                ostatniefade.fadeTo( 300 , 1);
                ostatniefade =  $(this).find('.gridzikimg');
            }

            $(this).find('.gridzikimg').fadeTo( 300 , 0.5);
            to.find('.tytulik').show();
            to.find('.Buttoniki').show();
            return false;
        }
    });
});
//////////////