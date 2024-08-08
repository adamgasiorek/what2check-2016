$(document).ready(function() {

    ////////////////////////////////////////////////////////////////////////////////// WYSZUKIWARKA
    var options = {
        url: function (phrase) {
            return "php/szukaj/wyszukajPodobne.php";
        },

        getValue: function (element) {
            //console.log(element)
            return element.nazwa;
        },

        ajaxSettings: {
            dataType: "json",
            method: "POST",
            data: {
                dataType: "json"
            }
        },

        list: {
            onChooseEvent: function () {
                if(JA_ID == 0)
                    location.href='login.php';
                else
                {
                    var selectedItemValue = $("#Wyszukiwarkapodobne").getSelectedItemData();

                    $.post("php/wstaw/podobne.php",{
                            mojeID: JA_ID,
                            dzieloID: STRONA_ID,
                            id_podobnego: selectedItemValue.idek
                        },function(data){
                        if(data){
                            console.log(selectedItemValue.kat)
                            //dodal wpis wiec teraz wypadloby tu wizualiwac xd
                            $('.kartypodobne').append('<div class="card gridzik" style="background-color:black;" data-sort="1">'+
                                '<div class="nrdziela" style="display: none;">'+selectedItemValue.idek+'</div>'+
                                '<div class="nrkat" style="display: none;">'+selectedItemValue.kat+'</div>'+
                                '<div  class="image">'+
                                '<img class="gridzikimg" src="'+obrazekAdres(true,selectedItemValue.idek)+'">'+
                                '</div>'+
                                '<div class="tytulik">'+selectedItemValue.nazwa+'<br>'+
                                '<button class="likq ui positive voteoff button" style="position: relative;bottom:5px;" >'+
                                '<span class="ilosc" >1</span >'+
                                '</button >'+
                                '</div>'+
                                '</div>').ready(function () {
                                $(".tytulik").fitText(1,{ minFontSize: '10px', maxFontSize: '40px' });
                                $('.tytulik').hide();
                            });
                        }
                        else
                        {
                            //jest juz jest wiec dodaje plusa
                            var too = $('.gridzik').find('.nrdziela:contains("'+selectedItemValue.idek+'")').siblings('.tytulik').find('.likq');
                            if(!$(too).hasClass('positive') )
                            {
                                $(too).removeClass('primary');
                                $(too).addClass('positive');
                                $(too).children('.ilosc').text(parseInt($(too).text())+1);
                                var rodzaj = $(too).children('.rodzaj').text();
                                var idek = $(too).children('.idek').text();
                                $.post("php/wstaw/plusczyminus.php",{
                                    mojeID : JA_ID,
                                    dzieloID: STRONA_ID,
                                    rodzaj : rodzaj,
                                    id : idek,
                                    plus: 1
                                });
                            }
                            //$('.gridzik').find('.nrdziela:contains("'+selectedItemValue.idek+'")').siblings('.tytulik').find('.likq').click();
                        }
                    });
                }


            },
            maxNumberOfElements: 3,
            showAnimation: {
                type: "fade", // normal|slide|fade
                time: 400,
                callback: function () {
                }
            },

            hideAnimation: {
                type: "fade", // normal|slide|fade
                time: 400,
                callback: function () {
                }
            }
        },

        preparePostData: function (data) {
            if($("#Wyszukiwarkapodobne").val() !== "") {
                data.term = $("#Wyszukiwarkapodobne").val();
                data.jezyk = JEZYK_ID;
                data.kat = KATEGORIA;
                data.idek = STRONA_ID;
                return data;
            }
        },
        theme: "square",
        template: {
            type: "custom",
            method: function (value, item) {
                //console.log(item)
                return '<div class="ui link items"><div class="item">' +
                    '<div class="ui mini image">' +
                    '<img src="'+item.img+'">' +
                    '</div>' +
                    '<div class="content">' +
                    '<div class="header">'+item.nazwa+'</div>' +
                    '<div class="meta"><span>'+item.kategoria+'</span></div>' +
                    '</div>' +
                    '</div></div>';
            }
        },

        requestDelay: 400
    };


    $("#Wyszukiwarkapodobne").easyAutocomplete(options);

});