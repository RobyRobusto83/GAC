<?php

include_once "db_common.php";

function validateLoginBySession($relocation = 'login.php')
{
    $prefix = '';
    if (2 < count(explode('/', dirname($_SERVER['REQUEST_URI'])))) {
        $prefix = '../';
    }
    if (($_SESSION['valid'] === false) || empty($_SESSION["username"])) {
        header("Location: ".$prefix.$relocation);
        exit();
    }
}

function validateIfUsernameHasAccesAllowed($username, $password)
{
    $db = getDatabase();
    $statement = $db->prepare("SELECT id FROM users WHERE username = ? AND password = ?");
    $statement->execute([$username, $password]);
    if ($statement->fetchObject()) {
        return true;
    }
    return false;
}