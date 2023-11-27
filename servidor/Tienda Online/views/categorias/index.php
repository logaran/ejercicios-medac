<h1>Gestionar categorías</h1>
<a href="<?=base_url?>/categorias/crear" class="button button-small">Crear Categoría</a>
<table border="1">
    <tr>
        <th>Id</th>
        <th>Nombre</th>
    </tr>
    <?php while ($cat = $categorias->fetch_object()) : ?>
        <tr>
            <td><?= $cat->id ?></td>
            <td><?= $cat->nombre ?></td>
        </tr>
    <?php endwhile; ?>
</table>