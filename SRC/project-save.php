<?php
require_once('./backend/conexion.php');
$id = mysqli_real_escape_string($link, (strip_tags($_REQUEST["id"], ENT_QUOTES)));//Escanpando caracteres

if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "delete") {
    $query = "DELETE pj FROM proyectos pj WHERE pj.id=${id}";
    $update = mysqli_query($link, $query) or die(mysqli_error());
    header("Location: project-list.php?action=deleted");
    die();
}

$titulo = mysqli_real_escape_string($link, (strip_tags($_REQUEST["titulo"], ENT_QUOTES)));//Escanpando caracteres
$descripcion = mysqli_real_escape_string($link, (strip_tags($_REQUEST["descripcion"], ENT_QUOTES)));//Escanpando caracteres
$fecha_inicio = mysqli_real_escape_string($link, (strip_tags($_REQUEST["fecha_inicio"], ENT_QUOTES)));//Escanpando caracteres
$fecha_fin = mysqli_real_escape_string($link, (strip_tags($_REQUEST["fecha_fin"], ENT_QUOTES)));//Escanpando caracteres
$finalizado = empty($_REQUEST["finalizado"]) ? 0 : $_REQUEST["finalizado"];
$tecnologias = (isset($_REQUEST["tecnologia"])) ? $_REQUEST['tecnologia'] : [];
$tecnologias = implode(', ', $tecnologias);

$fotos = [];

$currentDir = getcwd();
$uploadDirectory = "./uploads/";

$errors = []; // Store all foreseen and unforseen errors here
$fileExtensions = ['jpeg', 'jpg', 'png']; // Get all the file extensions

$array = ['foto1', 'foto2', 'foto3'];
foreach ($array as $key => $value) {
    // do stuff
    $fileName = $_FILES[$value]['name'];
    if (empty($fileName)) {
        continue;
    }

    $fileSize = $_FILES[$value]['size'];
    $fileTmpName = $_FILES[$value]['tmp_name'];
    $fileType = $_FILES[$value]['type'];
    $fileExtension = strtolower(end(explode('.', $fileName)));

    $fileHash = time() . '-' . md5_file($fileTmpName);
    $uploadPath = $uploadDirectory . basename("${fileHash}.${fileExtension}");

    if (isset($_POST['submit'])) {
        if (!in_array($fileExtension, $fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        }

        if ($fileSize > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                array_push($fotos, $uploadPath);
                //echo "The file " . basename($fileName) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
            //} else {
            //    foreach ($errors as $error) {
            //        echo $error . "These are the errors" . "n";
            //    }
        }
    }
}

if (!empty($errors)) {
    exit("wherever");
}

$update = false;
if (empty($id)) {
    $foto1 = empty(count($fotos) > 0 && $fotos[0]) ? null : $fotos[0];
    $foto2 = empty(count($fotos) > 1 && $fotos[1]) ? null : $fotos[1];
    $foto3 = empty(count($fotos) > 2 && $fotos[2]) ? null : $fotos[2];

    $query = "
      INSERT INTO proyectos (
        titulo, descripcion, foto1, foto2, foto3, fecha_inicio, fecha_fin, finalizado, tecnologia
      ) 
      VALUES (
        '${titulo}', '${descripcion}', 
        '${foto1}', '${foto2}', '${foto3}',
        '${fecha_inicio}', '${fecha_fin}', 
        ${finalizado}, '${tecnologias}'
      )";

    $update = mysqli_query($link, $query) or die(mysqli_error());
    $id = $link->insert_id;

} else {
    $query = "UPDATE proyectos SET titulo = '${titulo}', descripcion = '${descripcion}', ";
    foreach ($fotos as $key => $value) {
        $query .= " ${array[$key]} = '${value}', ";
    }

    $query .= "
      fecha_inicio = '${fecha_inicio}', 
      fecha_fin = '${fecha_fin}', 
      finalizado = ${finalizado}, 
      tecnologia = '${tecnologias}' 
  WHERE proyectos.id = ${id}";
    $update = mysqli_query($link, $query) or die(mysqli_error());
}

if ($update) {
    header("Location: project-form.php?id=${id}");
    die();
}
