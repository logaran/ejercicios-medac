<?php

require_once './models/categoria.php';

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
}
