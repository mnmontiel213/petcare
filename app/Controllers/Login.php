<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\MascotaModel;
use App\Models\ProductoModel;
use App\Models\UsuarioModel;
use App\Models\TurnoModel;
use App\Models\ServicioModel;
use App\Models\VentainfoModel;
use App\Models\VentaModel;


/*
 *
 Logica de los usuarios y sus registros
 *
 */

class Login extends BaseController
{

    /*
     *
     MUESTRA VIEW PARA INGRESO DE USUARIO
     *
     */
    public function login_ingresar()
    {
        $data = ['titulo' => 'Ingresar', 'validation' => [], 'error' => null];
        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/login/entrar')
            . view('plantillas/footer_view');
    }

    /*
     *
     MUESTRA VIEW PARA REGISTRO DE USUARIO
     *
     */
    public function login_registrarse()
    {
        $data = ['titulo' => 'Registrarse', 'validation' => []];
        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/login/registrarse')
            . view('plantillas/footer_view');
    }


    /*
     *
     CREA UN NUEVO USUARIO
     *
     */
    public function crear_usuario()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules(
            [
                'nombre' => 'required',
                'apellido' => 'required',
                'correo' => 'required',
                'contraseña' => 'required',
                'imagen' => 'is_image[imagen]|max_size[imagen, 4096]|ext_in[imagen,jpg,png,jpeg]',
                'confirmacion-contraseña' => 'required',
            ],
            [
                'nombre' =>
                [
                    'required' => 'El nombre es obligatorio'
                ],
                'apellido' =>
                [
                    'required' => 'El apellido es obligatorio'
                ],
                'correo' =>
                [
                    'required' => 'El correo es obligatorio'
                ],
                'contraseña' =>
                [
                    'required' => 'La contraseña es obligatoria'
                ],
                'confirmacion-contraseña' => [
                    'required' => 'Confirme la contraseña'
                ],
                'imagen' => [
                    'is_image' => 'El archivo adjunto no es una imagen',
                    'max_dims'  => 'El archivo es demasiado grande',
                ]
            ]
        );

