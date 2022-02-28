<?php

include_once "../db_common.php";

function getDiningRoomList()
{
    $db = getDatabase();
    $statement = $db->query("SELECT id, symbol, name FROM dining_room WHERE is_deleted = FALSE");
    return $statement->fetchAll();
}
