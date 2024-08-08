<div class="SEKCJAprawa" >


    <div class="ui divided items">
        <?php
        $wyniki = include('php/pobierz/album/zawartosc.php');
        
        foreach ($wyniki as $wynik)
        {
            ?>

            <div class="item">
                <div style="width:50%;margin-right: 20px;">
                    <?php
                    echo '<div class="ui embed" data-source="youtube" data-id="'.$wynik['youtube'].'" 
                        data-placeholder="'.obrazekAdres(0,$wynik['id_dziela']).'"></div>';
                    ?>
                </div>
                <div style="width:50%;margin-top: 10px;" class="middle aligned content">
                    <a style="font-size: 200%;" class="header"
                       href="<?php echo intToKategoria(idToKategoria($wynik['id_dziela'])) . '.php?id=' . $wynik['id_dziela']; ?>">
                        <?php echo $wynik['numer'].". ".tlumaczenie($wynik['id_dziela'],2); ?>
                    </a>
                    <div class="description">
                        <p>Cute dogs come in a variety of shapes and sizes. Some cute dogs are cute for their adorable faces, others for their tiny stature, and even others for their massive size.</p>
                        <p>Many people also have their own barometers for what makes a cute dog.</p>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>
    </div>



</div>


<script>
    $('.ui.embed').embed();
</script>