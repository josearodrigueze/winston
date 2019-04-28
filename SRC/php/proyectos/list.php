<?php
require_once('../conexion.php');

$sql = "select * from proyectos";

if (!empty($_REQUEST['size'])) {
    $sql .= " limit ";
    if (!empty($_REQUEST['offset'])) {
        $sql .= $_REQUEST['offset'] . ", ";
    }
    $sql .= $_REQUEST['size'];
}

$res = mysqli_query($link, $sql);

$rows = array();
while ($r = mysqli_fetch_assoc($res)) {
    $rows[] = $r;
}
print json_encode($rows);