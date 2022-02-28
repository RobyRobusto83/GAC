<?php

function headerFromPage($prefix = '')
{
    $boot_css = $prefix.'css/bootstrap.min.css';
    $all_css = $prefix.'css/all.min.css';
    $mine_css = $prefix.'css/mi_proyecto.css';
    $header = <<<EOT
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COLEGIO</title>
    <link rel="stylesheet" href="$boot_css">
    <link rel="stylesheet" href="$all_css">
    <link rel="stylesheet" href="$mine_css">
    <style>
        body {
            padding-top: 80px;
        }
    </style>
</head>
<body>
<main class="container-fluid">
EOT;

    echo $header;
}


function defaultFooter()
{
    $footer = <<<EOT
</main>
</body>
</html>
EOT;

    echo $footer;
}

function navLinks()
{
    $prefix = '';
    if (2 < count(explode('/', dirname($_SERVER['REQUEST_URI'])))) {
         $prefix = '../';
    }
    return [
        [
            'active' => false,
            'href' => $prefix."main.php",
            'literal' => "Home",
            'fa_icon' => "fa-home"
        ],
        [
            'active' => false,
            'href' => $prefix."curse/list.php",
            'literal' => "Cursos",
            'fa_icon' => "fa-dragon"
        ],
        [
            'active' => false,
            'href' => $prefix."student/list.php",
            'literal' => "Alumnos",
            'fa_icon' => "fa-users"
        ],
        [
            'active' => false,
            'href' => $prefix."tables/list.php",
            'literal' => "Mesas",
            'fa_icon' => "fa-coffee"
        ],
        [
            'active' => false,
            'href' => $prefix."dining_room/list.php",
            'literal' => "Comedor",
            'fa_icon' => "fa-coffee"
        ],
        [
            'active' => false,
            'href' => $prefix."attendance/report.php",
            'literal' => "Informe de asistencia",
            'fa_icon' => "fa-address-book"
        ],
        [
            'active' => true,
            'href' => $prefix."logout.php",
            'literal' => "Salir&nbsp;",
            'fa_icon' => "fa-hands-helping"
        ]
    ];
}
