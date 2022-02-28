<?php
include_once "../private_header.php";
if (!isset($_POST["name"])) {
    exit("No se ha informado nombre");
}
if (!isset($_POST["dining"])) {
    exit("No se ha informado comedor");
}
include_once "tables_functions.php";
save($_POST["name"], $_POST["dining"]);
header("Location: list.php");
