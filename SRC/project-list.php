<?php include_once('./header.php'); ?>
<?php require_once('./backend/conexion.php'); ?>
<?php
$sql = "select * from proyectos WHERE 1=1 ";
$res = mysqli_query($link, $sql);
?>

<div id="projects-admin-list" class="jumbotron">
    <?php if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "deleted"): ?>
        <div class="alert alert-success" role="alert">
            Proyecto eliminado exitosamente.
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="float-right">
                <a class="btn btn-primary" id="projects-add" href="project-form.php">
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
            <!--<th>Id</th>-->
            <th>Titulo</th>
            <!--<th>Descripción</th>-->
            <th>Tecnologias</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <!--<th>Finalizado</th>-->
            <th>Foto1</th>
            <th>Foto2</th>
            <th>Foto3</th>
        </tr>
        </thead>
        <tbody id="projects-admin-list-body">
        <?php while ($r = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td class="btn-group">
                    <a href="./project-form.php?id=<?= $r['id'] ?>" class="btn btn-primary">
                        <span class="fas fa-pen" aria-hidden="true"></span>
                    </a>
                    <!-- href="./project-save.php?id=<?= $r['id'] ?>&action=delete"  -->
                    <a class="btn btn-danger" onclick="deleteProject(<?= $r['id'] ?>)">
                        <span class="fas fa-trash" aria-hidden="true"></span>
                    </a>
                </td>
                <td><?= $r['titulo'] ?></td>
                <!--<td><?= $r['descripcion'] ?></td>-->
                <td><?= $r['tecnologia'] ?></td>
                <td><?= $r['fecha_inicio'] ?></td>
                <td><?= $r['fecha_fin'] ?></td>
                <!--<td><?= $r['finalizado'] ?></td>-->
                <td>
                    <img src="<?= $r['foto1'] ?>" alt="Foto-1" class="img-thumbnail" style="max-width: 86px"/>
                </td>
                <td>
                    <img src="<?= $r['foto2'] ?>" alt="Foto-2" class="img-thumbnail" style="max-width: 86px"/>
                </td>
                <td>
                    <img src="<?= $r['foto3'] ?>" alt="Foto-3" class="img-thumbnail" style="max-width: 86px"/>
                </td>

            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php include_once('./footer.php'); ?>

<script type="text/javascript">
    function deleteProject(id) {
        bootbox.confirm("Esta acción eliminara el proyecto indicado, ¿esta seguro?", function (result) {
            if (result) {
                window.location.href = "./project-save.php?id=" + id + "&action=delete";
            }
        });
    }

    $(document).ready(function () {
        $('#projects-table').DataTable();
    });


</script>