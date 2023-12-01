<h1>Carrito de la compra</h1>
<?php if (!isset($carrito)) : ?>
    <h2>Su carrito esta vacío</h2>
<?php else : ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php foreach ($carrito as $indice => $producto) : ?>
            <tr>
                <?php $imgCamiseta = ($producto['producto']->imagen) ? base_url . "uploads/images/" . $producto['producto']->imagen : base_url . "assets/img/camiseta.webp" ?>
                <td><img src="<?= $imgCamiseta ?>" width="70px" /></td>
                <td><a href="<?= base_url ?>productos/ver&id=<?= $producto['id_producto'] ?>"><?= $producto['producto']->nombre ?></a></td>
                <td><?= $producto['precio'] ?></td>
                <td><?= $producto['unidades'] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </table>