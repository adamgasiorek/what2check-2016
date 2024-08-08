$(document).ready(function() {
    
    var options = {
        url: function (phrase) {
            return "php/szukaj/wyszukaj.php";
        },

        getValue: function (element) {

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
                var selectedItemValue = $("#Wyszukiwarka").getSelectedItemData();
                location.href = selectedItemValue.kategoria+".php?id="+selectedItemValue.idek;

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
            var wartosc = $('#szukajWg').dropdown('get value');
            if(wartosc == "")
                wartosc = 1;

            if($("#Wyszukiwarka").val() !== "") {
                data.wartosc = wartosc;
                data.term = $("#Wyszukiwarka").val();
                data.jezyk = JEZYK_ID;
                return data;
            }
        },
        theme: "square",
        template: {
            type: "custom",
            method: function (value, item) {
                //console.log(item)
                return '<div class="ui link items"><div class="item">' +
                        '<div style="width:100px;height:auto;" class="ui image">' +
                        '<img src="'+item.img+'">' +
                        '</div>' +
                        '<div style="text-align: left;" class="content">' +
                        '<div class="header">'+item.nazwa+'</div>' +
                        '<div class="meta"><span>'+item.kategoria+'</span></div>' +
                        '</div>' +
                        '</div></div>';
            }
        },

        requestDelay: 400
    };


    $("#Wyszukiwarka").easyAutocomplete(options);

});