<div class="SEKCJAprawa" >
<table class="ui very basic very padded  table">
    <thead>
        <tr class="center aligned">
            <th>Ocena</th>
            <th>Wyswietlenia</th>
            <th>Zainteresowanie</th>
        </tr>
    </thead>
    <tbody>
        <tr class="center aligned">
            <td>
                <div class="ui huge header">
                    <i class="star yellow icon"></i>
                    <?php
                    echo include('php/pobierz/statystkidziela/sredniaOcena.php');
                    ?>
                </div>
            </td>
            <td>
                <div class="ui huge header">
                    <?php
                    echo include('php/pobierz/statystkidziela/wyswietlenia.php');
                    ?>
                </div>
            </td>
            <td>
                <div class="ui huge header">
                    70%
                </div>
            </td>
        </tr>
    </tbody>
</table>






<div id="AccordionOcenkikat">
    <div class="ui fluid styled accordion">
        <div class="title active">
            <i class="dropdown icon"></i>
            Moja Ocena
        </div>
        <div class="content active">
            <?php
                include('mojaocena.php');
            ?>
        </div>
        <div class="title ">
            <i class="dropdown icon"></i>
            Oceny znajomych
        </div>
        <div class="content ">
            <?php
                include('ocenyznajomych.php');
            ?>
        </div>
        <div class="title">
            <i class="dropdown icon"></i>
            Tagi
        </div>
        <div class="content">
            <?php
            include('tagi.php');
            ?>
        </div>
        <div class="title">
            <i class="dropdown icon"></i>
            Kategoria
        </div>
        <div class="content">
            <?php
            include('kategoria.php');
            ?>
        </div>
    </div>
</div>


</div>
