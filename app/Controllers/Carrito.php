<?php

namespace App\Controllers;


use App\Models\UsuarioModel;
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

        $total = 0;
        foreach($productos as $p){
            $total += $p['price'] * $p['qty'];
        }

        $data = ['titulo' => 'carrito', 'productos' => $productos, 'total' => $total, 'compra_finalizada' => false];
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
            'imagen' => $request->getPost('imagen'),
        ];
        
        $carrito->insert($producto);
        
        return redirect()->route('carrito');
    }

    public function actualizar(){
        helper('url');

        $request = \Config\Services::request();
        $carrito = \Config\Services::cart();

        $accion = $request->getPost('carrito-accion');

        if($accion){
            if($accion === 'limpiar'){
                // DESACERSE DE TODO EL CARRITO
                $carrito->destroy();
                echo 'limpiar';
            }else if($accion === 'remover'){
                // QUITAR UNA UNIDAD DEL PRODUCTO EN EL CARRITO
                if((float)$request->getPost('qty') > 1){
                    $producto = [
                        'rowid' => $request->getPost('rowid'),
                        'price' => $request->getPost('price'),
                        'name' => $request->getPost('name'),
                        'codigo' => $request->getPost('codigo'),
                        'qty' => ((float)$request->getPost('qty')) - 1,
                    ];
                    
                    $carrito->update($producto);                    
                }
            }else if($accion === 'agregar'){
                // AGREGAR UNA UNIDAD DEL PRODUCTO EN EL CARRITO
                $producto = [
                    'rowid' => $request->getPost('rowid'),
                    'price' => $request->getPost('price'),
                    'name' => $request->getPost('name'),
                    'codigo' => $request->getPost('codigo'),
                    'qty' => ((float)$request->getPost('qty')) + 1,
                ];

                $carrito->update($producto);                    
            }else if($accion === 'quitar'){
                // REMOVER COMPLETAMENTE EL PRODUCTO DEL CARRITO
                $carrito->remove($request->getPost('rowid'));
            }
        }

        return redirect()->route('productos');
    }

    public function pagar(){
        $carrito = \Config\Services::cart();
        $session = session();
        $usuarioModel = new UsuarioModel();

        $user_data = $usuarioModel->find($session->get('USUARIO_ID'));
        
        if($user_data['CBU']){
            $carrito->destroy();

            $data = ['titulo' => 'carrito', 'productos' => [], 'total' => 0, 'compra_finalizada' => true];
            return view('plantillas/header_view', $data)
                    .view('plantillas/navbar_view')
                    .view('contenido/carrito/carrito')
                    .view('plantillas/footer_view'); 
        }else{
            $data = ['titulo' => 'Completar cuenta', 'validation' => []];
            return view('plantillas/header_view', $data)
                .view('plantillas/navbar_view')
                .view('contenido/login/cuenta_completar')
                .view('plantillas/footer_view'); 
        }
    }
}