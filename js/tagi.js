function update(strondaid, jaid, val, status)
{
    $.post("php/update/tag.php",
        {
            dzieloID: strondaid,
            mojeID : jaid,
            tag : val,
            status: status
        });
}

$(document).ready(function() {



    $('#mojeTagi').tagEditor({
        sortable : false,
        placeholder: 'Enter tags ...',
        clickDelete: true,
        autocomplete: {
            delay: 0, // show suggestions immediately
            position: { collision: 'flip' }, // automatic menu position up/down
            source:  function (request, response) {
                $.post("php/szukaj/tag.php",
                    {
                        term : request.term
                    },function(data){

                        response(JSON.parse(data));

                    });
            }
        },
        beforeTagSave : function(field, editor, tags, tag, val){
            //kiedy dodaje
            if(JA_ID == 0)
            {
                location.href='login.php';
                return false;
            }
            else
            {
                if(val != "")
                {
                    $.post("php/wstaw/tag.php",
                        {
                            dzieloID: STRONA_ID,
                            mojeID : JA_ID,
                            tag : val
                        });
                }
            }
        },
        beforeTagDelete : function(field, editor, tags, val){
            $.post("php/usun/tag.php",
                {
                    dzieloID: STRONA_ID,
                    mojeID : JA_ID,
                    tag : val
                });
        },
        onChange: function tag_classes(field, editor, tags) {
            // JAK DODAJE NOWY TAG
            var i = 1;
            $('li', editor).each(function(){
                if(i == $('li', editor).length)
                {
                    var li = $(this).children('.tag-editor-tag');
                    li.on('click' ,function() {
                        if( $(this).hasClass('green-tag') )
                        {
                            update(STRONA_ID,JA_ID,$(this).html(),2);
                            $(this).removeClass("green-tag");
                            $(this).siblings('.tag-editor-delete').removeClass("green-tag");
                            $(this).addClass("red-tag");
                            $(this).siblings('.tag-editor-delete').addClass("red-tag");
                        }
                        else if( $(this).hasClass('red-tag') )
                        {
                            update(STRONA_ID,JA_ID,$(this).html(),0);
                            $(this).removeClass("red-tag");
                            $(this).siblings('.tag-editor-delete').removeClass("red-tag");
                        }
                        else
                        {
                            update(STRONA_ID,JA_ID,$(this).html(),1);
                            $(this).addClass("green-tag");
                            $(this).siblings('.tag-editor-delete').addClass("green-tag");
                        }
                        return false;
                    });
                }
                i++;
            });
        }
    });

    var mypoz = 0,myneg = 0, myneu = 0;
    // ZAMIANA LICZBY NA STATUSS jak nie jest PUSTE!!!
    if($('#mojeTagi').tagEditor('getTags').length != 0)
    {
            $('li',  $('#mojeTagi').tagEditor('getTags')[0].editor).each(function(){
            var li = $(this);
            var liel = $(this).children('.tag-editor-tag');

            var str = li.find('.tag-editor-tag').html();
            if(str != undefined)
            {
                var ostliczba = str.substr(str.length - 1);
                $(liel).text(function (_,txt) {return txt.slice(0, -1);}); // USUWA OSTATNIA LICZBE

                if(ostliczba == 1)
                {
                    $(liel).addClass("green-tag");
                    $(liel).siblings('.tag-editor-delete').addClass("green-tag");
                    mypoz++;
                }
                else if(ostliczba == 2)
                {
                    $(liel).addClass("red-tag");
                    $(liel).siblings('.tag-editor-delete').addClass("red-tag");
                    myneg++;
                }
                else
                    myneu++;
            }
        });
    }
    var mysuma = mypoz + myneg + myneu;
    $('#myPozTagi').text(((mypoz/mysuma) * 100).toFixed(0) + "%");
    $('#myNeuTagi').text(((myneu/mysuma) * 100).toFixed(0) + "%");
    $('#myNegTagi').text(((myneg/mysuma) * 100).toFixed(0) + "%");

    var poz = 0,neg = 0, neu = 0;
    $('.tagii, .tagiiznajomych').each(function(){
        var li = $(this);
        var liel = $(this).children('.tag-editor-tag');
        var el = parseInt($(this).children('.tag-editor-delete').text()) || 0;
        var str = li.find('.tag-editor-tag').html();

        if(str != undefined)
        {
            var ostliczba = str.substr(str.length - 2,str.length - 1);
            $(liel).html( str.substr(0,str.length - 2) );

            if(ostliczba == 1)
            {
                $(liel).addClass("green-tag");
                $(liel).siblings('.tag-editor-delete').addClass("green-tag");
                poz+=el;
            }
            else if(ostliczba == 2)
            {
                $(liel).addClass("red-tag");
                $(liel).siblings('.tag-editor-delete').addClass("red-tag");
                neg+=el;
            }
            else
                neu+=el;
        }
    });
    ///////////////
    var suma = poz + neg + neu;
    $('#PozTagi').text(((poz/suma) * 100).toFixed(0) + "%");
    $('#NeuTagi').text(((neu/suma) * 100).toFixed(0) + "%");
    $('#NegTagi').text(((neg/suma) * 100).toFixed(0) + "%");


    $('.tag-editor-tag').on('click' ,function() {
        if( !$(this).parent().parent().parent().parent().hasClass("content")
        && !$(this).parent().parent().parent().parent().hasClass("accordion") ) // content to z tagow wszystkich a accordion z tagow znajmocyh
        {
            if( $(this).hasClass('green-tag') )
            {
                update(STRONA_ID,JA_ID,$(this).html(),2);
                $(this).removeClass("green-tag");
                $(this).siblings('.tag-editor-delete').removeClass("green-tag");
                $(this).addClass("red-tag");
                $(this).siblings('.tag-editor-delete').addClass("red-tag");
            }
            else if( $(this).hasClass('red-tag') )
            {
                update(STRONA_ID,JA_ID,$(this).html(),0);
                $(this).removeClass("red-tag");
                $(this).siblings('.tag-editor-delete').removeClass("red-tag");
            }
            else
            {
                update(STRONA_ID,JA_ID,$(this).html(),1);
                $(this).addClass("green-tag");
                $(this).siblings('.tag-editor-delete').addClass("green-tag");
            }
        }


        return false;
    });

    $('#statystykitagow').hide();
    $('#pokazstatystykitagow').click(function(){
        $('#statystykitagow').toggle('slide', {direction: 'left'});
    });
    
    $('#statystykimytagow').hide();
    $('#pokazstatystykimytagow').click(function(){
        if(JA_ID != 0)
            $('#statystykimytagow').toggle('slide', {direction: 'left'});
    });

});




