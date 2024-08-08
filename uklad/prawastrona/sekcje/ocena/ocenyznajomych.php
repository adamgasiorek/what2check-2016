<?php
if($JA_ID != 0) {
    ?>
    <div class="accordion" >

        <?php
        $wyniki = include('php/pobierz/znajomychOceny.php');

        foreach ($wyniki as $wynik) {

            ?>
            <div style="font-size: 230%;" class="title" >
                <i class="dropdown icon" ></i >
                <span ><i class="circle icon" ></i >Adacho26 ocenil na: <?php echo $wynik['ocena']; ?></span >
                <div style="font-size: 115%;position: relative;bottom: -5px;" class="ui massive star rating ratingoff" data-rating="6"
                     data-max-rating="10" ></div >

                <?php
                //TYPOWY PRZYCISK PLUS CZY MINUS
                $rodzaj = 2;
                $idek = $wynik['id_oceny'];
                $ilosc = include('php/pobierz/plusczyminusSUM.php');
                $mojareakcja = include('php/pobierz/plusczyminusREAKCJA.php');
                ?>
                <button class="likq ui <?php echo $mojareakcja; ?> basic button" style="position: relative;bottom: 5px;" >
                    <span class="ilosc" ><?php echo $ilosc['sumka'] ?? 0; ?></span >
                    <span class="rodzaj" style="display:none" ><?php echo $rodzaj; ?></span >
                    <span class="idek" style="display:none" ><?php echo $idek; ?></span >
                </button >


                <br >
            </div >
            <div class="content" >
                <ul class="tag-editor" id="tagiinnych" style="border: none;padding: 0px;display:block;" >
                    <?php
                    $znajomyID = 3;
                    $wyniki = include('php/pobierz/Tagiznajomych.php');
                    foreach ($wyniki as $wynik) {
                        ?>
                        <li class="tagiiznajomych" style="margin: 5px" >
                            <div class="tag-editor-spacer" ></div >
                            <div class="tag-editor-tag" ><?php echo $wynik['nazwa'] . $wynik['status']; ?> </div >
                        </li >
                        <?php
                    }
                    ?>
                </ul >
            </div >

            <?php
        }
        ?>

    </div >
    <?php
}
else
{
    ?>
    Zaloguj sie zeby zobaczyc oceny swoich zanjomych
<?php
}
?>



