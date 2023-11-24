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
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : false;
            $apellidos = isset($_POST["apellidos"]) ? $_POST["apellidos"] : false;
            $email = isset($_POST["email"]) ? $_POST["email"] : false;
            $password = isset($_POST["password"]) ? $_POST["password"] : false;
            /* TODO: Pendiente de hacer la validacion de datos */

            if ($nombre && $apellidos && $email && $password) {
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setPassword($password);
                $usuario->setEmail($email);
                $save = $usuario->save();

                if ($save) {
                    $_SESSION['register'] = "registrado";
                } else {
                    $_SESSION['register'] = "fallido";
                }
            } else {
                $_SESSION['register'] = "fallido";
            }
        } else {
            $_SESSION['register'] = "Registro fallido";
            echo 'Registro fallido';
        }
        header('Location:' . base_url . 'usuarios/registro');
    }

    public function login()
    {
        if (isset($_POST)) {
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $identity = $usuario->login();

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;

                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = 'Identificacion fallida';
            }

            header('Location:' . base_url);
        }
    }

    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        header('Location:' . base_url);
    }
}
