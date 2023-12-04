<h1>Detalle del pedido</h1>

<?php if (isset($pedido)) : ?>
    <?php if (isset($_SESSION['admin'])) : ?>
        <h3>Cambiar estado del pedido</h3>
        <form action="<?= base_url ?>pedidos/estado" method="POST">
            <input type="hidden" name="pedido_id" value= "<?=$pedido->id?>">
            <select name="estado" id="estado">
                <option value="confirmado" <?=$pedido->estado == "confirmado" ? 'selected' : null ?> >Confirmado</option>
                <option value="preparation" <?=$pedido->estado == "preparation" ? 'selected' : null ?> >En preparación</option>
                <option value="ready" <?=$pedido->estado == "ready" ? 'selected' : null ?> >Listo para enviar</option>
                <option value="sended" <?=$pedido->estado == "sended" ? 'selected' : null ?> >Enviado</option>
            </select>
            <input type="submit" value="Actualizar">
        </form>
    <?php endif; ?>

    <h3>Datos de su pedido Nº <?= $pedido->id ?> del día <?= $pedido->fecha ?></h3>
    Estado: <?= Utils::showEstado($pedido->estado)?><br>
    Numero de pedido: <?= $pedido->id ?> <br>
    Total a pagar: <?= $pedido->coste ?> €<br>
    Productos:

    <h3>Enviado a:</h3>
    Provincia: <?= $pedido->provincia ?><br>
    Localidad: <?= $pedido->localidad ?><br>
    Dirección: <?= $pedido->direccion ?>

    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php while ($producto = $productos->fetch_object()) : ?>
            <tr>
                <?php $imgCamiseta = ($producto->imagen) ? base_url . "uploads/images/" . $producto->imagen : base_url . "assets/img/camiseta.webp" ?>
                <td><img src="<?= $imgCamiseta ?>" width="70px" /></td>
                <td><a href="<?= base_url ?>productos/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a></td>
                <td><?= $producto->precio ?></td>
                <td><?= $producto->unidades ?></td>
            </tr>
        <?php endwhile; ?>

    </table>
<?php endif; ?>