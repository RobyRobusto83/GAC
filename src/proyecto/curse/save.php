<?php
include_once "../private_header.php";
if (!isset($_POST["symbol"])) {
    exit("No se ha informado el identificador");
}
if (!isset($_POST["name"])) {
    exit("No se ha informado nombre");
}
include_once "curse_functions.php";
save($_POST["symbol"], $_POST["name"]);
header("Location: list.php");
