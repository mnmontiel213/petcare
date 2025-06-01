<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Models\ProductoModel;

class Productos extends BaseController{

    /*
        tenemos que tomar un producto en base a su tipo de producto y la mascota a la que va diriguida

        Producto tiene como columnas a:
        TIPO-MASCOTA
        TIPO-PRODUCTO
        por ende para filtrar correctarmente segun los parametros recibidos deberiamos pedir algo tipo
        $productoModel->where('TIPO-MASCOTA', id_tipo_mascota)->where('TIPO-PRODUCTO, id_tipo_producto)

        donde id_tipo_mascota y id_tipo_producto son valores en otra base de datos donde se almacenan registros de la forma
        REGIRSTRO_ID | VALOR    | TIPO       |
        0            | GATO     | MASCOTA    |
        1            | PERRO    | MASCOTA    |
        2            | ALIMENTO | PRODUCTO   |
        ...
        */
    public function listar(): string{
        $mascota = $this->request->getGet('eleccion-mascota');
        $producto = $this->request->getGet('eleccion-producto');
        
        $productoModel = new ProductoModel();
        if($mascota != null){
            $productoModel->where('MASCOTA', $mascota);
        }

        if($producto != null){
            $productoModel->where('TIPO', $producto);
        }

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
        
        return "asdad";
    }

}