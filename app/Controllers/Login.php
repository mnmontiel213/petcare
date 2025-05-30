<?php

namespace App\Controllers;

use App\Models\UsuarioModel;


/*
Logica de los usuarios y sus registros
*/

class Login extends BaseController{

    public function login(){
        $data = ['titulo' => 'Login'];
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/login').view('plantillas/footer_view');
    }

    public function crear_usuario(){
        $rules = [
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required',
            'contraseña' => 'required',
            'confirmacion-contraseña' => 'required',
        ];

        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules($rules, 
        [ 'nombre' => ['required' => 'El nombre es obligatorio'],
                    'apellido' => ['required' => 'El apellido es obligatorio'],
                    'correo' => ['required' => 'El correo es obligatorio'],
                    'contraseña' => ['required' => 'La contraseña es obligatoria'],
                    'confirmacion-contraseña' => ['required' => 'Confirme la contraseña'] ]);

        $model = new UsuarioModel();
        
        if($validation->withRequest($request)->run()){
            $pass = password_hash($this->request->getPost('contraseña'), PASSWORD_BCRYPT);
            $model->save([
                'NOMBRE'     => $this->request->getPost('nombre'),
                'APELLIDO'   => $this->request->getPost('apellido'),
                'CORREO'     => $this->request->getPost('correo'),
                'CONTRASEÑA' => $pass,
            ]);
            
            session()->setFlashdata('success', 'usuario registrado con exito');
            return $this->response->redirect(base_url('login'));
        }else{
            session()->setFlashdata('failed', $validation->getErrors());
            return $this->response->redirect(base_url('login'));
        }

    }

    public function ingresar_usuario(){
        $session = session();
        $model = new UsuarioModel();

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
                $session->setFlashdata('msg', 'Bienvenido');
                return redirect()->to('/perfil');
            }else{
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Correo invalido');
            return redirect()->to('/login');
        }

    }

    public function salir_usuario(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}

?>
