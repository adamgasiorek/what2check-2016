<?php
session_start();
$_SESSION["jezyk"] = $_GET["jezyk"];
$_SESSION["jezykID"] = $_GET["jezykID"];
header('Location: ' . $_SERVER['HTTP_REFERER']); // STRONA WSTECZ
?>