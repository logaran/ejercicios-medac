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
                <td>
                    <a class="plus" href="<?=base_url?>carrito/down&index=<?=$indice?>">-</a>
                    <?= $producto['unidades'] ?>
                    <a class="minus" href="<?=base_url?>carrito/up&index=<?=$indice?>">+</a>
                </td>
                <td><a href="<?=base_url?>carrito/remove&index=<?=$indice?>">X</a></td>
                
            </tr>
        <?php endforeach; ?>
    </table>

    <br />

    <div class="total-carrito">
        <?php $stats = Utils::statsCarrito(); ?>
        <h3>Precio Total: <?= $stats['total'] ?>€</h3>
        <a href="<?= base_url ?>pedidos/hacer" class="button button-edit">Hacer pedido</a>
        <a href="<?= base_url ?>carrito/delete_all" class="button">Vaciar Carrito</a>
    </div>
<?php endif; ?>