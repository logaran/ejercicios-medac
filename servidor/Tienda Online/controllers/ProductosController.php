<?php
require_once './models/producto.php';
class productosController
{
    public function index()
    {
        require_once("./views/productos/destacados.php");
    }
    public function gestion()
    {
        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto->getAll();

        require_once("./views/productos/gestion.php");
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once './views/productos/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria_id = isset($_POST['categoria_id']) ? $_POST['categoria_id'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if ($nombre && $descripcion && $precio && $stock && $categoria_id) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria_id);

                $save = $producto->save();

                if ($save) {
                    $_SESSION['producto'] = "complete";
                } else {
                    $_SESSION["producto"] = "failed";
                }
            } else {
                $_SESSION["producto"] = "failed";
            }
            header('Location:' . base_url . 'productos/gestion');
        }
    }
}
