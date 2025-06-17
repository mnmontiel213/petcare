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
        
        #---------------------------#
        #                           #
        # FORMULARIO PARA EL FILTRO #
        #                           #
        #---------------------------#

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
        
        $categorias = ['productos' => $productos_disponibles, 'mascotas' => $mascotas_disponibles];

        #-----------------------------------------#
        #                                         #
        # ARRAY CON TODOS LOS PRODUCTOS FILTRADOS #
        #                                         #
        #-----------------------------------------#        

        //el tipo de producto
        if($mascota){
            $mascota_id = $categoriaModel->where('VALOR', $mascota)->first();
            $productoModel->where('CATEGORIA_MASCOTA', $mascota_id['CATEGORIA_ID']);
        }
        
        if($producto){
            //se recibio filtro por producto
            $producto_id = $categoriaModel->where('VALOR', $producto)->first();
            $productoModel->where('CATEGORIA_PRODUCTO', $producto_id['CATEGORIA_ID']);
        }

        $result = $productoModel->findAll();
        
        $data = ['titulo' => "productos",
                 'productos' => $result,
                 'categorias' => $categorias];
        
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/productos/listar')
            .view('plantillas/footer_view');
    }
    
    public function agregar(): string{
        $categorias = [];
        
        $categoriaModel = new CategoriaModel();
        
        # MARCAS DISPONIBLES
        $marcas = $categoriaModel->where('TIPO', 'MARCA')->findAll();

        # TIPOS DE PRODUCTO DISPONIBLES
        $productos = $categoriaModel->where('TIPO', 'PRODUCTO')->findAll();
        
        # TIPOS DE MASCOTAS DISPONIBLES
        $mascotas = $categoriaModel->where('TIPO', 'MASCOTA')->findAll();

        $categorias['marcas'] = $marcas;
        $categorias['productos'] = $productos;
        $categorias['mascotas'] = $mascotas;
        
        $data = ['titulo' => "Agregar",
                 'validation' => null,
                 'success' => null,
                 'categorias' => $categorias];

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

            $datos = [
                'CODIGO' => $this->request->getPost('codigo'),
                'NOMBRE' => $this->request->getPost('nombre'),
                'PRECIO' => $this->request->getPost('precio'),
                'PESO' => $this->request->getPost('peso'),
                'CATEGORIA_PRODUCTO' => $this->request->getPost('categoria'),
                'CATEGORIA_MASCOTA' => $this->request->getPost('mascota'),
                'CATEGORIA_MARCA' => $this->request->getPost('marca'),
                'IMAGEN' => $nombre_aleatorio,
            ];

            $model->save($datos);

            $data['titulo'] = "Agregar";
            $data['validation'] = null;
            $data['success'] = 'Se agregó un nuevo producto correctamente';
            
            return redirect()->to('productos/agregar');
        }else{
            // ERROR DE VALIDACION
            $data['titulo'] = 'Agregar';
            $data['validation'] = $validation->getErrors();
            $data['success'] = null;

            $categorias = [];
        
            $categoriaModel = new CategoriaModel();
        
            # MARCAS DISPONIBLES
            $marcas = $categoriaModel->where('TIPO', 'MARCA')->findAll();

            # TIPOS DE PRODUCTO DISPONIBLES
            $productos = $categoriaModel->where('TIPO', 'PRODUCTO')->findAll();
        
            # TIPOS DE MASCOTAS DISPONIBLES
            $mascotas = $categoriaModel->where('TIPO', 'MASCOTA')->findAll();

            $categorias['marcas'] = $marcas;
            $categorias['productos'] = $productos;
            $categorias['mascotas'] = $mascotas;

            $data['categorias'] = ['productos' => $productos, 'marcas' => $marcas, 'mascotas' => $mascotas];

            return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/productos/agregar')
            .view('plantillas/footer_view');            
        }
    }

}
