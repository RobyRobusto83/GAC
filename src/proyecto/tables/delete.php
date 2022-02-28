<?php
include_once "../private_header.php";
if (!isset($_GET["id"])) {
    exit("No data provided");
}
include_once "tables_functions.php";
delete($_GET["id"]);
header("Location: list.php");
