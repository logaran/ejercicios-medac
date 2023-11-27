<h1>Crear Categoría</h1>
<form action="<?= base_url ?>/categorias/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" required>
    <input type="submit" value="Guardar">
</form>