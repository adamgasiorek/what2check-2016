$(document).ready(function () {
    $('.pochowaj').hide();
    $('.image-editor').cropit({
        smallImage : 'stretch',
        maxZoom : 2
    });




    $('.ui.dropdown').dropdown({
        selectOnKeydown: false,
        onChange: function (value, text, $choice) {

            if ($choice != undefined) {
                if (value.length > 1)
                    value = value.substring(0, value.length - 5);

                $('#jezykii').append('<div style="margin-top: 200px;" class="jezyczek">' +
                    '<div class="ui dividing header">' +
                    '<span style="cursor: pointer;color: dodgerblue;" class="usunjezyk">Usun</span> Jezyk ' + text +
                    '</div>' +
                    '<div class="field">' +
                    '<label class="main">Tytuł:</label>' +
                    '<input name="' + value + 'Tytul" type="text" class="tytulik" >' +
                    '<span style="display:none;" class="nazwajezyka">' + text + '</span>' +
                    '<span class="error"></span>' +
                    '</div>' +
                    '<div class="field">' +
                    '<label class="main">Comments:</label>' +
                    '<textarea name="' + value + 'Opis" cols="150" rows="5"></textarea>' +
                    '<span class="error"></span>' +
                    '</div>' +
                    '</div>');

                $choice.remove();

                var objPosition = {};
                objPosition[value + 'Tytul'] = 'required username';
                objPosition[value + 'Opis'] = 'minmax:20:200';
                $('form.idealforms').idealforms('addRules', objPosition);

                $('.ui.dropdown').dropdown('clear');
            }

        }
    });

    $('#jezykii').on('click', '.usunjezyk', function () {
        var txt = $(this).parent().parent().find('.nazwajezyka').text();
        var value = $(this).parent().parent().find('.tytulik').attr('name');
        //console.log(value.substr(0,value.length - 5))

        $('.menu').append('<div class="item" data-value="' + value + '">' + txt + '</div>');
        $('form.idealforms').idealforms('removeFields', value);
        $('form.idealforms').idealforms('removeFields', value.substr(0, value.length - 5) + "Opis");

        $(this).parent().parent().remove();
    });


    $('form.idealforms').submit(function () {

        // Move cropped image data to hidden input
        var imageData = $('.image-editor').cropit('export');
        $('.hidden-image-data').val(imageData);


        var imageData2 = $('.image-editor2').cropit('export');
        $('.hidden-image-data2').val(imageData2);

        // Prevent the form from actually submitting
        return true;
    });
});

$('form.idealforms').idealforms({

    silentLoad: false,

    rules: {
        'ikonka' : 'required extension:jpg',
        '1Tytul': 'required username',
        '1Opis': 'minmax:20:200',
        'rodzaj': 'required select:default',
    },

    errors: {
        'username': {
            ajaxError: 'Username not available'
        }
    },

    onSubmit: function (invalid, e) {
        if (invalid)
            e.preventDefault();

        $('#invalid')
            .show()
            .toggleClass('valid', !invalid)
            .text(invalid ? (invalid + ' invalid fields') : 'All good!');

    }
});


$('form.idealforms').find('input, select, textarea').on('change keyup', function () {
    $('#invalid').hide();
});


$('.prev').click(function () {
    $('.prev').show();
    $('form.idealforms').idealforms('prevStep');
});
$('.next').click(function () {
    $('.next').show();
    $('form.idealforms').idealforms('nextStep');
});
