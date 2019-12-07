<?php include_once './header.php'; ?>
<?php require_once('./backend/conexion.php'); ?>
<?php
// example -> https://obedalvarado.pw/blog/crud-datos-empleados-php-mysql-bootstrap/
$id = (isset($_REQUEST["id"])) ? $_REQUEST["id"] : null;

$nombre = '';
$usuario = '';
$password = '';
$tipo_usuario = '';
$status = '';
if (!empty($id)) {
    $id = mysqli_real_escape_string($link, (strip_tags($id, ENT_QUOTES)));//Escanpando caracteres

    $sql = "select * from usuarios WHERE id = $id";
    $sql = mysqli_query($link, $sql);
    if (mysqli_num_rows($sql) == 0) {
        echo "<script type=\"text/javascript\">window.location.replace(\"./index.php\")</script>";
        die();
    } else {
        $row = mysqli_fetch_assoc($sql);
        $nombre = $row['nombre'];
        $usuario = $row['usuario'];
        $password = $row['password'];
        $tipo_usuario = $row['tipo_usuario'];
        $status = $row['status'];
    }
}
?>
<div id="users-admin-add" class="jumbotron">
    <form class="border border-light p-5" id="users-admin-form" action="users-save.php" method="POST">
        <div class="alert" role="alert" id="users-alert" style="display: none"></div>

        <p class="h4 mb-4 text-center"><?= (empty($id)) ? 'Nuevo' : 'Editar' ?> Usuario</p>

        <input type="hidden" id="project-id" name="id" value="<?= $id ?>">

        <div class="form-group">
            <label for="users-email">Email</label>
            <input type="text" id="users-email" name="email" class="form-control mb-4"
                   placeholder="jlopez@gmail.com" value="<?= $usuario ?>" required/>
        </div>

        <div class="form-group">
            <label for="user-name">Nombre</label>
            <input type="text" id="user-name" name="name" class="form-control mb-4"
                   placeholder="Juan Lopez" value="<?= $nombre ?>" required/>
        </div>

        <div class="form-group">
            <label for="users-type">Tipo de usuario</label>
            <select id="users-type" name="type" required
                    class="browser-default custom-select mb-4 chosen-select">
                <?php
                $array = ["ADMINISTRADOR", "NORMAL"];
                foreach ($array as $valor) {
                    $selected = strpos(strtolower($tipo_usuario), strtolower($valor)) !== false; ?>
                    <option value="<?= $valor ?>"<?= $selected ? 'selected="selected"' : '' ?>><?= $valor ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="custom-control custom-checkbox mb-4">
            <input type="checkbox" class="custom-control-input" id="user-status" value="1"
                   name="status" <?= ($status == 1 || empty($status)) ? "checked='checked'" : '' ?>>
            <label class="custom-control-label" for="user-status">Activo?</label>
        </div>

        <div class="text-center">
            <a class="btn btn-light" href="./users-list.php">Volver</a>
            <button class="btn btn-light" type="reset">Limpiar</button>
            <button class="btn btn-info" type="submit" name="submit" id="user-submit">
                <?= (empty($id)) ? 'Crear' : 'Editar' ?> usuario
            </button>
        </div>
    </form>
</div>

<?php include_once './footer.php'; ?>

<script type="text/javascript">
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

    $('#users-admin-form').validate({
        errorPlacement: function (error, element) {
            if (element.is("select.chosen-select")) {
                element.next("div.chosen-container").append(error);
            } else {
                error.insertAfter(element);
            }
            error.addClass("text-danger");
        }
    });
</script>
