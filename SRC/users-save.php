<?php
require_once('./backend/conexion.php');
$id = mysqli_real_escape_string($link, (strip_tags($_REQUEST["id"], ENT_QUOTES)));//Escanpando caracteres

$password = '123456';
if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "delete") {
    $query = "DELETE pj FROM usuarios pj WHERE pj.id=${id}";
    $update = mysqli_query($link, $query) or die(mysqli_error());
    header("Location: users-list.php?action=deleted");
    die();
} elseif (isset($_REQUEST["action"]) && $_REQUEST["action"] == "reset-password") {
    $query = "UPDATE usuarios SET password = '${password}' WHERE usuarios.id = ${id}";
    $update = mysqli_query($link, $query) or die(mysqli_error());
    header("Location: users-list.php?action=reset-password");
}

$email = mysqli_real_escape_string($link, (strip_tags($_REQUEST["email"], ENT_QUOTES)));//Escanpando caracteres
$name = mysqli_real_escape_string($link, (strip_tags($_REQUEST["name"], ENT_QUOTES)));//Escanpando caracteres
$type = mysqli_real_escape_string($link, (strip_tags($_REQUEST["type"], ENT_QUOTES)));//Escanpando caracteres
$password = mysqli_real_escape_string($link, (strip_tags($_REQUEST["password"], ENT_QUOTES)));//Escanpando caracteres
$status = empty($_REQUEST["status"]) ? 0 : $_REQUEST["status"];

$update = false;
if (empty($id)) {
    $query = "INSERT INTO usuarios(nombre, usuario, password, tipo_usuario, status) VALUES 
      ('${name}', '${email}', '${password}', '${type}', '${status}')";

    $update = mysqli_query($link, $query) or die(mysqli_error());
    $id = $link->insert_id;

} else {
    $query = "UPDATE usuarios SET nombre = '${name}', usuario = '${email}' ";
    if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "profile") {
        if (!empty($password)) {
            $query .= " ,password = '${password}' ";
        }
    } else {
        $query .= " tipo_usuario = '${type}', status = '${status}' ";
    }

    $query .= " WHERE usuarios.id = ${id}";
    $update = mysqli_query($link, $query) or die(mysqli_error());
}

if ($update) {
    if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "profile") {
        header("Location: users-profile.php?id=${id}");
        die();
    }

    header("Location: users-form.php?id=${id}");
    die();
}
