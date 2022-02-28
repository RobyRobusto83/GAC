<?php
include_once "../private_header.php";
if (!isset($_POST["name"]) || !isset($_POST["symbol"]) || !isset($_POST["id"])) {
    exit("No data provided");
}
include_once "curse_functions.php";
update($_POST["id"],$_POST["symbol"],$_POST["name"]);
header("Location: list.php");

