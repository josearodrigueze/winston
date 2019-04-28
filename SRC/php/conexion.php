<?php
//Datos de conexion a la base de datos
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "proyecto";
$db_port = "8889";

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);

if (mysqli_connect_errno()) {
    echo 'No se pudo conectar a la base de datos : ' . mysqli_connect_error();
}
