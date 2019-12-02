<?php include_once('./header.php'); ?>
<?php require_once('./backend/conexion.php'); ?>
<?php
$sql = "select * from proyectos WHERE 1=1 ORDER BY finalizado DESC LIMIT 7";
$res = mysqli_query($link, $sql);

$pos = 0;
?>
<div id="projects-admin-list" class="jumbotron">
    <h1>Casos de Exito</h1>
    <?php while ($r = mysqli_fetch_assoc($res)): ?>
        <hr>
        <h3><?= $r['titulo'] ?></h3>
        <p><?= $r['descripcion'] ?></p>
        <p>Periodo: <?= $r['fecha_inicio'] ?> - <?= $r['fecha_fin'] ?></p>
        <p>Tecnologias: <?= $r['tecnologia'] ?></p>
        <div class="row">
            <div class="cols-4">
                <img src="<?= $r['foto1'] ?>" alt="Foto-1" class="img-thumbnail" style="max-width: 256px"/>
            </div>
            <div class="cols-4">
                <img src="<?= $r['foto2'] ?>" alt="Foto-2" class="img-thumbnail" style="max-width: 256px"/>
            </div>
            <div class="cols-4">
                <img src="<?= $r['foto3'] ?>" alt="Foto-3" class="img-thumbnail" style="max-width: 256px"/>
            </div>
        </div>
        <?php if ($pos % 2): ?>
        <?php endif; ?>
        <?php $pos++; ?>

    <?php endwhile; ?>
</div>
<?php include_once('./footer.php'); ?>
