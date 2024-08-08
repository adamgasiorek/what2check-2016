<section class="idealsteps-step">

    <div class="field">
        <label class="main">Rodzaj:</label>
        <select name="rodzaj" id="rodzajdziela">
            <option value="default">&ndash; Wybierz rodzaj &ndash;</option>
            <option value="1">Film</option>
            <option value="2">Muzyka</option>
            <option value="3">Artysta</option>
            <option value="4">Album</option>
            <option value="5">Zespół</option>
        </select>
        <span class="error"></span>
    </div>


    <div style="margin-top: 30px;" class="field buttons">
        <label class="main">&nbsp;</label>
        <button type="button" class="prev">Prev &raquo;</button>
        <button type="button" class="next">Next &raquo;</button>
        <button type="submit" class="submit" style="margin-top: 0;">Submit</button>
    </div>



</section>


<script>
    $("#rodzajdziela").on('change', function() {
        $('.pochowaj').hide();
        $('.dodajusun').remove();
        //$('form.idealforms').idealforms('removeFields', 'image');

        if($(this).val() == 1)
        {
            $('#dodajpoikonie').after('<div style="position: absolute;left: 600px;top: 140px;" class="dodajusun field">'+
                '<div class="image-editor2">'+
                'Plakat'+
                '<div class="cropit-preview" style="width: 300px;height: 500px;"></div>'+
                '<div class="image-size-label">'+
                'Resize image'+
                '</div>'+
                '<input type="range" class="cropit-image-zoom-input">'+
                '<input type="file" name="image2" class="cropit-image-input">'+
                '<input type="hidden" name="image-data2" class="hidden-image-data2" />'+
                '</div>'+

                '<span class="error"></span>'+
                '</div>');



        }
        else if($(this).val() == 2)
        {
            $('#dodajpoikonie').after('<div style="position: absolute;left: 600px;top: 140px;" class="dodajusun field">'+
                '<div class="image-editor2">'+
                'Plakat'+
                '<div class="cropit-preview" style="width: 600px;height: 338px;"></div>'+
                '<div class="image-size-label">'+
                'Resize image'+
                '</div>'+
                '<input type="range" class="cropit-image-zoom-input">'+
                '<input type="file" name="image2" class="cropit-image-input">'+
                '<input type="hidden" name="image-data2" class="hidden-image-data2" />'+
                '</div>'+

                '<span class="error"></span>'+
                '</div>');

        }

        var objPosition = {};
        objPosition['image2'] = 'required extension:jpg';
        $('form.idealforms').idealforms('addRules', objPosition);

        $('.image-editor2').cropit({
            smallImage : 'stretch',
            maxZoom : 2
        });
    });
</script>