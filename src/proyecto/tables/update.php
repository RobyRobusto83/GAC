<?php
include_once "../private_header.php";
if (!isset($_POST["name"]) || !isset($_POST["dining"]) || !isset($_POST["id"])) {
    exit("No data provided");
}
include_once "tables_functions.php";
update($_POST["id"],$_POST["name"], $_POST["dining"]);
header("Location: list.php");

