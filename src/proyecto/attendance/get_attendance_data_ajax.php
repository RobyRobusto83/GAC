<?php
if (!isset($_GET["date"])) {
    exit("[]");
}
if (!isset($_GET["curse"])) {
    exit("[]");
}
include_once "attendance_function.php";
$data = getAttendanceDataByDate($_GET["date"], $_GET["curse"]);
echo json_encode($data);
