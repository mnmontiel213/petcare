<?php

namespace App\Controllers;

use App\Models\UsuarioModel;


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
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);
            
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
            ],
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
                    ];
                
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
}

?>
