<?php
require_once('./backend/conexion.php');

$email = mysqli_real_escape_string($link, (strip_tags($_REQUEST["email"], ENT_QUOTES)));//Escanpando caracteres
$password = mysqli_real_escape_string($link, (strip_tags($_REQUEST["password"], ENT_QUOTES)));//Escanpando caracteres

$sql = "SELECT * FROM usuarios WHERE usuario='${usuario}' AND password='${password}' AND status= 1 LIMIT 1";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if ($count > 0) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_email'] = $usuario;
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_type'] = $user['tipo_usuario'];
    header("Location: ./index.php");
} else {
    header("Location: ./login.php?action=invalid");
}
die();