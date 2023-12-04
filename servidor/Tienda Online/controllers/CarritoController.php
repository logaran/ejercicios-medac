<?php
require_once './models/producto.php';
class CarritoController
{
    public function index()
    {
        $carrito = isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0 ? $_SESSION['carrito'] : null;
        require_once './views/carrito/index.php';
    }

    public function add()
    {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            header('Location:' . base_url);
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }
        if (!isset($counter) || $counter == 0) {

            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
    public function remove()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            if (isset($_SESSION['carrito'][$index])) {
                unset($_SESSION['carrito'][$index]);
            }
        }

        header('Location: ' . base_url . 'carrito/index');
    }
    public function delete()
    {
    }
    public function delete_all()
    {
        unset($_SESSION["carrito"]);
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
