<?php
require_once './models/pedido.php';
class PedidosController
{
    public function hacer()
    {
        require_once './views/pedidos/hacer.php';
    }


    public function add()
    {
        if (isset($_SESSION['identity'])) {
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $usuario_id = $_SESSION['identity']->id;
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            //Guardamos en base de datos
            if ($provincia && $localidad && $direccion) {
                $pedido = new Pedido();
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setUsuario_id($usuario_id);
                $pedido->setCoste($coste);

                $saved = $pedido->save();

                $saved_linea = $pedido->saveLinea();

                if ($saved && $saved_linea) {
                    $_SESSION['pedido'] = "complete";
                } else {
                    $_SESSION['pedido'] = "failed";
                }
            } else {
                $_SESSION['pedido'] = "failed";
            }

            header('Location: ' . base_url . 'pedidos/confirmado');
        } else {
            header('Location: ' . base_url);
        }
    }

    public function confirmado()
    {
        if (isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($identity->id);

            $pedido = $pedido->getOneByUser();
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido->id);
        }
        require_once 'views/pedidos/confirmado.php';
    }

    public function misPedidos()
    {
        Utils::isLoged();
        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();
        $pedido->setUsuario_id($usuario_id);
        $pedidos = $pedido->getByUser();
        require_once 'views/pedidos/mis_pedidos.php';
    }

    public function detalle()
    {
        Utils::isLoged();
        if (isset($_GET['pedido'])) {
            $pedido_id = $_GET['pedido'];
            $pedido = new Pedido();
            $pedido->setId($pedido_id);
            $pedido = $pedido->getOne();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido_id);

            require_once 'views/pedidos/detalle.php';
        } else {
            header('Location: ' . base_url . 'pedidos/mis_pedidos');
        }
    }

    public function gestion(){
        Utils::isAdmin();
        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/pedidos/mis_pedidos.php';
    }

    public function estado() {
        Utils::isAdmin();
        if (isset($_POST['pedido_id']) && isset($_POST['estado'])) {
            $pedido_id = $_POST['pedido_id'];
            $estado = $_POST['estado'];
            $pedido = new Pedido();
            $pedido->setId($pedido_id);
            $pedido->setEstado($estado);
            $pedido->updateOne();
            header('Location: '. base_url . 'pedidos/detalle&pedido=' . $pedido_id );        
        } else {
            header('Location: '. base_url);
        }
    }
}
