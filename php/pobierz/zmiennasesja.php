<?php
session_start();

    if (isset($_GET['requested'])) {
        // return requested value
        echo $_SESSION[$_GET['requested']] ?? 1;
    } else {
        // nothing requested, so return all values
        echo json_encode($_SESSION);
    }

