<?php

include_once "../db_common.php";

function save($symbol, $name)
{
    $db = getDatabase();
    $statement = $db->prepare("INSERT INTO dining_room(symbol, name) VALUES (?,?)");
    return $statement->execute([$symbol, $name]);
}

function getList()
{
    $db = getDatabase();
    $statement = $db->query("SELECT id, symbol, name FROM dining_room WHERE is_deleted = FALSE");
    return $statement->fetchAll();
}

function getByID($id)
{
   $db = getDatabase();
    $statement = $db->prepare("SELECT id, symbol, name FROM dining_room WHERE id = ?");
    $statement->execute([$id]);
    return $statement->fetchObject();
}

function delete($id)
{
    $db = getDatabase();
    $statement = $db->prepare("UPDATE dining_room SET is_deleted = TRUE WHERE id = ?");
    return $statement->execute([$id]);
}


function update($id, $symbol, $name)
{
    $db = getDatabase();
    $statement = $db->prepare("UPDATE dining_room SET symbol = ?, name = ? WHERE id = ?");
    $statement->execute([$symbol, $name, $id]);
}

