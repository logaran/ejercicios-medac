<?php

class Utils{

    public static function isAdmin(){
        if (!isset($_SESSION["admin"])) {
            header("Location: base".base_url);
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
    
}