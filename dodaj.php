<?php
include('funkcje/polaczenia.php');
?>
<!DOCTYPE html>
<html >
    <head >
        <?php
        include('biblioteki/biblioteki.php');
        include('szkielet/info.php');
        include('biblioteki/indexlib.php');
        ?>
        <title >What2Check</title >
        
        <script src="libs/dodaj/cropit/jquery.cropit.js"></script>
        <link rel="stylesheet" href="libs/dodaj/idealform/jquery.idealforms.css">
        <script src="libs/dodaj/idealform/jquery.idealforms.min.js"></script>

        <style>
            .cropit-preview {
                background-color: #f8f8f8;
                background-size: cover;
                border: 1px solid #ccc;
                border-radius: 3px;
                margin-top: 7px;
                
            }

            .cropit-preview-image-container {
                cursor: move;
            }

            .image-size-label {
                margin-top: 10px;
            }

            input {
                display: block;
            }

            button[type="submit"] {
                margin-top: 10px;
            }

            #result {
                margin-top: 10px;
                width: 900px;
            }

            #result-data {
                display: block;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
                word-wrap: break-word;
            }
        </style>

        

    </head >
    <body >

        <?php
        include('szkielet/startOkna.php');

        include('szkielet/jednapolowka.php');

        // START

        include('uklad/wyjatkowe/dodaj/dodaj.php');

        // KONIEC

        include('szkielet/koniecOkna.php');

        ?>

    </body >
</html >


