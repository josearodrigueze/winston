<?php include_once('./header.php'); ?>
<?php require_once('./backend/conexion.php'); ?>
<?php
$sql = "select * from usuarios WHERE 1=1 ";
$res = mysqli_query($link, $sql);
?>

<div id="users-admin-list" class="jumbotron">
    <?php if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "deleted"): ?>
        <div class="alert alert-success" role="alert">
            Usuario eliminado exitosamente.
        </div>
    <?php endif; ?>


    <?php if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "reset-password"): ?>
        <div class="alert alert-success" role="alert">
            Password resetado con exito, el valor es '1234456'
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="float-right">
                <a class="btn btn-primary" id="projects-add" href="users-form.php">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
    </div>

    <br/>
    <table class="table table-striped" id="users-table">
        <thead>
        <tr>
            <th>Acciones</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <!--<th>Password</th>-->
            <th>Tipo usuario</th>
            <th>status</th>
        </tr>
        </thead>
        <tbody id="users-admin-list-body">
        <?php while ($r = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td class="btn-group">
                    <a href="./users-form.php?id=<?= $r['id'] ?>" class="btn btn-primary">
                        <span class="fas fa-pen" aria-hidden="true"></span>
                    </a>
                    <!-- href="./project-save.php?id=<?= $r['id'] ?>&action=delete"  -->
                    <a class="btn btn-warning" onclick="resetPassword(<?= $r['id'] ?>)">
                        <span class="fas fa-key" aria-hidden="true"></span>
                    </a>

                    <a class="btn btn-danger" onclick="deleteUser(<?= $r['id'] ?>)">
                        <span class="fas fa-trash-alt" aria-hidden="true"></span>
                    </a>

                </td>
                <td><?= $r['nombre'] ?></td>
                <td><?= $r['usuario'] ?></td>
                <?php /*<td><?= $r['password'] ?></td>*/ ?>
                <td><?= $r['tipo_usuario'] ?></td>
                <td><?= $r['status'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php include_once('./footer.php'); ?>

<script type="text/javascript">
    function deleteUser(id) {
        bootbox.confirm("Esta acción eliminara el proyecto indicado, ¿esta seguro?", function (result) {
            if (result) {
                window.location.href = "./users-save.php?id=" + id + "&action=delete";
            }
        });
    }

    function resetPassword(id) {
        bootbox.confirm("Se cambiara el password del usuario a '123456', ¿esta seguro?", function (result) {
            if (result) {
                window.location.href = "./users-save.php?id=" + id + "&action=reset-password";
            }
        });
    }

    $(document).ready(function () {
        $('#users-table').DataTable();
    });


</script>