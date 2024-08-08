<div>
    <h1 class="ui header">Dodane</h1>

    <div class="idealsteps-container">
        <nav class="idealsteps-nav"></nav>
        <form action="php/dodaj.php" method="post" autocomplete="off" class="idealforms" enctype="multipart/form-data">
        <div class="idealsteps-wrap">

            <!-- Step 1 -->
            <?php
            include('step1.php');
            include('step2.php');
            include('step3.php');
            include('step4.php');
            ?>

        </div>
        <span id="invalid"></span>
        </form>
    </div>


    <?php

//    $wyniki = include('php/pobierz/dodane.php');
//
//    foreach ($wyniki as $wynik)
//    {
//        //echo $wynik['id_user']." dodal ";
//        //$wynik['tekst']
//        $tekst = explode(";;", $wynik['tekst']);
//
//        var_dump($tekst);
//        echo "<hr>";
//    }
    ?>
</div>



<!--<form method="post" action="php/dodaj.php">-->
<!--    <div class="image-editor">-->
<!--        <input type="file" class="cropit-image-input">-->
<!--        <div class="cropit-preview"></div>-->
<!--        <div class="image-size-label">-->
<!--            Resize image-->
<!--        </div>-->
<!--        <input type="range" class="cropit-image-zoom-input">-->
<!--        <input type="hidden" name="image-data" class="hidden-image-data" />-->
<!--        <button type="submit">Submit</button>-->
<!--    </div>-->
<!--</form>-->


<script src="uklad/wyjatkowe/dodaj/dodaj.js"></script>
