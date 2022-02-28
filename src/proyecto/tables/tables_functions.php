<?php

include_once "../db_common.php";

function save($name, $dining)
{
    $db = getDatabase();
    $statement = $db->prepare("INSERT INTO tables(name, dining_id) VALUES (?,?)");
    return $statement->execute([$name, $dining]);
}

function getList()
{
    $db = getDatabase();
    $statement = $db->query("SELECT id, name, dining_id FROM tables WHERE is_deleted = FALSE");
    return $statement->fetchAll();
}

function getListWhitDiningName()
{
    $query = "SELECT tb.id, tb.name, CONCAT(dr.name, ' [', dr.symbol, ']') AS dining_name FROM tables tb
              LEFT JOIN dining_room dr on tb.dining_id = dr.id WHERE tb.is_deleted = FALSE";
    $db = getDatabase();
    $statement = $db->query($query);
    return $statement->fetchAll();
}


function getByID($id)
{
   $db = getDatabase();
    $statement = $db->prepare("SELECT id, name, dining_id FROM tables WHERE id = ?");
    $statement->execute([$id]);
    return $statement->fetchObject();
}

function delete($id)
{
    $db = getDatabase();
    $statement = $db->prepare("UPDATE tables SET is_deleted = TRUE WHERE id = ?");
    return $statement->execute([$id]);
}


function update($id, $name, $dining)
{
    $db = getDatabase();
    $statement = $db->prepare("UPDATE tables SET  name = ?, dining_id = ? WHERE id = ?");
    $statement->execute([$name, $dining, $id]);
}

