<?php
include_once "../private_header.php";
if (!isset($_POST["name"])) {
    exit("No se ha informado el nombre");
}
if (!isset($_POST["surname"])) {
    exit("No se han informado los apellidos");
}
if (!isset($_POST["dni"])) {
    exit("No se ha informado el DNI");
}
if (!isset($_POST["curse"])) {
    exit("No se ha informado el curso");
}
if (!isset($_POST["account"])) {
    exit("No se ha informado la cuenta bancaria");
}
if (!isset($_POST["table"])) {
    exit("No se ha informado la mesa");
}
include_once "student_functions.php";
save($_POST["name"], $_POST["surname"], $_POST["dni"], $_POST["curse"], $_POST["account"], $_POST["table"]);
header("Location: list.php");
