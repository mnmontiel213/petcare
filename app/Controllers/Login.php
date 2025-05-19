<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Login extends BaseController{

    public function login(){
        //helper('form');
        return view('contenido/login');
    }

    public function crear_usuario(){
        print_r($_POST);

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

}

?>