<?php include_once './header.php'; ?>
<?php require_once('./backend/conexion.php'); ?>
<?php
// example -> https://obedalvarado.pw/blog/crud-datos-empleados-php-mysql-bootstrap/
$id = $_SESSION['user_id'];

$nombre = '';
$usuario = '';
$password = '';
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
    }
}
?>
<div id="user-profile-content" class="jumbotron">
    <form class="border border-light p-5" id="users-admin-form" action="users-save.php" method="POST">
        <div class="alert" role="alert" id="users-alert" style="display: none"></div>

        <p class="h4 mb-4 text-center">Perfil</p>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="action" value="profile">
        <input type="hidden" name="type" value="">

        <div class="form-group">
            <label for="user-name">Nombre</label>
            <input type="text" id="user-name" name="name" class="form-control mb-4"
                   placeholder="Juan Lopez" value="<?= $nombre ?>" required/>
        </div>

        <div class="form-group">
            <label for="users-email">Email</label>
            <input type="text" id="users-email" name="email" class="form-control mb-4"
                   placeholder="jlopez@gmail.com" value="<?= $usuario ?>" required/>
        </div>

        <div class="form-group">
            <label for="user-password">Password</label>
            <input type="password" id="user-password" name="password" class="form-control mb-4"
                   value="<?= $password ?>"/>
        </div>

        <div class="text-center">
            <button class="btn btn-info" type="submit" name="submit" id="user-submit">
                Actualizar
            </button>
        </div>
    </form>
</div>

<?php include_once './footer.php'; ?>

<script type="text/javascript">
    $('#users-admin-form').validate({
        errorPlacement: function (error) {
            error.addClass("text-danger");
        }
    });
</script>
