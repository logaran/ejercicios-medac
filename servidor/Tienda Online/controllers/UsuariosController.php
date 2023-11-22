<?php
require_once('./models/usuario.php');
class usuariosController
{
    public function index()
    {
        echo "Controlador Usuario,Acción Index";
    }

    public function registro()
    {
        require_once "./views/usuarios/registro.php";
    }
    public function save()
    {
        if (isset($_POST)) {
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellidos($_POST['apellidos']);
            $usuario->setPassword($_POST['password']);
            $usuario->setEmail($_POST['email']);
            $save = $usuario->save();
            echo $save ? 'Registro completado' : 'Registro fallido';
        }
    }
}
