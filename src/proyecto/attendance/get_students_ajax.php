<?php
if (!isset($_GET["curse"])) {
    exit("[]");
}
include_once "../student/student_external.php";
$employees = getStudentsListByCurse($_GET["curse"]);
echo json_encode($employees);
