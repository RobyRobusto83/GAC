<?php

include_once "db_common.php";

function getList()
{
    $db = getDatabase();
    $statement = $db->query("SELECT id, symbol, name FROM curse");
    return $statement->fetchAll();
}