        if ($validation->withRequest($request)->run()) {
            $img = $this->request->getFile("imagen");
            $nombre_aleatorio = null;

            if ($img->isValid()) {
                $nombre_aleatorio = $img->getRandomName();
                $img->move(ROOTPATH . 'assets/uploads', $nombre_aleatorio);
            }

            $model = new UsuarioModel();
            $pass = password_hash($this->request->getPost('contraseña'), PASSWORD_BCRYPT);

            $model->save([
                'NOMBRE'     => $this->request->getPost('nombre'),
                'APELLIDO'   => $this->request->getPost('apellido'),
                'CORREO'     => $this->request->getPost('correo'),
                'IMAGEN'     => $nombre_aleatorio,
                'CONTRASEÑA' => $pass,
            ]);

            return redirect()->to('login/ingresar');
        } else {

            // ERROR EN VALIDACION
            $data['titulo'] = 'Registarse';
            $data['validation'] = $validation->getErrors();

            return view('plantillas/header_view', $data)
                . view('plantillas/navbar_view')
                . view('contenido/login/registrarse')
                . view('plantillas/footer_view');
        }
    }

    /*
     *
     INGRESA A LA SESION DE UN NUEVO USURIO
     *
     */
    public function ingresar_usuario()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $session = session();

        $email = $this->request->getPost('correo');
        $contraseña = $this->request->getPost('contraseña');

        $validation->setRules(
            [
                'correo' => 'required|valid_email|min_length[10]|max_length[64]',
                'contraseña' => 'required|min_length[5]|max_length[64]',
            ],
            [
                'correo' => [
                    'required' => 'Ingrese un correo',
                    'valid_email' => 'El valor ingresado no es un correo valido',
                    'min_length' => 'El correo es demasiado corto para ser valido',
                    'max_length' => 'El correo es demasiado largo',
                ],
                'contraseña' => [
                    'required' => 'Ingrese la contraseña',
                    'min_length' => 'La contraseña es demasiado corta',
                    'max_length' => 'La contraseña es demasiado larga',
                ],
            ],
        );

        if ($validation->withRequest($request)->run()) {
            $model = new UsuarioModel();
            $user_data = $model->where('CORREO', $email)->first();

            if ($user_data) {
                if (password_verify($contraseña, $user_data['CONTRASEÑA'])) {
                    $session_data = [
                        'USUARIO_ID' => $user_data['USUARIO_ID'],
                        'NOMBRE' => $user_data['NOMBRE'],
                        'APELLIDO' => $user_data['APELLIDO'],
                        'IMAGEN'  => $user_data['IMAGEN'],
                        'CORREO' => $user_data['CORREO'],
                        'CBU' => $user_data['CBU'],
                        'DIRECCION' => $user_data['DIRECCION'],
                        'ES_MAYORISTA' => $user_data['ES_MAYORISTA'],
                        'LOGGED' => TRUE,
                        'ADMIN' => $user_data['USUARIO_ID'] == 1 ? TRUE : FALSE,
                        'HISTORIAL_COMPRA' => $user_data['HISTORIAL_COMPRA'],
                    ];

                    if (
                        $user_data['USUARIO_ID'] == 1 or
                        $user_data['NOMBRE'] == 'admin'
                    ) {
                        $session_data['ADMIN'] = TRUE;
                    }

                    $session->set($session_data);
                    return redirect()->to('perfil');
                } else {
                    // WRONG PASSWORD
                    $data['titulo'] = 'Ingresar';
                    $data['error'] = 'contraseña incorrecta';
                    $data['validation'] = $validation->getErrors();
                    
                    return view('plantillas/header_view', $data)
                        . view('plantillas/navbar_view')
                        . view('contenido/login/entrar')
                        . view('plantillas/footer_view');
                }
            } else {
                // WRONG EMAILs
                $data['titulo'] = 'Ingresar';
                $data['error'] = 'correo desconocido';
                $data['validation'] = $validation->getErrors();

                return view('plantillas/header_view', $data)
                    . view('plantillas/navbar_view')
                    . view('contenido/login/entrar')
                    . view('plantillas/footer_view');
            }
        } else {
            // VALIDATION FAIL
            $data = [
                'titulo' => 'Login',
                'validation' => $validation->getErrors(),
                'error' => null
            ];

            return view('plantillas/header_view', $data)
                . view('plantillas/navbar_view')
                . view('contenido/login/entrar')
                . view('plantillas/footer_view');
        }
    }


    /*
     *
     CIERRA LA SESION DEL USUARIO ACTUAL
     * 
     */
    public function salir_usuario()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    public function registrar_mascota_formulario()
    {
        $categoriaModel = new CategoriaModel();

        $razas = $categoriaModel->where('TIPO', 'MASCOTA')->findAll();

        $data = ['titulo' => 'Registrar mascota', 'razas' => $razas, 'validation' => []];

        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/login/nueva_mascota')
            . view('plantillas/footer_view');
    }

    public function registrar_mascota()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules(
            [
                'nombre' => 'required',
                'mascota' => 'required',
            ],
            [
                'nombre' => [
                    'required' => 'El nombre es obligatorio'
                ],
                'mascota' =>
                [
                    'required' => 'Seleccione el tipo de mascota'
                ],
            ]
        );

        if ($validation->withRequest($request)->run()) {
            $model = new MascotaModel();
            $session = session();

            $model->save([
                'USUARIO_ID' => $session->get('USUARIO_ID'),
                'NOMBRE'     => $this->request->getPost('nombre'),
                'TIPO_MASCOTA'   => $this->request->getPost('mascota'),
            ]);

            return redirect()->to('registrar/mascota');
        } else {
            $categoriaModel = new CategoriaModel();
            $razas = $categoriaModel->where('TIPO', 'MASCOTA')->findAll();

            $data = [
                'titulo' => 'Registrar mascota',
                'validation' => $validation->getErrors(),
                'razas' => $razas,
            ];

            return view('plantillas/header_view', $data)
                . view('plantillas/navbar_view')
                . view('contenido/login/nueva_mascota')
                . view('plantillas/footer_view');
        }
    }

    public function perfil(): string
    {
        $categoriaModel = new CategoriaModel();
        $turnoModel = new TurnoModel();
        $servicioModel = new ServicioModel();
        $mascotaModel = new MascotaModel();

        $session = session();

        $data = [];

        if(!session('ADMIN')){

            $mascotas_row = $mascotaModel->where('USUARIO_ID', $session->get('USUARIO_ID'))->findAll();
            $turnos_row = $turnoModel->where('USUARIO_ID', session()->get('USUARIO_ID'))->findAll();
            $servicios_row = $servicioModel->findAll();
    
            //lista de mascotas
            $mascotas = [];
            foreach ($mascotas_row as $m) {
                $tipo = $categoriaModel->find($m['TIPO_MASCOTA']);
                $mascotas[$m['MASCOTA_ID']] = ['nombre' => $m['NOMBRE'], 'tipo' => $tipo['VALOR']];
            }
    
            //lista de servicios
            $servicios = [];
            foreach ($servicios_row as $s) {
                $servicios[$s['SERVICIO_ID']] = ['nombre' => $s['NOMBRE'], 'descripcion' => $s['DESCRIPCION'], 'categoria' => $s['CATEGORIA_SERVICIO']];
            }
    
            //lista de turnos
            $turnos = [];
            foreach ($turnos_row as $t) {
                $servicio = $servicios[$t['SERVICIO_ID']];
                $mascota =  $mascotas[$t['MASCOTA_ID']];
    
                array_push($turnos, ['fecha' => $t['FECHA'], 'horario' => $t['HORARIO'], 'servicio' => $servicio, 'mascota' => $mascota['nombre']]);
            }
    
            //datos del usuario
            $usuario = [
                'nombre' => $session->get('NOMBRE'),
                'apellido' => $session->get('APELLIDO'),
                'imagen' => $session->get('IMAGEN'),
                'correo' => $session->get('CORREO'),
                'direccion' => $session->get('DIRECCION'),
                'cbu' => $session->get('CBU'),
                'historial_compra' => $session->get('HISTORIAL_COMPRA'),
            ];
    
            //historial_compra
            $productos_historial = [];
    
            $productoModel = new ProductoModel();
            $ventasModel = new VentaModel();
            $ventainfoModel = new VentainfoModel();
    
            $compras_usuario = [];
    
            $compras_usuario = $ventasModel->where('USUARIO_ID', session('USUARIO_ID'))->findAll();
            
            foreach($compras_usuario as $c){
                $compra_info = $ventainfoModel->where('VENTA_ID', $c['VENTA_ID'])->findAll();
                $productos = [];
    
                foreach($compra_info as $compra){
                    $producto = $productoModel->where('CODIGO', $compra['PRODUCTO_ID'])->first();
                    
                    array_push($productos, 
                    ['codigo' => $producto['CODIGO'],
                    'nombre' => $producto['NOMBRE'],
                    'precio' => $compra['PRECIO'],
                    'cantidad' => $compra['CANTIDAD'],
                    'imagen'   => $producto['IMAGEN'],
                    ]);
                }
    
                $cantidad = count($productos);
                $productos_historial[$c['VENTA_ID']] = [
                    'usuario' => $c['USUARIO_ID'],
                    'fecha' => $c['FECHA'],
                    'total' => $c['TOTAL'],
                    'cantidad_prods' => $cantidad,
                    'productos' => $productos,
                ];
            }
    
            //data perfil usuario
            $data = [
                'titulo' => 'Perfil',
                'usuario' => $usuario,
                'turnos' => $turnos,
                'servicios' => $servicios,
                'mascotas' => $mascotas,
                'historial_compra' => $productos_historial,
            ];
        }else{
            $ventaModel = new VentaModel();

            $ventas_row = $ventaModel->findAll();
            $compras = [];

            //tomamos todas las ventas e iteramos
            foreach($ventas_row as $vr){
                
                //tomamos al usuario que realizo la compra
                $usuarioModel = new UsuarioModel();
                $usuario = $usuarioModel->where('USUARIO_ID', $vr['USUARIO_ID'])->first();
                
                //tomamos la informacion de compras individuales
                $ventasinfoModel = new VentainfoModel();
                $ventasInfo = $ventasinfoModel->where('VENTA_ID', $vr['VENTA_ID'])->findAll();
                
                //agregamos a un array de manera conveniente
                $productos = [];
                foreach($ventasInfo as $vi){
                    $productoModel = new ProductoModel();
                    $producto = $productoModel->where('CODIGO', $vi['PRODUCTO_ID'])->first();

                    array_push($productos, [
                        'nombre' => $producto['NOMBRE'],
                        'precio' => $producto['PRECIO'],
                        'cantidad' => $vi['CANTIDAD'],
                        'imagen' => $producto['IMAGEN']]);
                }

                //se compone array con los datos de
                //la compra
                //el usuario
                //productos
                $venta_data = [
                    'id' => $vr['VENTA_ID'],
                    'usuario' => ['id' => $usuario['USUARIO_ID'], 'nombre' => $usuario['NOMBRE'], 'apellido' => $usuario['APELLIDO']],
                    'total' => $vr['TOTAL'],
                    'fecha' => $vr['FECHA'],
                    'productos' => $productos,
                ];

                array_push($compras, $venta_data);
            }

            $data = [
                'titulo' => 'administrador',
                'historial_compra' => $compras,
            ];
        }

        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/perfil')
            . view('plantillas/footer_view');
    }

    public function actualizar_formulario(): string{
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->where('USUARIO_ID', session('USUARIO_ID'))->findAll();

        $data = ['titulo' => 'Modificar cuenta', 'validation' => [], 'usuario' => $usuario[0]];

        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/login/cuenta_completar')
            .view('plantillas/footer_view'); 
    }


    public function actualizar_cuenta()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $session = session();

        $validation->setRules(
            [
                'nombre' => 'required',
                'apellido' => 'required',
                'correo' => 'required',
                'cbu' => 'required',
                'direccion' => 'required',
                'telefono' => 'required',
            ],
            [
                'nombre' =>
                [
                    'required' => 'El nombre es obligatorio'
                ],
                'apellido' =>
                [
                    'required' => 'El apellido es obligatorio'
                ],
                'correo' =>
                [
                    'required' => 'El correo es obligatorio'
                ],
                'telefono' =>
                [
                    'required' => 'El telefono es obligatorio'
                ],
                'cbu' =>
                [
                    'required' => 'El cbu es obligatorio'
                ],
                'direccion' =>
                [
                    'required' => 'La direccion es obligatoria'
                ],
            ]
        );

        if ($validation->withRequest($request)->run()) {
            $model = new UsuarioModel();

            $model->update($session->get('USUARIO_ID'), [
                'NOMBRE' => $request->getPost('nombre'),
                'APELLIDO' => $request->getPost('apellido'),
                'CORREO' => $request->getPost('correo'),
                'TELEFONO' => $request->getPost('telefono'),
                'CBU' => $request->getPost('cbu'),
                'DIRECCION' => $request->getPost('direccion')
            ]);

            $session->set('NOMBRE', $request->getPost('nombre'));
            $session->set('APELLIDO', $request->getPost('apellido'));
            $session->set('CORREO', $request->getPost('apellido'));

            return redirect()->to('perfil');
        } else {
            $usuarioModel = new UsuarioModel();
            $usuario = $usuarioModel->where('USUARIO_ID', session('USUARIO_ID'))->findAll();
            
            $data = ['titulo' => 'Modificar cuenta', 'validation' => $validation->getErrors(), 'usuario' => $usuario[0]];

            return view('plantillas/header_view', $data)
                .view('plantillas/navbar_view')
                .view('contenido/login/cuenta_completar')
                .view('plantillas/footer_view'); 
        }
    }
}
