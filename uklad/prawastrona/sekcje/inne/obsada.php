<div class="SEKCJAprawa" >

    <div id="obsadka" class="ui three stackable cards GRIDZIKI">
        <?php
        $wyniki = include('php/pobierz/obsada.php');


        foreach ($wyniki as $wynik)
        {

            $rodzaj = 4;
            $idek = $wynik['id'];
            $ilosc = include('php/pobierz/plusczyminusSUM.php');
            $mojareakcja = include('php/pobierz/plusczyminusREAKCJA.php');

            ?>
            <div class="card gridzik sortujace" style="background-color:black;" >
                <div class="image" >
                    <img class="gridzikimg img-responsive" src="<?php echo obrazekAdres(true, $wynik['id_artysty']); ?>" >
                    <?php
                    if($wynik['jakoKto'] != NULL)
                        echo '<img id="zespolpokaz" style="position: absolute;top:0;" class=" img-responsive" src="'.obrazekAdres(true,$wynik['jakoKto']).'" >';
                    ?>
                </div >

                <div class="tytulik tytulikheader" style="font-size: 200%;" >
                    <a style="color:inherit;" href="<?php echo intToKategoria(idToKategoria($wynik['id_artysty'])) . '.php?id=' . $wynik['id_artysty']; ?>" >
                        <div class="ui header grey inverted " style="cursor:pointer" >
                            <?php echo tlumaczenie($wynik['id_artysty'], 2); ?>
                        </div >
                    </a >
                    <?php
                    if($wynik['jakoKto'] != NULL)
                    {
                        ?>
                        <a style="color:inherit;" href="<?php echo intToKategoria(idToKategoria($wynik['jakoKto'])) . '.php?id=' . $wynik['jakoKto']; ?>" >
                            <div id="pokazzespol"  class="ui header grey inverted"  style="font-size: 80%;">
                                (<?php echo tlumaczenie($wynik['jakoKto'], 2); ?>)</div>
                        </a>
                    <?php
                    }
                    ?>

                    <div style="font-size: 50%;" >2016</div >
                </div >
                <div class="Buttoniki ui fluid buttons compact " style="position: absolute;bottom: 0;" >
                    <div class="ui button likq <?php echo $mojareakcja; ?>" >
                        <span class="ilosc" ><?php echo $ilosc['sumka'] ?? 0; ?></span >
                        <span class="rodzaj" style="display:none" ><?php echo $rodzaj; ?></span >
                        <span class="idek" style="display:none" ><?php echo $idek; ?></span >
                    </div >
                    <div class="ui icon button grey" >
                        <i class="icon star yellow" ></i ><span class="ocenadopor" >7.1</span >
                    </div >
                    <div class="ui icon button grey" >
                        <i class="icon unhide black" ></i ><span class="wysdopor" > <span class="ocenadopor" >50</span >K
                    </div >
                    <div class="ui button grey" >
                        <i class="icon signal" ></i ><span class="jakoscdopor" >70</span >%
                    </div >
                </div >
            </div >

            <?php

        }
        ?>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#zespolpokaz').hide();
        $('#pokazzespol').mouseover(function(){
            console.log("nad")
            $('#zespolpokaz').stop().fadeIn( 500);
        }).mouseout(function() {
            $('#zespolpokaz').stop().fadeOut( 500 );
        });
    });

</script>