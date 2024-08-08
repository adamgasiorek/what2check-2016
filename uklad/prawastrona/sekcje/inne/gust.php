
<div class="ui large dividing header">
    Rodzaj:
</div>


<?php

$wyniki = include('php/pobierz/mojGust/mojGust.php');

echo '<ul class="chart">';
foreach ($wyniki as $wynik)
{
      echo  '<li style="cursor:pointer;" class="past rodzaj" title="'.intToKategoria($wynik['kategoria']).'" >
              <span class="bar" data-number="'.$wynik['sumka'].'"></span>
              <span class="number">'.$wynik['sumka'].'</span>
              </li>
              <div class="rodzajpokazschow">rodzaj</div>';
}
echo '</ul>';


?>

<div class="ui large dividing header">
    Oceny:
</div>

<?php

$wyniki = include('php/pobierz/mojGust/mojGustoceny.php');

echo '<ul class="chart">';
foreach ($wyniki as $wynik)
{
    echo  '<li class="past" title="'.$wynik['ocena'].'" >
              <span class="bar" data-number="'.$wynik['sumka'].'"></span>
              <span class="number">'.$wynik['sumka'].'</span>
              </li>';
}
echo '</ul>';


?>

<script>
    $('div.rodzajpokazschow').hide();
    $('li.rodzaj').click(function(){
        $(this).next('div.rodzajpokazschow').toggle();
    });
</script>