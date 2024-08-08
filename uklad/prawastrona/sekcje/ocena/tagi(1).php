<div style="margin-top: 10px;padding: 0 10px 0 10px;">

    <div style="padding: 0 0 30px 0;">
        <span id="pokazstatystykimytagow"  style="font-size:1.3em;float:left;">
            <i class="icon-stats-bars icon"></i>
            Moje Tagi:
        </span>
        <span id="statystykimytagow" style="padding-left: 10px;padding-top: 3px;float:left; width: 300px;">
                <div id="myPozTagi" class="ui tiny header left floated green" >0%</div>
                <div id="myNeuTagi" class="ui tiny header left floated blue" >0%</div>
                <div id="myNegTagi" class="ui tiny header left floated red" >0%</div>
        </span>
    </div>

    <?php
    if($JA_ID != 0)
    {
    $wyniki = include('php/pobierz/mojeTagi.php');

    ?>
    <div>
        <textarea id="mojeTagi"><?php foreach ($wyniki as $wynik) { echo $wynik['nazwa'].$wynik['status'].","; }?></textarea>
    </div>
    <?php
    }
    else
    {
       echo '<div><textarea id="mojeTagi"></textarea></div>';
    }
?>
<div style="padding: 20px 0 20px 0;">
    <span id="pokazstatystykitagow"  style="font-size:1.3em;float:left;">
        <i class="icon-stats-bars icon"></i>
        Tagi:
    </span>
    <span id="statystykitagow" style="padding-left: 10px;padding-top: 3px;float:left;">
        <div id="PozTagi" class="ui tiny header left floated green" >0%</div>
        <div id="NeuTagi" class="ui tiny header left floated blue" >0%</div>
        <div id="NegTagi" class="ui tiny header left floated red" >0%</div>
    </span>
</div>


<ul class="tag-editor" id="tagiinnych" style="border: none;padding: 0px;margin-bottom: 0;">
    <?php

        $wyniki = include('php/pobierz/Tagi.php');
        if(count ($wyniki) == 0)
            echo "nikt jeszcze nie dodal taga";
        else
        foreach ($wyniki as $wynik)
        {
    ?>
    <li class="tagii" style="margin: 5px">
        <div class="tag-editor-spacer"></div>
        <div class="tag-editor-tag"><?php echo $wynik['nazwa'].$wynik['status']; ?> </div>
        <div class="tag-editor-delete"><?php echo $wynik['ile']; ?> </div>
    </li>
    <?php
        }
    ?>
</ul>

</div>