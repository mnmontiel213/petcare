<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;
use CodeIgniter\HTTP\RedirectResponse;

class Productos extends BaseController{

    public function listar(){
        $carrito = \Config\Services::Cart();
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
                 'categorias' => $categorias,
                'carrito' => $carrito->contents()];
        
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
                'nombre' => 'required|min_length[5]|max_length[32]',
                'codigo' => 'required|min_length[12]|max_length[24]',
                'marca'  => 'required',
                'peso'   => 'required',
                'precio' => 'required',
                'categoria' => 'required',
                'mascota' => 'required',
                'stock' => 'required',
                'imagen' => 'is_image[imagen]',
            ],
            [
                'nombre' =>[
                    'required' => 'Ingrese un nombre',
                    'min_length' => 'El nombre es muy corto',
                    'max_length' => 'El nombre es demasiado largo',
                ],
                'codigo' => [
                    'required' => 'Ingrese el codigo del producto',
                    'min_length' => 'El nombre es muy corto',
                    'max_length' => 'El nombre es demasiado largo',
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
                'stock' => [
                    'required' => 'Ingrese el stock del producto'
                ],
                'peso' =>[
                    'required' => 'Ingrese el peso'
                ],
                'precio' =>[
                    'required' => 'Ingrese el precio'
                ],
                'imagen' =>[
                    'uploaded' => 'Es necesario una imagen para el producto',
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
                'STOCK ' => $this->request->getPost('stock'),
                'HABILITADO' => 1,
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

    public function formulario_modificar(): string {
        $categorias = [];
        $categoriaModel = new CategoriaModel();
        $productoModel = new ProductoModel();
        
        # MARCAS DISPONIBLES
        $marcas = $categoriaModel->where('TIPO', 'MARCA')->findAll();

        # TIPOS DE PRODUCTO DISPONIBLES
        $productos = $categoriaModel->where('TIPO', 'PRODUCTO')->findAll();
        
        # TIPOS DE MASCOTAS DISPONIBLES
        $mascotas = $categoriaModel->where('TIPO', 'MASCOTA')->findAll();

        $categorias['marcas'] = $marcas;
        $categorias['productos'] = $productos;
        $categorias['mascotas'] = $mascotas;
        
        //DATOS DEL PRODUCTO A MODIFICAR
        $producto = $productoModel->find($_GET['codigo']);

        $data = ['titulo' => "Modificar",
                'validation' => null,
                'success' => null,
                'categorias' => $categorias,
                'producto' => $producto];

        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/productos/modificar')
            .view('plantillas/footer_view');
    }

    public function modificar(): string | RedirectResponse{
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $response = \Config\Services::response();

        $validation->setRules(
            [
                'nombre' => 'required|min_length[5]|max_length[32]',
                'codigo' => 'required|min_length[12]|max_length[24]',
                'marca'  => 'required',
                'peso'   => 'required',
                'precio' => 'required',
                'categoria' => 'required',
                'mascota' => 'required',
                'stock' => 'required',
                'imagen' => 'is_image[imagen]',
            ],
            [
                'nombre' =>[
                    'required' => 'Ingrese un nombre',
                    'min_length' => 'El nombre es muy corto',
                    'max_length' => 'El nombre es demasiado largo',
                ],
                'codigo' => [
                    'required' => 'Ingrese el codigo del producto',
                    'min_length' => 'El codigo es muy corto',
                    'max_length' => 'El codigo es demasiado largo',
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
                'stock' => [
                    'required' => 'Ingrese el stock del producto'
                ],
                'peso' =>[
                    'required' => 'Ingrese el peso'
                ],
                'precio' =>[
                    'required' => 'Ingrese el precio'
                ],
                'imagen' =>[
                    'is_image' => 'El archivo adjunto no es una imagen',
                ]
            ]);

        if($validation->withRequest($request)->run()){
            $img = $this->request->getFile("imagen");
            $nombre_aleatorio = '';
            if($img->isValid()){
                $nombre_aleatorio = $img->getRandomName();
                $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);
            }

            $model = new ProductoModel();

            $datos = [
                'CODIGO' => $this->request->getPost('codigo'),
                'NOMBRE' => $this->request->getPost('nombre'),
                'PRECIO' => $this->request->getPost('precio'),
                'PESO' => $this->request->getPost('peso'),
                'CATEGORIA_PRODUCTO' => $this->request->getPost('categoria'),
                'CATEGORIA_MASCOTA' => $this->request->getPost('mascota'),
                'CATEGORIA_MARCA' => $this->request->getPost('marca'),
                'STOCK' => $this->request->getPost('stock'),
            ];
            
            $model->update($this->request->getPost('codigo'), $datos);

            $data['titulo'] = "Agregar";
            $data['validation'] = null;
            $data['success'] = 'Se modifico un producto correctamente';
            
            return redirect()->to('productos');
        }else{
            // ERROR DE VALIDACION
            $data['titulo'] = 'Modificar';
            $data['validation'] = $validation->getErrors();
            $data['success'] = [];

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

             //DATOS DEL PRODUCTO A MODIFICAR
            $productoModel = new ProductoModel();
            $producto = $productoModel->where('CODIGO', ($request->getPost('codigo')))->findAll();

            $data['producto'] = $producto[0];

            $data['categorias'] = [
                'productos' => $productos, 
                'marcas' => $marcas, 
                'mascotas' => $mascotas];

            return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/productos/modificar')
            .view('plantillas/footer_view');            
        }
    }

    public function deshabilitar(){

        $productoModel = new ProductoModel();
        $producto = $productoModel->where('CODIGO', $this->request->getGet('codigo'))->first();

        $producto['HABILITADO'] = 0;
        
        $productoModel->save($producto);

        return redirect()->to('productos');
    }

    public function habilitar(){

        $productoModel = new ProductoModel();
        $producto = $productoModel->where('CODIGO', $this->request->getGet('codigo'))->first();

        $producto['HABILITADO'] = 1;
        
        $productoModel->save($producto);

        return redirect()->to('productos');
    }
}
