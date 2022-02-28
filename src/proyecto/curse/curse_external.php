<?php

include_once "../db_common.php";

function getCurseList()
{
    $db = getDatabase();
    $statement = $db->query("SELECT id, symbol, name FROM curse");
    return $statement->fetchAll();
}

