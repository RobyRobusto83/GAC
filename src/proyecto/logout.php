<?php
session_start();
unset($_SESSION["username"], $_SESSION["password"]);
session_destroy();
header('Refresh: 0; URL = index.php');
