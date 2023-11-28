<?php if ($edit && isset($pro) && is_object($pro)) : ?>
    <h1>Editando producto: <?= $pro->nombre ?></h1>
    <?php
    $url_action = base_url . "productos/save&id=" . $pro->id;
    $nombre = $pro->nombre;
    $descripcion = $pro->descripcion;
    $precio = $pro->precio;
    $stock = $pro->stock;
    $categoria = $pro->categoria_id;
    $imagen = $pro->imagen;
    ?>
<?php else : ?>
    <h1>Crear producto</h1>
    <?php
    $url_action = base_url . "productos/save";
    $nombre = null;
    $descripcion = null;
    $precio = null;
    $stock = null;
    $categoria = null;
    $imagen = null;
    ?>
<?php endif; ?>

<form action="<?= $url_action ?>" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" value='<?= $nombre ?>' required>

    <label for="descripcion">Descripción</label>
    <textarea type="text" name="descripcion" id="descripcion" required rows="8"><?= $descripcion ?></textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" id="precio" value="<?= $precio ?>" pattern="[\d]+\.?[\d]{1,2}" required>

    <label for="stock">Cantidad</label>
    <input type="number" name="stock" id="stock" value="<?= $stock ?>" required>

    <label for="categoria">Categoria</label>
    <?php $categorias = Utils::showCategorias(); ?>
    <select name="categoria_id" id="categoria_id">
        <?php while ($cat = $categorias->fetch_object()) : ?>
            <option value="<?= $cat->id ?>" <?= $cat->id == $categoria ? "selected" : "" ?>><?= $cat->nombre ?></option>
        <?php endwhile; ?>
    </select>

    <label for="imagen">Imagen</label>
    <?php if (!is_null($imagen)) : ?>
        <img width= "250px" src="<?=base_url?>uploads/images/<?=$imagen?>" alt="<?=$nombre?>">
    <?php endif; ?>
    <input type="file" name="imagen" id="imagen">

    <input type="submit" value="Guardar">
</form>