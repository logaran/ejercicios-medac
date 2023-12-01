<?php

require_once './models/categoria.php';
require_once './models/producto.php';

class categoriasController
{
    public function index()
    {
        $categorias = new Categoria();
        $categorias = $categorias->getAll();
        require_once './views/categorias/index.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once './views/categorias/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST) && isset($_POST['nombre'])) {
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }

        header('Location:' . base_url . "categorias/index");
    }

    public function ver()
    {
        if (isset($_GET['id'])) {
            $categoria = new Categoria();
            $categoria->setId($_GET['id']);
            $cat = $categoria->getOne();

            $producto = new Producto();
            $producto->setCategoria_id($cat->id);
            $productos = $producto->getAllCategory();
        }
        require_once './views/categorias/ver.php';
    }
}
