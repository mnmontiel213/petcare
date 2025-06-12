<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;

class Productos extends BaseController{

    public function listar(){
        $productoModel = new ProductoModel();
        $categoriaModel = new CategoriaModel();
        
        $mascota = $this->request->getGet('eleccion-mascota');
        $producto = $this->request->getGet('eleccion-producto');

        #recibimos parametros para filtrar mascotas?
        if($mascota){
            #echo 'mascota filtro: ', $mascota;
        }

        #recibimos parametros para filtrar productos?        
        if($producto){
            #echo 'producto filtro: ', $producto;
        }        

        # recibimos todos los tipos de productos y mascotas disponibles
        # MASCOTA  -> perro, gato...
        # PRODUCTO -> alimento, jueguetes...
        # en la base de datos se veria asi:
        # id | TIPO    | VALOR
        # 1  | MASCOTA | PERRO
        $result_categoria_mascota = $categoriaModel->where('TIPO', 'MASCOTA')->findAll();
        $result_categoria_producto = $categoriaModel->where('TIPO', 'PRODUCTO')->findAll();        

        # arrays UNICAMENTE con los valores de la tabla
        # [PERRO, GATO...]
        $mascotas_disponibles  = [];
        $productos_disponibles = [];

        # llegados a esto, esto deberia de ser obvio...
        foreach($result_categoria_mascota as $q){
            array_push($mascotas_disponibles, $q['VALOR']);
        }

        foreach($result_categoria_producto as $q){
            array_push($productos_disponibles, $q['VALOR']);
        }

        # mostrar cada cosa...solo para comprobar esto deberia de estar comentado normalmente

        // foreach($productos_disponibles as $q){
        //     echo $q;
        //     echo '<br>';
        // }
        // echo '<br>';
        // foreach($mascotas_disponibles as $q){
        //     echo $q;
        //     echo '<br>';
        // }

        
        $result = $productoModel->findAll();
        $categorias = ['productos' => $productos_disponibles, 'mascotas' => $mascotas_disponibles];
        
        /*
        $tipo_producto = 'ALIMENTO';
        $tipo_mascota  = 'GATO';
        
        

        
        //$result = $productoModel->where('VALOR', 'GATO')->findAll();

        echo 'todas las categorias';
        echo '<br>';        
        foreach($CategoriaModel->findAll() as $c){
            print_r($c);
            echo '<br>';
        }


        //el tipo de producto
        $producto_id = $categoriaModel()->where('VALOR', $tipo_producto)->first();

        //el tipo de mascota
        $mascota_id  = $cateogiraModel()->where('VALOR', $tipo_mascota)->first(); 
        
        //where TIPO_PRODUCTO == ALIMENTO && TIPO_MASCOTA == GATO
        $productos = $productoModel()->where('TIPO', $producto_id['CATEGORIA_ID'])->andWhere('MASCOTA', $mascota_id['CATEGORIA_ID'])->findAll();
        
        //return 'productos';
        */
        
        $data = ['titulo' => "productos", 'productos' => $result, 'categorias' => $categorias];
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
