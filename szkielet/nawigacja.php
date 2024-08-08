<nav class="outer-nav top horizontal" >
    
    <a href="index.php" >What2Check</a >
    <a href="dodaj.php" >DODAJ</a >
<!--    <a href="film.php?id=1" >--><?php //echo tlumaczenie(1,1); ?><!--</a >-->
<!--    <a href="muzyka.php?id=3" >--><?php //echo tlumaczenie(2,1); ?><!--</a >-->

    <?php
    if ($JA_ID != 0) {
        echo '<a style="margin-right: 2px;" href="profil.php?id=' . $JA_ID . '" >' . $JA_NAZWA . '</a >';
        echo '<a style="margin-left: 2px;" href="php/wyloguj.php"><i class="sign out icon"></i></a>';
    } else {
        echo '<a href="login.php" >'.tlumaczenie(5,1).'</a >';
    }

    echo '<a id="zmienjezyk"><span class="flag-icon flag-icon-'.intToKraj($jezykID).'"></span></a>';
    ?>

    <div >
        <input id="Wyszukiwarka" style="width:100%;" />
        <div id="szukajWg" class="ui floating right labeled icon dropdown button"
             style="position: absolute;margin-top: -46px;height: 45px;right: -5px;line-height: 20px;">
            <span class="text" >Dzielo</span>
            <div class="menu">
                <div class="header">
                    <i class="tags icon"></i>
                    Szukaj wg.
                </div>
                <div class="item" data-value="1">
                    Dzielo
                </div>
                <div class="item" data-value="2">
                    Uzytkownicy
                </div>
                <div class="item" data-value="3">
                    Listy
                </div>
            </div>
            <i class="search icon"></i>
        </div>
    </div >

</nav >


<div id="zmienjezyk" class="ui small modal" >
    <h1 class="ui header" ><?php echo tlumaczenie(6,1); ?></h1 >
    <a >
        <div class="content" >
            <ul class="jezyki" id="double" >
                <li >
                    <a href="php/zmienjezyk.php?jezyk=gb&jezykID=1" id="naAngielski" >
                        <div class="ui large header" >English</div >
                    </a >
                </li >
                <li >
                    <a href="php/zmienjezyk.php?jezyk=pl&jezykID=2" id="naPolski" >
                        <div class="ui large header" >Polski</div >
                    </a >
                </li >
            </ul >
        </div >
    </a >
</div >

