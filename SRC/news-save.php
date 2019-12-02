<?php
require_once('./backend/conexion.php');
$id = mysqli_real_escape_string($link, (strip_tags($_REQUEST["id"], ENT_QUOTES)));//Escanpando caracteres

if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "delete") {
    $query = "DELETE pj FROM noticias pj WHERE pj.id=${id}";
    $update = mysqli_query($link, $query) or die(mysqli_error());
    header("Location: news-list.php?action=deleted");
    die();
}

$titulo = mysqli_real_escape_string($link, (strip_tags($_REQUEST["titulo"], ENT_QUOTES)));//Escanpando caracteres
$descripcion = mysqli_real_escape_string($link, (strip_tags($_REQUEST["descripcion"], ENT_QUOTES)));//Escanpando caracteres
$autor = mysqli_real_escape_string($link, (strip_tags($_REQUEST["autor"], ENT_QUOTES)));//Escanpando caracteres
$categoria = (isset($_REQUEST["categoria"])) ? $_REQUEST['categoria'] : [];
$categoria = implode(', ', $categoria);

$update = false;
if (empty($id)) {
    $query = "INSERT INTO noticias(autor, noticia, fecha, titulo, categoria) VALUES 
      ('${autor}', '${descripcion}', now(), '${titulo}', '${categoria}')";

    $update = mysqli_query($link, $query) or die(mysqli_error());
    $id = $link->insert_id;

} else {
    $query = "UPDATE noticias SET autor = '${autor}', 
      noticia = '${descripcion}', 
      fecha = now(), 
      titulo = '${titulo}', 
      categoria = '${categoria}' 
    WHERE noticias.id = ${id}";
    $update = mysqli_query($link, $query) or die(mysqli_error());
}

if ($update) {
    header("Location: news-form.php?id=${id}");
    die();
}
