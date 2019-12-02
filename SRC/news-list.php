<?php include_once('./header.php'); ?>
<?php require_once('./backend/conexion.php'); ?>
<?php
$sql = "select * from noticias WHERE 1=1";
$res = mysqli_query($link, $sql);
?>

<div id="projects-admin-list" class="jumbotron">
    <?php if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "deleted"): ?>
        <div class="alert alert-success" role="alert">
            Noticia eliminada exitosamente.
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="float-right">
                <a class="btn btn-primary" id="projects-add" href="news-form.php">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
    </div>

    <br/>
    <table class="table table-striped" id="projects-table">
        <thead>
        <tr>
            <th>Acciones</th>
            <th>Autor</th>
            <th>Titulo</th>
            <th>Categorias</th>
            <th>Fecha</th>
        </tr>
        </thead>
        <tbody id="projects-admin-list-body">
        <?php while ($r = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td class="btn-group">
                    <a href="./news-form.php?id=<?= $r['id'] ?>" class="btn btn-primary">
                        <span class="fas fa-pen" aria-hidden="true"></span>
                    </a>
                    <a class="btn btn-danger" onclick="deleteProject(<?= $r['id'] ?>)">
                        <span class="fas fa-trash-alt" aria-hidden="true"></span>
                    </a>
                </td>
                <td><?= $r['autor'] ?></td>
                <td><?= $r['titulo'] ?></td>
                <td><?= $r['categoria'] ?></td>
                <td><?= $r['fecha'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php include_once('./footer.php'); ?>

<script type="text/javascript">
    function deleteProject(id) {
        bootbox.confirm("Esta acción eliminara la noticia indicada, ¿Estas seguro?", function (result) {
            if (result) {
                window.location.href = "./news-save.php?id=" + id + "&action=delete";
            }
        });
    }

    $(document).ready(function () {
        $('#projects-table').DataTable();
    });


</script>