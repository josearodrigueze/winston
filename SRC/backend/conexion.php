<?php

//Datos de conexion a la base de datos
$db_host = "localhost";
$db_user = "admin";
$db_pass = "W1nY9uUTk77z";
$db_name = "proyecto";
$db_port = "3306";

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);

if (mysqli_connect_errno()) {
    echo 'No se pudo conectar a la base de datos : ' . mysqli_connect_error();
}

mysqli_set_charset($link, 'utf8');