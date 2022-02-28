<?php
include_once "../private_header.php";
if (!isset($_GET["id"])) {
    exit("No data provided");
}
include_once "curse_functions.php";
$id = $_GET["id"];
delete($_GET["id"]);
header("Location: list.php");
