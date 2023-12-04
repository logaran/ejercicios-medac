<?php if (isset($gestion)) : ?>
    <h1>Gestionar pedidos</h1>
<?php else : ?>
    <h1>Mis pedidos</h1>
<?php endif; ?>

<table>
    <tr>
        <th>Numero</th>
        <th>Fecha</th>
        <th>Total</th>
        <th>Estado</th>
    </tr>
    <?php while ($pedido = $pedidos->fetch_object()) : ?>
        <tr>
            <td><a href="<?= base_url ?>pedidos/detalle&pedido=<?= $pedido->id ?>"><?= $pedido->id ?></a></td>
            <td><?= $pedido->fecha ?></td>
            <td><?= $pedido->coste ?> €</td>
            <td><?= Utils::showEstado($pedido->estado) ?></td>
        </tr>

    <?php endwhile; ?>
</table>