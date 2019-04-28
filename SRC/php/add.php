<?php
require_once("conexion.php");

if (isset($_POST['add'])) {
    $codigo = mysqli_real_escape_string($con, (strip_tags($_POST["codigo"], ENT_QUOTES)));//Escanpando caracteres
    $nombres = mysqli_real_escape_string($con, (strip_tags($_POST["nombres"], ENT_QUOTES)));//Escanpando caracteres
    $lugar_nacimiento = mysqli_real_escape_string($con, (strip_tags($_POST["lugar_nacimiento"], ENT_QUOTES)));//Escanpando caracteres
    $fecha_nacimiento = mysqli_real_escape_string($con, (strip_tags($_POST["fecha_nacimiento"], ENT_QUOTES)));//Escanpando caracteres
    $direccion = mysqli_real_escape_string($con, (strip_tags($_POST["direccion"], ENT_QUOTES)));//Escanpando caracteres
    $telefono = mysqli_real_escape_string($con, (strip_tags($_POST["telefono"], ENT_QUOTES)));//Escanpando caracteres
    $puesto = mysqli_real_escape_string($con, (strip_tags($_POST["puesto"], ENT_QUOTES)));//Escanpando caracteres
    $estado = mysqli_real_escape_string($con, (strip_tags($_POST["estado"], ENT_QUOTES)));//Escanpando caracteres


    $cek = mysqli_query($con, "SELECT * FROM empleados WHERE codigo='$codigo'");
    if (mysqli_num_rows($cek) == 0) {
        $insert = "INSERT INTO empleados(codigo, nombres, lugar_nacimiento, fecha_nacimiento, direccion, telefono, puesto, estado) VALUES('$codigo','$nombres', '$lugar_nacimiento', '$fecha_nacimiento', '$direccion', '$telefono', '$puesto', '$estado')";
        $insert = mysqli_query($con, $insert) or die(mysqli_error());
        if ($insert) {
            //success
        } else {
            //fail
        }
    } else {
        //database error
    }
}


