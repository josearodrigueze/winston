<?php
require_once('./backend/conexion.php');

$sql = "
select DISTINCT p.id, p.nombre, p.imagen
    from productos p
      JOIN product_category pc on p.id = pc.id_prod AND p.status IN (1)
      JOIN categorias c on pc.id_cat = c.id AND c.active = 1 AND p.id_tienda = c.id_tienda
      # JOIN (
      #   select c2.lft, c2.rgt, c2.type, c2.id_tienda from categorias c2 where c2.id = 651268
      # ) cat ON c.id_tienda = cat.id_tienda AND c.lft >= cat.lft AND c.rgt <= cat.rgt AND c.type = cat.type
";
$res = mysqli_query($link, $sql);
?>

<table class="table table-striped" id="projects-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Foto3</th>
        </tr>
        </thead>
        <tbody id="projects-admin-list-body">
        <?php while ($r = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?= $r['id'] ?></td>
                <td>
                    <img src="<?= $r['imagen'] ?>" alt="Foto-3" class="img-thumbnail" style="max-width: 86px"/>
                </td>
                <td><?= $r['nombre'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>