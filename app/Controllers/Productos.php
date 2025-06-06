<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductoModel;

class Productos extends BaseController{

    public function listar(): string{
        $productoModel = new ProductoModel();
        $result = $productoModel->findAll();
        
        $data = ['titulo' => "productos", 'productos' => $result];
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/productos/listar')
            .view('plantillas/footer_view');
    }
    
    public function agregar(): string{
        $data = ['titulo' => "Agregar",
                 'validation' => null,
                 'success' => null];
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/productos/agregar')
            .view('plantillas/footer_view');
    }

    public function registrar_nuevo(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules(
            [
                'nombre' => 'required',
                'peso'   => 'required',
                'precio' => 'required',
                'categoria' => 'required',
                //'imagen' => 'required',
            ],
            [
                'nombre' =>[
                    'required' => 'Ingrese un nombre'
                ],
                'peso' =>[
                    'required' => 'Ingrese el peso'
                ],
                'precio' =>[
                    'required' => 'Ingrese el precio'
                ],
                'categoria' =>[
                    'required' => 'Ingrese la categoria'
                ],
            ]);

        if($validation->withRequest($request)->run()){
            $model = new ProductoModel();
            
            $model->save([
                'CODIGO' => $this->request->getPost('codigo'),
                'NOMBRE' => $this->request->getPost('nombre'),
                'PRECIO' => $this->request->getPost('precio'),
                'PESO' => $this->request->getPost('peso'),
                'TIPO' => $this->request->getPost('categoria'),
                'MASCOTA' => $this->request->getPost('mascota'),
                'MARCA' => $this->request->getPost('marca'),
            ]);

            $data['titulo'] = "Agregar";
            $data['validation'] = null;
            $data['success'] = 'Se agregó un nuevo producto correctamente';
            
            return redirect()->to('productos/agregar');
        }else{
            // ERROR DE VALIDACION
            $data['titulo'] = 'Agregar';
            $data['validation'] = $validation->getErrors();
            $data['success'] = null;

            return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/productos/agregar')
            .view('plantillas/footer_view');            
        }
    }

}
