<?php

include_once "../db_common.php";

function save($name, $surname, $dni, $curse, $account, $tableId)
{
    $db = getDatabase();
    $statement = $db->prepare("INSERT INTO student(name, surname, dni, curse_id, account, table_id) VALUES (?,?,?,?,?,?)");
    return $statement->execute([$name, $surname, $dni, $curse, $account, $tableId]);
}

function getList()
{
    $query = "SELECT st.id, st.name, st.surname, st.dni, cr.name as curse, st.account, tb.name as table_name FROM student st
              LEFT JOIN curse cr on st.curse_id = cr.id
              LEFT JOIN tables tb on st.table_id = tb.id WHERE st.is_deleted = FALSE";
    $db = getDatabase();
    $statement = $db->query($query);
    return $statement->fetchAll();
}

function getByID($id)
{
    $db = getDatabase();
    $statement = $db->prepare("SELECT id, name, surname, dni, curse_id, account, table_id FROM student WHERE id = ?");
    $statement->execute([$id]);
    return $statement->fetchObject();
}

function delete($id)
{
    $db = getDatabase();
    $statement = $db->prepare("UPDATE student SET is_deleted = TRUE WHERE id = ?");
    return $statement->execute([$id]);
}


function update($id, $name, $surname, $dni, $curse, $account, $tableId)
{
    $db = getDatabase();
    $statement = $db->prepare("UPDATE student SET name = ?, surname = ?, dni = ?, curse_id = ?, account = ?, table_id = ? WHERE id = ?");
    $statement->execute([$name, $surname, $dni, $curse, $account, $tableId, $id]);
}

