<h1>Gestion de productos</h1>
<a href="<?= base_url ?>/productos/crear" class="button button-small">Crear Producto</a>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') : ?>
    <strong class="alert_success">El producto se ha añadido correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete') : ?>
    <strong class="alert_fail">Ha habido un error en la creación del producto</strong>
<?php endif; ?>

<?php unset($_SESSION['producto'])?>
<table border="1">
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
    </tr>
    <?php while ($prod = $productos->fetch_object()) : ?>
        <tr>
            <td><?= $prod->id ?></td>
            <td><?= $prod->nombre ?></td>
            <td><?= $prod->precio ?></td>
            <td><?= $prod->stock ?></td>
        </tr>
    <?php endwhile; ?>
</table>