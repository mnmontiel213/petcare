<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\MascotaModel;
use App\Models\UsuarioModel;
use App\Models\TurnoModel;
use App\Models\ServicioModel;


/*
 *
 Logica de los usuarios y sus registros
 *
 */

class Login extends BaseController{

    /*
     *
     MUESTRA VIEW PARA INGRESO DE USUARIO
     *
     */
    public function login_ingresar(){
        $data = ['titulo' => 'Ingresar', 'validation' => [], 'error' => null];
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/login/entrar')
            .view('plantillas/footer_view');
    }

    /*
     *
     MUESTRA VIEW PARA REGISTRO DE USUARIO
     *
     */
    public function login_registrarse(){
        $data = ['titulo' => 'Registrarse', 'validation' => null];
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/login/registrarse')
            .view('plantillas/footer_view');
    }

    
    /*
     *
     CREA UN NUEVO USUARIO
     *
     */
    public function crear_usuario(){
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
            [ 'nombre' =>
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
            ]);
        
        if($validation->withRequest($request)->run()){
            $img = $this->request->getFile("imagen");
            $nombre_aleatorio = null;

            if($img->isValid()){
                $nombre_aleatorio = $img->getRandomName();
                $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);
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
        }else{

            // ERROR EN VALIDACION
            $data['titulo'] = 'Registarse';
            $data['validation'] = $validation->getErrors();

            return view('plantillas/header_view', $data)
                .view('plantillas/navbar_view')
                .view('contenido/login/registrarse')
                .view('plantillas/footer_view');
        }

    }

    public function actualizar_cuenta(){
        helper('url');

        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $session = session();

        $validation->setRules(
            [
                'cbu' => 'required',
                'direccion' => 'required'
            ],
            [ 'cbu' =>
              [
                  'required' => 'Ese necesario un CBU'
              ],
              'direccion' =>
              [
                  'required' => 'Es necesario una direccion'
              ]
            ]);
        
        if($validation->withRequest($request)->run()){
            $model = new UsuarioModel();
            
            $model->update($session->get('USUARIO_ID'), ['CBU' => $request->getPost('cbu'),
                                'DIRECCION' => $request->getPost('direccion')]);
            
            
            return redirect()->to('carrito');
        }else{

            foreach( $validation->getErrors() as $e){
                echo $e;
            }

            echo 'faltaron weas mijo';
        }
    }

    
    /*
     *
     INGRESA A LA SESION DE UN NUEVO USURIO
     *
     */
    public function ingresar_usuario(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $session = session();

        $email = $this->request->getPost('correo');
        $contraseña = $this->request->getPost('contraseña');
        
        $validation->setRules(
            [
                'correo' => 'required|valid_email',
                'contraseña' => 'required',
            ]  ,
            [
                'correo' =>[
                    'required' => 'Ingrese un correo',
                    'valid_email' => 'Correo invalido'
                ],
                'contraseña' =>[
                    'required' => 'Ingrese la contraseña',
                ],
            ],
        );
        
        if($validation->withRequest($request)->run()){
            $model = new UsuarioModel();
            $user_data = $model->where('CORREO', $email)->first();
            
            if($user_data){
                if(password_verify($contraseña, $user_data['CONTRASEÑA'])){
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
                        'ADMIN' => FALSE,
                    ];

                    if($user_data['USUARIO_ID'] == 1 or
                       $user_data['NOMBRE'] == 'admin'){
                        $session_data['ADMIN'] = TRUE;
                    }
                
                    $session->set($session_data);
                    return redirect()->to('perfil');
                }else{
                    // WRONG PASSWORD
                    $data['titulo'] = 'Ingresar';
                    $data['error'] = 'contraseña incorrecta';
                    $data['validation'] = $validation->getErrors();
                    
                    return view('plantillas/header_view', $data)
                        .view('plantillas/navbar_view')
                        .view('contenido/login/entrar')
                        .view('plantillas/footer_view'); 
                }
            }else{
                // WRONG EMAIL
                $data['titulo'] = 'Ingresar';
                $data['error'] = 'correo incorrecto';
                $data['validation'] = $validation->getErrors();                

                return view('plantillas/header_view', $data)
                    .view('plantillas/navbar_view')
                    .view('contenido/login/entrar')
                    .view('plantillas/footer_view');                 
            }
        }else{
            // VALIDATION FAIL
            $data = ['titulo' => 'Login',
                     'validation' => $validation->getErrors(),
                     'error' => null];
            
            return view('plantillas/header_view', $data)
                .view('plantillas/navbar_view')
                .view('contenido/login/entrar')
                .view('plantillas/footer_view');
        }
    }

    
    /*
     *
     CIERRA LA SESION DEL USUARIO ACTUAL
     * 
     */
    public function salir_usuario(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    public function registrar_mascota_formulario(){

        $categoriaModel = new CategoriaModel();

        $razas = $categoriaModel->where('TIPO', 'MASCOTA')->findAll();

        $data = ['titulo' => 'Registrar mascota', 'razas' => $razas, 'validation' => []];

        return view('plantillas/header_view', $data)
                .view('plantillas/navbar_view')
                .view('contenido/login/nueva_mascota')
                .view('plantillas/footer_view');
    }

    public function registrar_mascota() {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules([
            'nombre' => 'required',
            'mascota' => 'required',
        ],
        [ 'nombre' =>[
              'required' => 'El nombre es obligatorio'
                ],
          'mascota' =>
          [
              'required' => 'Seleccione el tipo de mascota'
          ],
        ]);

        if($validation->withRequest($request)->run()){
            $model = new MascotaModel();
            $pass = password_hash($this->request->getPost('contraseña'), PASSWORD_BCRYPT);

            $session = session();

            $model->save([
                'USUARIO_ID' => $session->get('USUARIO_ID'),
                'NOMBRE'     => $this->request->getPost('nombre'),
                'TIPO_MASCOTA'   => $this->request->getPost('mascota'),
            ]);

            return redirect()->to('registrar/mascota');
        }else{

            $categoriaModel = new CategoriaModel();
            $razas = $categoriaModel->where('TIPO', 'MASCOTA')->findAll();
            
            $data = [
                'titulo' => 'Registrar mascota',
                'validation' => $validation->getErrors(),
                'razas' => $razas,
            ];

            return view('plantillas/header_view', $data)
                .view('plantillas/navbar_view')
                .view('contenido/login/nueva_mascota')
                .view('plantillas/footer_view');
        }
    }

    public function perfil(): string
    {
        $categoriaModel = new CategoriaModel();
        $turnoModel = new TurnoModel();
        $servicioModel = new ServicioModel();
        $mascotaModel = new MascotaModel();

        $session = session();

        $mascotas_row = $mascotaModel->where('USUARIO_ID', $session->get('USUARIO_ID'))->findAll();
        $turnos_row = $turnoModel->where('USUARIO_ID', session()->get('USUARIO_ID'))->findAll();
        $servicios_row = $servicioModel->findAll();

        $session = session();

        //lista de mascotas
        $mascotas = [];
        foreach($mascotas_row as $m){
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
        foreach($turnos_row as $t){
            $servicio = $servicios[$t['SERVICIO_ID']];
            $mascota =  $mascotas[$t['MASCOTA_ID']];

            array_push($turnos, ['fecha' => $t['FECHA'], 'horario' => $t['HORARIO'], 'servicio' => $servicio, 'mascota' => $mascota['nombre']] );
        }

        //datos del usuario
        $usuario = [
            'nombre' => $session->get('NOMBRE'),
            'apellido' => $session->get('APELLIDO'),
            'imagen' => $session->get('IMAGEN'),
            'correo' => $session->get('CORREO'),
        ];

        $data = [
            'titulo' => 'Perfil',
            'usuario' => $usuario,
            'turnos' => $turnos,
            'servicios' => $servicios,
            'mascotas' => $mascotas,
        ];

        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/perfil')
            . view('plantillas/footer_view');
    }
}

?>
