<h1>Gestion de productos</h1>
<a href="<?= base_url ?>/productos/crear" class="button button-small">Crear Producto</a>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') : ?>
    <strong class="alert_success">Producto guardado correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete') : ?>
    <strong class="alert_fail">Ha habido un error en la creación del producto</strong>
<?php endif; ?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
    <strong class="alert_success">Producto eliminado con éxito</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'failed') : ?>
    <strong class="alert_fail">Ha habido un error al eliminar el producto</strong>
<?php endif; ?>

<?php unset($_SESSION['producto'])?>
<?php unset($_SESSION['delete'])?>
<table border="1">
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>
    <?php while ($prod = $productos->fetch_object()) : ?>
        <tr>
            <td><?= $prod->id ?></td>
            <td><?= $prod->nombre ?></td>
            <td><?= $prod->precio ?></td>
            <td><?= $prod->stock ?></td>
            <td>
                <a href="<?=base_url?>productos/editar&id=<?=$prod->id?>" class="button button-gestion button-edit">Editar</a>
                <a href="<?=base_url?>productos/eliminar&id=<?=$prod->id?>" class="button button-gestion">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>