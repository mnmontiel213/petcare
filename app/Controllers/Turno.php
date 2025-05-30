<?php

namespace App\Controllers;

use App\Models\TurnoModel;
use CodeIgniter\HTTP\ResponseInterface;


/*
Logica de los usuarios y sus registros
*/

enum TipoTurno{
    case baño;
    case uñas;
    case pelo;
    case castracion;
    case vacunacion;
    case dentista;
    case radiografia;
    case consulta_general;
}

class Turno extends BaseController{

    public function turno(): string{
        $data = ['titulo' => 'Turnos'];
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/turnos/turno').view('plantillas/footer_view');
    }

    public function sacar_turno(): ResponseInterface {
        $rules = [
            'tipo-turno' => 'required',
            'fecha' => 'required',
            'horario' => 'required',
        ];

        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        
        $validation->setRules($rules,
                        ['tipo-turno' => ['required' => 'seleccione el tipo de turno'],
                         'fecha' => ['required' => 'seleccione una fecha'], 
                         'horario' => ['required' => 'seleccione un horario'], 
                        ]);
        
        $model = new TurnoModel();     

        if($validation->withRequest($request)->run()){

            $fecha = $this->request->getPost('fecha');
            $horario = $this->request->getPost('horario');

            $ingresado = $model->save([
                'USUARIO_ID' => session()->get('USUARIO_ID'),
                'FECHA'      => $fecha,
                'HORARIO'    => $horario,
                'TIPO_TURNO' => $this->request->getPost('tipo-turno'),
            ]);

            if($ingresado){
                session()->setFlashdata('success', 'se registro su turno con exito!');
                return $this->response->redirect(base_url('perfil'));
            }else{
                session()->setFlashdata('failed', 'hubo un problema al registrar el turno');
                return $this->response->redirect(base_url('/'));
            }
        }else{
            session()->setFlashdata('failed', 'hubo un problema al registrar el turno');
            return $this->response->redirect(base_url('/'));
        }
    }
}

?>
