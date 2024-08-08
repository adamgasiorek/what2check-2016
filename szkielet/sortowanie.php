<div class="ui secondary pointing menu kliki">
    <a class="active item ocenionne" data-tab="first">Najwyzej Ocenione</a>
    <a class="item popularne" data-tab="second">Najpopularniejsze</a>
    <?php
    if($daty)
    {
        ?>
        <a class="item newest" data-tab="third">Najnowsze</a>
        <a class="item oldest" data-tab="fourth">Najstarsze</a>
        <?php
    }

    if($likee)
    {
        ?>
        <a class="item thebest" data-tab="fifth">Najlepsze</a>
        <?php
    }
    ?>

</div>
<div class="ui tab " data-tab="first" style="display: none;"></div>
<div class="ui tab " data-tab="second" style="display: none;"></div>
<div class="ui tab " data-tab="third" style="display: none;"></div>
<div class="ui tab " data-tab="fourth" style="display: none;"></div>
<div class="ui tab " data-tab="fifth" style="display: none;"></div>

