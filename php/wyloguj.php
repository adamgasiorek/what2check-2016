<?php
session_start();

unset($_SESSION["ID_USER"]);

header("location: ../login.php?error=2");