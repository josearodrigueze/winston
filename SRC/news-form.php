<?php include_once './header.php'; ?>
<?php require_once('./backend/conexion.php'); ?>

<?php
// example -> https://obedalvarado.pw/blog/crud-datos-empleados-php-mysql-bootstrap/
$id = (isset($_REQUEST["id"])) ? $_REQUEST["id"] : null;

$title = '';
$desc = '';
$categoria = '';
$autor = '';
if (!empty($id)) {
    $id = mysqli_real_escape_string($link, (strip_tags($id, ENT_QUOTES)));//Escanpando caracteres

    $sql = "select * from noticias WHERE id = $id";
    $sql = mysqli_query($link, $sql);
    if (mysqli_num_rows($sql) == 0) {
        echo "<script type=\"text/javascript\">window.location.replace(\"./index.php\")</script>";
        die();
    } else {
        $row = mysqli_fetch_assoc($sql);
        $autor = $row['autor'];
        $title = $row['titulo'];
        $desc = $row['noticia'];
        $categoria = $row['categoria'];
    }
}
?>
<div id="projects-admin-add" class="jumbotron">
    <form class="border border-light p-5" id="projects-admin-form"
          enctype="multipart/form-data" action="news-save.php" method="POST">
        <div class="alert" role="alert" id="news-alert" style="display: none"></div>

        <p class="h4 mb-4 text-center"><?= (empty($id)) ? 'Nueva' : 'Editar' ?> Noticia</p>
        <input type="hidden" id="news-id" name="id" value="<?= $id ?>">

        <div class="form-group">
            <label for="news-title">Titulo</label>
            <input type="text" id="news-title" name="titulo" class="form-control mb-4"
                   placeholder="Titulo" value="<?= $title ?>" required/>
        </div>

        <div class="form-group">
            <label for="news-description">Noticia</label>
            <textarea class="form-control rounded-0" id="news-description" name="descripcion"
                      rows="3" placeholder="Noticia" required><?= $desc ?></textarea>
        </div>

        <div class="form-group">
            <label for="news-tecnologies">Categorías</label>
            <select id="news-tecnologies" name="categoria[]" multiple required
                    class="browser-default custom-select mb-4 chosen-select">
                <?php
                $array = ["php", "html", "javascript", "sql"];
                foreach ($array as $valor) {
                    $selected = strpos(strtolower($categoria), strtolower($valor)) !== false; ?>
                    <option value="<?= $valor ?>"<?= $selected ? 'selected="selected"' : '' ?>><?= $valor ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="news-title">Autor</label>
            <input type="text" id="news-title" name="autor" class="form-control mb-4"
                   placeholder="Autor" value="<?= $autor ?>" required/>
        </div>

        <div class="text-center">
            <a class="btn btn-light" href="./news-list.php">Volver</a>
            <button class="btn btn-light" type="reset">Limpiar</button>
            <button class="btn btn-info" type="submit" name="submit" id="news-submit">
                <?= (empty($id)) ? 'Crear' : 'Editar' ?> Noticia
            </button>
        </div>
    </form>
</div>

<?php include_once './footer.php'; ?>

<script type="text/javascript">
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

    $(".chosen-select").chosen();
    $.validator.setDefaults({ignore: ":hidden:not(select)"});

    // validation of chosen on change
    if ($("select.chosen-select").length > 0) {
        $("select.chosen-select").each(function () {
            if ($(this).attr('required') !== undefined) {
                $(this).on("change", function () {
                    $(this).valid();
                });
            }
        });
    }

    $('#projects-admin-form').validate({
        errorPlacement: function (error, element) {
            if (element.is("input.form-control.datetimepicker-input.error")) {
                element.parent().parent().append(error);
            } else if (element.is("select.chosen-select")) {
                element.next("div.chosen-container").append(error);
            } else {
                error.insertAfter(element);
            }
            error.addClass("text-danger");
        }
    });
</script>
