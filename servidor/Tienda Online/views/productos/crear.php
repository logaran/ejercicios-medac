<h1>Crear producto</h1>
<form action="<?= base_url ?>/productos/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" required>

    <label for="descripcion">Descripción</label>
    <textarea type="text" name="descripcion" id="descripcion" required rows="8"></textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" id="precio" pattern="[\d]+\.?[\d]{1,2}" required>

    <label for="stock">Cantidad</label>
    <input type="number" name="stock" id="stock" required>

    <label for="categoria">Categoria</label>
    <?php $categorias = Utils::showCategorias(); ?>
    <select name="categoria_id" id="categoria_id">
        <?php while ($cat = $categorias->fetch_object()) : ?>
            <option value="<?=$cat->id?>"><?= $cat->nombre ?></option>
        <?php endwhile; ?>
    </select>

    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" id="imagen" required>

    <input type="submit" value="Guardar">
</form>