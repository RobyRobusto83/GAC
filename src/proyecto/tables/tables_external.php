<?php

include_once "../db_common.php";

function getListWhitDiningName()
{
    $query = "SELECT tb.id, CONCAT(tb.name, ' en  ', dr.name, ' [', dr.symbol, ']') AS name FROM tables tb
              LEFT JOIN dining_room dr on tb.dining_id = dr.id WHERE tb.is_deleted = FALSE";
    $db = getDatabase();
    $statement = $db->query($query);
    return $statement->fetchAll();
}
