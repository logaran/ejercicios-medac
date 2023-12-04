<?php

class Utils{

    public static function isAdmin(){
        if (!isset($_SESSION["admin"])) {
            header("Location: " . base_url);
        } else {
            return true;
        }
    }

    public static function isLoged(){
        if (!isset($_SESSION["identity"])) {
            header("Location: " . base_url);
        } else {
            return true;
        }
    }

    public static function showCategorias(){
        require_once("./models/categoria.php");
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }    

    public static function statsCarrito(){  
        $stats = array(
            'count' => 0,
            'total'=> 0,
        );

        if (isset($_SESSION["carrito"])) {
            $stats["count"] = count($_SESSION["carrito"]);

            foreach ($_SESSION["carrito"] as $index => $producto) {
                $stats["total"] += $producto["precio"] * $producto["unidades"];
            }
        }
        return $stats;
    }

    public static function showEstado($estado){
        $estados = array(
            "confirmado"=> "Confirmado",
            "preparation"=> "En preparación",
            "ready"=> "Listo para enviar",
            "sended"=> "Enviado",
        ) ;
        return $estados[$estado];
    }
}