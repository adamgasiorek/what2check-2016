
<h3>Okresl gatunek filmu:</h3>



<select class="ui fluid search dropdown" multiple="">
    <option value="">Kategoria</option>
    <?php
    $wyniki = include('php/pobierz/kategorie.php');

    foreach ($wyniki as $wynik) {
        echo '<option value="'.$wynik['id'].'">'.tlumaczenie($wynik['id'],4).'</option>';
    }

    ?>
</select>



<!-- Code Start -->
<div class="chart-horiz" style="width: 100%;">
    <!-- Actual bar chart -->
    <ul class="chart">
        <?php
        $wyniki = include('php/pobierz/kategoriefreq.php');

        $ILOSC;
        $i=0;
        foreach ($wyniki as $wynik) {

            if($i==0)
                $ILOSC = $wynik['freq'];
            else
                echo '<li class="past" title="'.tlumaczenie($wynik['id_kategoria'],4).'" ><span class="bar" data-number="'.number_format(($wynik['freq']/$ILOSC)*100, 0).'"></span><span class="number">'.number_format(($wynik['freq']/$ILOSC)*100, 0).'%</span></li>';

            $i++;
        }

        ?>
    </ul>
</div>

