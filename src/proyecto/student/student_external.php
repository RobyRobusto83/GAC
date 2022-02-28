<?php

include_once "../db_common.php";

function getStudentsList()
{
    $query = "SELECT st.id, CONCAT(st.name, ' ', st.surname) AS name FROM student st WHERE st.is_deleted = FALSE";
    $db = getDatabase();
    $statement = $db->query($query);
    return $statement->fetchAll();
}

function getStudentsListByCurse($curse_id)
{
    $db = getDatabase();
    $statement = $db->prepare("SELECT st.id, CONCAT(st.name, ' ', st.surname) AS name FROM student st WHERE st.curse_id = ? AND st.is_deleted = FALSE");
    $statement->execute([$curse_id]);
    return $statement->fetchAll();
}
