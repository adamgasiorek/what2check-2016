<section class="idealsteps-step">

    <div style="margin-bottom: 100px;">
        <div class="field" style="position: absolute;">
            <label class="main">Rodzaj:</label>
            <input class="wyszukajobsade" />
            <span class="error"></span>
        </div>

        <select style="position: absolute;left: 400px;top: 170px;">
            <option value="default">&ndash; Wybierz rodzaj &ndash;</option>
            <option value="1">Film</option>
            <option value="2">Muzyka</option>
            <option value="3">Artysta</option>
            <option value="4">Album</option>
            <option value="5">Zespół</option>
        </select>

        <div class="field" style="position: absolute;left: 720px;">
            <label class="main">JakoKto:</label>
            <input class="wyszukajobsade" />
            <span class="error"></span>
        </div>
    </div>


    <div>
        1r2j0;
    </div>

        <div style="position: relative;top: 20px;left: -120px;" class="field buttons">
            <label class="main">&nbsp;</label>
            <button type="button" class="prev">Prev &raquo;</button>
            <button type="button" class="next">Next &raquo;</button>
            <button type="submit" class="submit" style="margin-top: 0;">Submit</button>
        </div>





</section>


<script>
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
                var selectedItemValue = $(".wyszukajobsade").getSelectedItemData();

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
            wartosc = 1;

            if($(".wyszukajobsade").val() !== "") {
                data.wartosc = wartosc;
                data.term = $(".wyszukajobsade").val();
                data.jezyk = JEZYK_ID;
                return data;
            }
        },
        theme: "square",
        template: {
            type: "custom",
            method: function (value, item) {
                //console.log(item)
                return '<div class="ui link items" style="width: 500px;height: 100%;"><div class="item">' +
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


    $(".wyszukajobsade").easyAutocomplete(options);
</script>