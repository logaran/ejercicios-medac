    <h1>Registro</h1>
    <form action="<?=base_url?>usuarios/save" method="post">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos" required>

        <label for="registro_password">Contraseña</label>
        <input type="password" name="password" id="registro_password" required>
        
        <label for="registro_email">Email</label>
        <input type="email" name="email" id="registro_email" required>

        <input type="submit" value="Registrarse">
    
    </form>
