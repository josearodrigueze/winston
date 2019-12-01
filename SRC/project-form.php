<?php include_once './header.php'; ?>
<?php require_once('./backend/conexion.php'); ?>

<?php
// example -> https://obedalvarado.pw/blog/crud-datos-empleados-php-mysql-bootstrap/
$id = mysqli_real_escape_string($link, (strip_tags($_REQUEST["id"], ENT_QUOTES)));//Escanpando caracteres

$title = '';
$desc = '';
$start = '';
$end = '';
$finish = '';
$tech = '';
$foto1 = null;
$foto2 = null;
$foto3 = null;
if (!empty($id)) {
    $sql = "select * from proyectos WHERE id = $id";
    $sql = mysqli_query($link, $sql);
    if (mysqli_num_rows($sql) == 0) {
        echo "<script type=\"text/javascript\">window.location.replace(\"./index.php\")</script>";
        die();
    } else {
        $row = mysqli_fetch_assoc($sql);
        $title = $row['titulo'];
        $desc = $row['descripcion'];
        $start = $row['fecha_inicio'];
        $end = $row['fecha_fin'];
        $finish = $row['finalizado'];
        $tech = $row['tecnologia'];
        $foto1 = $row['foto1'];
        $foto2 = $row['foto2'];
        $foto3 = $row['foto3'];
    }
}
?>
<div id="projects-admin-add" class="jumbotron">
    <form class="border border-light p-5" id="projects-admin-form"
          enctype="multipart/form-data" action="project-save.php" method="POST">
        <div class="alert" role="alert" id="project-alert" style="display: none"></div>

        <p class="h4 mb-4 text-center"><?= (empty($id)) ? 'Nuevo' : 'Editar' ?> proyecto</p>

        <input type="hidden" id="project-id" name="id" value="<?= $id ?>">

        <label for="project-title">Titulo</label>
        <input type="text" id="project-title" name="titulo" class="form-control mb-4"
               placeholder="Titulo" value="<?= $title ?>">

        <label for="project-description">Descripción</label>
        <textarea class="form-control rounded-0" id="project-description" name="descripcion"
                  rows="3" placeholder="Descripción"><?= $desc ?></textarea>

        <br/>

        <!--
        <label for="project-start">Fecha de inicio</label>
        <input type="text" id="project-start" name="fecha_inicio" class="form-control mb-4"
               placeholder="1900-12-25" value="<?= $start ?>">

        <label for="project-finish">Fecha de termino</label>
        <input type="text" id="project-finish" name="fecha_fin" class="form-control mb-4"
               placeholder="1900-12-25" value="<?= $end ?>">
        -->

        <div class="form-group">
            <label for="project-start">Fecha de inicio</label>
            <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker7"
                       name="fecha_inicio" value="<?= $start ?>" readonly="readonly"/>
                <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="project-finish">Fecha de termino</label>
            <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker8"
                       name="fecha_fin" value="<?= $end ?>" readonly="readonly"/>
                <div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>

        <label for="project-tecnologies">Tecnologías</label>
        <select id="project-tecnologies" name="tecnologia[]" multiple
                class="browser-default custom-select mb-4 chosen-select">
            <?php
            $array = ["php", "html", "javascript", "sql"];
            foreach ($array as $valor) {
                $selected = strpos(strtolower($tech), strtolower($valor)) !== false; ?>
                <option value="<?= $valor ?>"<?= $selected ? 'selected="selected"' : '' ?>><?= $valor ?></option>
            <?php } ?>
        </select>

        <div class="custom-control custom-checkbox mb-4">
            <input type="checkbox" class="custom-control-input" id="project-is-finished" value="1"
                   name="finalizado" <?= ($finish == 1) ? "checked='checked'" : '' ?>>
            <label class="custom-control-label" for="project-is-finished">Finalizó?</label>
        </div>

        <div class="custom-control custom-checkbox mb-4">
            <?php if (!empty($foto1)) : ?>
                <img src="<?= $foto1 ?>" alt="foto-1" class="img-thumbnail" style="max-width: 86px"/>
            <?php endif; ?>
            <label for="foto1">Foto</label>
            <input id="foto1" name="foto1" type="file"/>
        </div>

        <div class="custom-control custom-checkbox mb-4">
            <?php if (!empty($foto2)) : ?>
                <img src="<?= $foto2 ?>" alt="foto-2" class="img-thumbnail" style="max-width: 86px"/>
            <?php endif; ?>
            <label for="foto2">Foto</label>
            <input id="foto2" name="foto2" type="file"/>
        </div>

        <div class="custom-control custom-checkbox mb-4">
            <?php if (!empty($foto3)) : ?>
                <img src="<?= $foto3 ?>" alt="foto-3" class="img-thumbnail" style="max-width: 86px"/>
            <?php endif; ?>
            <label for="foto3">Foto</label>
            <input id="foto3" name="foto3" type="file"/>
        </div>

        <div class="custom-control custom-checkbox mb-4">
            <label for="foto3">Foto Max 2MB</label>
        </div>

        <div class="text-center">
            <a class="btn btn-light" href="./project-list.php">Volver</a>
            <button class="btn btn-light" type="reset">Limpiar</button>
            <button class="btn btn-info" type="submit" name="submit" id="project-submit">
                <?= (empty($id)) ? 'Crear' : 'Editar' ?> proyecto
            </button>
        </div>
    </form>
</div>

<?php include_once './footer.php'; ?>

<script type="text/javascript">
    $(".chosen-select").chosen();

    $(function () {
        $('#datetimepicker7').datetimepicker({format: 'YYYY-MM-DD', ignoreReadonly: true});
        $('#datetimepicker8').datetimepicker({format: 'YYYY-MM-DD', ignoreReadonly: true, useCurrent: false});

        $("#datetimepicker7").on("change.datetimepicker", function (e) {
            $('#datetimepicker8').datetimepicker('minDate', e.date);
        });
        $("#datetimepicker8").on("change.datetimepicker", function (e) {
            $('#datetimepicker7').datetimepicker('maxDate', e.date);
        });
    });
</script>
