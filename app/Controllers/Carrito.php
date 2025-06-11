<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Codeigniter\HTTP\RedirectResponse;
use Codeigniter\HTTP\ResponseInterface;

class Carrito extends BaseController{
    
    public function carrito(): string {
        $carrito = \Config\Services::cart();
        
        #$carrito->totalitems();
        #$carrito->remove('rowid');
        #$carrito->destroy();
        #$carrito->contents();

        $productos = $carrito->contents();

        $data = ['titulo' => 'carrito', 'productos' => $productos];
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/carrito/carrito')
            .view('plantillas/footer_view');        
    }

    public function agregar_producto(){
        $request = \Config\Services::request();
        $carrito = \Config\Services::cart();
        
        $producto = [
            'id' =>  $carrito->totalitems(),
            'name' => $request->getPost('nombre'),
            'price' => $request->getPost('precio'),
            'qty' => 1,
            'codigo' => $request->getPost('codigo'),
            'img' => '',
        ];
        
        $carrito->insert($producto);
        
        return redirect()->route('carrito');
    }

    public function actualizar(){
        $request = \Config\Services::request();
        $carrito = \Config\Services::cart();

        $accion = $request->getPost('carrito-accion');

        echo $request->getPost('rowid');
        echo $request->getPost('name');
        echo $request->getPost('codigo');
        echo $request->getPost('price');
        
        if($accion){
            if($accion === 'limpiar'){
                // DESACERSE DE TODO EL CARRITO
                $carrito->destroy();
                echo 'limpiar';
            }else if($accion === 'quitar'){
                // QUITAR UNA UNIDAD DEL PRODUCTO EN EL CARRITO
                echo 'quitar';
            }else if($accion === 'agregar'){
                // AGREGAR UNA UNIDAD DEL PRODUCTO EN EL CARRITO
                echo 'agregar';                
            }else if($accion === 'remover'){
                // REMOVER COMPLETAMENTE EL PRODUCTO DEL CARRITO                
                echo 'remover';
            }
        }
    }
}
