<?php

namespace App\Controllers;

use App\Models\UsuarioModel;


/*
Logica de los usuarios y sus registros
*/

class Login extends BaseController{

    public function login(){
        //helper('form');
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

        $model = new UsuarioModel();
        
        if($this->validate($rules)){

            $model->save([
                'NOMBRE' => $this->request->getVar('nombre'),
                'APELLIDO' => $this->request->getVar('apellido'),
                'CORREO' => $this->request->getVar('correo'),
                'CONTRASEÑA' => $this->request->getVar('contraseña'),
            ]);

            session()->setFlashdata('success', 'usuario registrado con exito');
            return $this->response->redirect(base_url('login'));
        }

    }

    public function ingresar_usuario(){
        //echo $this->request->getVar('correo');
        //echo $this->request->getVar('contraseña');
        
        $session = session();
        $model = new UsuarioModel();

        $email = $this->request->getVar('correo');
        $contraseña = $this->request->getVar('contraseña');

        $data = $model->where('CORREO', $email)->first();
        if($data){
            //es necesario verificar contraseña
            //deberiamos de encriptar esto...
            if($data['CONTRASEÑA'] === $contraseña){
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
