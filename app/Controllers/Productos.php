<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductoModel;

class Productos extends BaseController{

    public function listar(): string{
        $productoModel = new ProductoModel();
        $result = $productoModel->findAll();
        
        $data = ['titulo' => "productos", 'productos' => $result];
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/productos/listar').view('plantillas/footer_view');
    }

    public function agregar(): string{
        $data = ['titulo' => "agregar"];
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/productos/agregar').view('plantillas/footer_view');
    }

    public function registrar_nuevo(): string{
        
        print_r($_POST);

        if(isset($_POST['']))
        
        return "asdad";
    }

}