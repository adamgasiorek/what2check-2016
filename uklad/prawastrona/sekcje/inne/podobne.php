<div class="SEKCJAprawa" >
    <div style="margin-bottom: 10px;">
        <input class="Wyszukiwarka" id="Wyszukiwarkapodobne" />
    </div >

    <?php
    $daty = true;
    $likee = true;
    $id = 'podobinkie';
    include('szkielet/sortowanie.php');
    ?>

    <div id="podobinkie"  class="ui three stackable cards GRIDZIKI">
        <?php
        $wyniki = include('php/pobierz/podobne.php');

        foreach ($wyniki as $wynik)
        {
            $nr = 0;
            //Dodaje z podobienstawa1 LUB podobienstawa2
            $temp = $STRONA_ID;
            if($wynik['id2'] == $STRONA_ID)
            {
                $nr = 1;
                $STRONA_ID = $wynik['id'.$nr.''];
            }
            else
                $nr = 2;


            //TYPOWY PRZYCISK PLUS CZY MINUS
            $rodzaj = 3;
            $idek = $wynik['idek'];
            $ilosc = include('php/pobierz/plusczyminusSUM.php');
            $ilosc['sumka']++;
            $voteoff = '';
            if($JA_ID == $wynik['id_uzytkownika'])
            {
                $mojareakcja = 'positive';
                $voteoff = 'voteoff';
            }
            else
                $mojareakcja = include('php/pobierz/plusczyminusREAKCJA.php');

            ?>
                        <div class="card gridzik sortujace" style="background-color:black;" >
                            <div class="image" >
                                <img class="gridzikimg img-responsive" src="<?php echo obrazekAdres(true, $wynik['id'.$nr.'']); ?>" >
                            </div >

                            <div class="tytulik" style="font-size: 200%;" >
                                <a style="color:inherit;" href="<?php echo intToKategoria(idToKategoria($wynik['id'.$nr.''])) . '.php?id=' . $wynik['id'.$nr.'']; ?>" >
                                    <div class="ui header grey inverted tytulikheader" style="cursor:pointer" >
                                        <?php echo tlumaczenie($wynik['id'.$nr.''], 2); ?>
                                        <div style="font-size: 50%;" >2016</div >
                                    </div >
                                </a >
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

<!--            <div class="card gridzik " style="background-color:black;" data-sort="--><?php //echo $ilosc['sumka']; ?><!--">-->
<!--                <div  class="image">-->
<!--                    <img class="gridzikimg" src="--><?php //echo obrazekAdres(true,$wynik['id'.$nr.'']); ?><!--">-->
<!--                </div>-->
<!--                <div class="tytulik" style="font-size: 200%;">-->
<!--                    <div class="ui dividing header grey inverted tytulikheader" style="margin-bottom: 0;">-->
<!--                        --><?php //echo tlumaczenie($wynik['id'.$nr.''],2); ?>
<!--                    </div>-->
<!--                    <div style="font-size: 70%;margin-bottom: 5px;">-->
<!--                        <i class="icon star yellow"  ></i> 7.4-->
<!--                        <br>-->
<!--                        <i class="icon unhide "  ></i> 100k-->
<!--                        <br>-->
<!--                        <i class="icon signal grey "  ></i> 80%-->
<!--                    </div>-->
<!--                    <button class="likq ui --><?php //echo $mojareakcja; ?><!-- button" >-->
<!--                        <span class="ilosc" >--><?php //echo $ilosc['sumka'] ?? 0; ?><!--</span >-->
<!--                        <span class="rodzaj" style="display:none" >--><?php //echo $rodzaj; ?><!--</span >-->
<!--                        <span class="idek" style="display:none" >--><?php //echo $idek; ?><!--</span >-->
<!--                    </button >-->
<!--                    <a href="--><?php //echo intToKategoria(idToKategoria($wynik['id'.$nr.''])).'.php?id='.$wynik['id'.$nr.'']; ?><!--">-->
<!--                        <button class="ui icon button" style="padding-bottom: 8px;">-->
<!--                            <i class=" external square icon" style="font-size: 150%;"></i>-->
<!--                        </button>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
            <?php
            $STRONA_ID = $temp;
        }

        ?>
    </div>


</div>
