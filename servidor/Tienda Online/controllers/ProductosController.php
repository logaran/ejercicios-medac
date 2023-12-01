<?php
require_once './models/producto.php';
class productosController
{
    public function index()
    {
        $producto = new Producto();
        $productos = $producto->getRandom(6);
        
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
        $edit = false;
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

            if ($nombre && $descripcion && $precio && $stock && $categoria_id) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria_id);

                // Guardar la imagen

                if (isset($_FILES['imagen'])) {
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype === 'image/jpg' || $mimetype === 'image/jpeg' || $mimetype === 'image/png' || $mimetype === 'image/gif') {
                        if (!is_dir('./uploads/images')) {
                            mkdir('./uploads/images', 0777, true);
                        }
                        move_uploaded_file($file['tmp_name'], './uploads/images/' . $filename);
                        $producto->setImagen($filename);
                    }
                }

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->edit();
                } else {
                    $save = $producto->save();
                }

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

    public function editar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $edit = true;
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getOne();

            require_once('./views/productos/crear.php');
        } else {
            header('Location: ' . base_url . 'productos/gestion');
        }
    }

    public function eliminar()
    {
        Utils::isAdmin();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $delete = $producto->delete($id);

            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }
        header('Location: ' . base_url . 'productos/gestion');
    }

    public function ver() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $producto = new Producto();
            $producto->setId($id);

            $prod = $producto->getOne();
        } 

        require_once('./views/productos/ver.php');
    }
}
