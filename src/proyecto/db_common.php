<?php

if (!function_exists('getVarFromEnvironmentVariables')) {
    function getVarFromEnvironmentVariables($key)
    {
        if (defined("_ENV_CACHE")) {
            $vars = _ENV_CACHE;
        } else {
            $file = "env.php";
            if (!file_exists($file)) {
            	$file = "../env.php";
		    if (!file_exists($file)) {
                		throw new Exception("The environment file ($file) does not exists. Please create it");
            	} 
            }
            $vars = parse_ini_file($file);
            define("_ENV_CACHE", $vars);
        }
        if (isset($vars[$key])) {
            return $vars[$key];
        } else {
            throw new Exception("The specified key (" . $key . ") does not exist in the environment file");
        }
    }
}

if (!function_exists('getDatabase')) {
    function getDatabase()
    {
        $dbHost = getVarFromEnvironmentVariables("MYSQL_DATABASE_HOST");
        $password = getVarFromEnvironmentVariables("MYSQL_PASSWORD");
        $user = getVarFromEnvironmentVariables("MYSQL_USER");
        $dbName = getVarFromEnvironmentVariables("MYSQL_DATABASE_NAME");
        $database = new PDO('mysql:host='.$dbHost.';dbname='.$dbName, $user, $password);
        $database->query("set names utf8;");
        $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $database;
    }
}

