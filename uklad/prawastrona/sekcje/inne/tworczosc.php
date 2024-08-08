<div class="SEKCJAprawa" >

    <?php
    $daty = true;
    $likee = false;
    $id = 'tworczosc';
    include('szkielet/sortowanie.php');
    ?>

    <div id="tworczosc" class="ui four stackable cards GRIDZIKI ">
        <?php
        $wyniki = include('php/pobierz/tworczosc.php');
        $i = 1;
        foreach ($wyniki as $wynik)
        {

            ?>
                <div class="card gridzik sortujace" style="background-color:black;" >
                    <div class="image">
                        <img class="gridzikimg img-responsive" src="<?php echo obrazekAdres(true,$wynik['id_dziela']); ?>">
                    </div>

                    <div class="tytulik" style="font-size: 200%;">
                        <a style="color:inherit;" href="<?php echo intToKategoria(idToKategoria($wynik['id_dziela'])).'.php?id='.$wynik['id_dziela']; ?>">
                            <div class="ui header grey inverted tytulikheader" style="cursor:pointer">
                                <?php echo tlumaczenie($wynik['id_dziela'],2); ?>
                                <div style="font-size: 50%;">2016</div>
                            </div>
                        </a>
                    </div>
                    <div class="Buttoniki ui fluid buttons compact grey" style="position: absolute;bottom: 0;">
                        <div class="ui icon button" >
                            <i class="icon star yellow"></i><span class="ocenadopor"><?php echo rand(0, 100)/ 10; ?></span>
                        </div>
                        <div class="ui icon button">
                            <i class="icon unhide black"></i><span class="wysdopor"> <span class="ocenadopor"><?php echo rand(0, 100); ?></span>K
                        </div>
                        <div class="ui button">
                            <i class="icon signal"></i><span class="jakoscdopor"><?php echo rand(0, 100); ?></span>%
                        </div>
                    </div>
                </div>

            <?php

        }
        ?>
    </div>



</div>


