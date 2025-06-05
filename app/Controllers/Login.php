<?php

namespace App\Controllers;

use App\Models\UsuarioModel;


/*
Logica de los usuarios y sus registros
*/

class Login extends BaseController{

    public function login(){
        $data = ['titulo' => 'Login'];
        return view('plantillas/header_view', $data)
                .view('plantillas/navbar_view')
                .view('contenido/login')
                .view('plantillas/footer_view');
    }

    public function crear_usuario(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules($rules, 
                                    [   'nombre' => ['required' => 'El nombre es obligatorio'],
                                        'apellido' => ['required' => 'El apellido es obligatorio'],
                                        'correo' => ['required' => 'El correo es obligatorio'],
                                        'contraseña' => ['required' => 'La contraseña es obligatoria'],
                                        'confirmacion-contraseña' => ['required' => 'Confirme la contraseña'] 
                                    ]);
        
        if($validation->withRequest($request)->run()){
            $model = new UsuarioModel();
            $pass = password_hash($this->request->getPost('contraseña'), PASSWORD_BCRYPT);
            
            $model->save([
                'NOMBRE'     => $this->request->getPost('nombre'),
                'APELLIDO'   => $this->request->getPost('apellido'),
                'CORREO'     => $this->request->getPost('correo'),
                'CONTRASEÑA' => $pass,
            ]);
            
            return $this->response->redirect(base_url('login/registrar'));
        }else{

            $data = ['titulo' => 'Login'];
            $data = ['validation' => $validation->getErrors()];

            return view('plantillas/header_view', $data)
                .view('plantillas/navbar_view')
                .view('contenido/login/registrarse')
                .view('plantillas/footer_view');
        }

    }

    public function ingresar_usuario(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $session = session();
        $model = new UsuarioModel();

        $validation->setRules([
            'correo' => 'required',
            'contraseña' => 'required',
        ], 
        [
            'correo' => ['required' => 'El correo es obligatorio'],
            'contraseña' => ['required' => 'La contraseña es obligatoria'],
        ]);



        if($validation->withRequest($request)->run()){
            $email = $this->request->getPost('correo');
            $contraseña = $this->request->getPost('contraseña');

            $data = $model->where('CORREO', $email)->first();

            if($data){
                if(password_verify($contraseña, $data['CONTRASEÑA'])){
                    $session_data = [
                        'USUARIO_ID' => $data['USUARIO_ID'],
                        'NOMBRE' => $data['NOMBRE'],
                        'APELLIDO' => $data['APELLIDO'],
                        'CORREO' => $data['CORREO'],
                        'CBU' => $data['CBU'],
                        'DIRECCION' => $data['DIRECCION'],
                        'ES_MAYORISTA' => $data['ES_MAYORISTA'],
                        'LOGGED' => TRUE,
                    ];
                    
                    $session->set($session_data);
                    return redirect()->to('/perfil');
                }else{
                    /* 
                        CONTRASEÑA INCORRECTA
                    */
                    $data['error'] = 'contraseña incorrecta';
                    echo $data['error'];
                }
            }else{
                /*
                    CORREO NO EXISTE
                 */

                 $data['error'] = 'correo incorrecto';
                echo $data['error'];
            }
        }else{
            /*
                VALIDACION FALLIDA
            */
            
            foreach($validation->getErrors() as $error){
                echo $error;
                echo '<br>';
            }

            echo 'validacion fallida';
        }
    }

    public function salir_usuario(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}

?>
