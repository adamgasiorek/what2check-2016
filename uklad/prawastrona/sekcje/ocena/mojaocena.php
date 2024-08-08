<div  style="text-align: center;">


    <div style="font-size: 1.2vw;width: 100%;padding-top: 3%;padding-bottom: 6%;" >
        <?php
        $ocenaobj = include ('php/pobierz/mojaOcena.php');
        $status = $ocenaobj['status'] ?? 0;
        $ocena = $ocenaobj['ocena'] ?? 5;
        ?>
        <span class="aktywnoscjakas podobasie <?php if($status != 0) { if($status == 1) echo "aktywny"; else echo "nieaktywny";}  ?>" >
            <i class="checkmark icon"></i> Podoba się
        </span>
        <span class="aktywnoscjakas dosprawdzenia <?php if($status != 0) { if($status == 2) echo "aktywny"; else echo "nieaktywny";}  ?>" >
            <i class="checkmark box icon"></i> Do sprawdzenia
        </span>
        <span class="aktywnoscjakas niepodobasie <?php if($status != 0) { if($status == 3) echo "aktywny"; else echo "nieaktywny";}  ?>" >
            <i class="remove icon"></i> Nie podoba się
        </span>
    </div>

    <div style="padding-bottom: 3%;" id="mojaocenka">
        <div style="font-size: 1.2vw" class="ui big header">
            Moja Ocena: <span id="mojaocena"><?php echo $ocena; ?></span>
        </div>


        <div id="ratingoff" style="font-size: 2.7vw" class="ui massive star rating ratingoff" data-rating="5"  data-max-rating="5"></div>
        <div id="ratingoon" style="font-size: 2.7vw" class="ui massive star rating " data-rating="<?php echo ($ocena)-5; ?>" data-max-rating="5"></div>
    </div>


</div>


