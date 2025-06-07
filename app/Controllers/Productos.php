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
                'codigo' => 'required',
                'marca'  => 'required',
                'peso'   => 'required',
                'precio' => 'required',
                'categoria' => 'required',
                'mascota' => 'required',
                //'imagen' => 'is_image[imagen]|max_size[imagen, 4096]|ext_in[imagen,jpg,png,jpeg]|uploaded[imagen]',
                'imagen' => 'is_image[imagen]'
            ],
            [
                'nombre' =>[
                    'required' => 'Ingrese un nombre'
                ],
                'codigo' => [
                    'required' => 'Ingrese el codigo del producto'
                ],
                'marca' => [
                    'required' => 'Ingrese la marca del producto'
                ],
                'categoria' => [
                    'required' => 'Ingrese la categoria del producto'
                ],
                'mascota' => [
                    'required' => 'Ingrese la mascota a la que va diriguido el producto'
                ],
                'peso' =>[
                    'required' => 'Ingrese el peso'
                ],
                'precio' =>[
                    'required' => 'Ingrese el precio'
                ],
                'imagen' =>[
                    //'uploaded' => 'Es necesario una imagen para el producto',
                    'is_image' => 'El archivo adjunto no es una imagen',
                    //'max_size' => 'La imagen es muy grande, maximo 4mb',
                    //'ext_in'   => 'La imagen solo puede ser PNG, JPG o JPEG',
                ]
            ]);

        if($validation->withRequest($request)->run()){
            $img = $this->request->getFile("imagen");
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);
            
            $model = new ProductoModel();
            
            $model->save([
                'CODIGO' => $this->request->getPost('codigo'),
                'NOMBRE' => $this->request->getPost('nombre'),
                'PRECIO' => $this->request->getPost('precio'),
                'PESO' => $this->request->getPost('peso'),
                'TIPO' => $this->request->getPost('categoria'),
                'MASCOTA' => $this->request->getPost('mascota'),
                'MARCA' => $this->request->getPost('marca'),
                'IMAGEN' => $nombre_aleatorio,
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
