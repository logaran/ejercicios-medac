<?php

require_once './models/categoria.php';

class categoriasController {
    public function index() {
        $categorias = new Categoria();
        $categorias = $categorias->getAll();
        require_once'./views/categorias/index.php';
    }
}