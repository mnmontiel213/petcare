<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\ServicioModel;
use App\Models\TurnoModel;
use CodeIgniter\HTTP\ResponseInterface;


/*
Logica de los usuarios y sus registros
*/
class Turno extends BaseController{

    public function turno(): string{
        $categoriaModel = new CategoriaModel();
        $servicioModel = new ServicioModel();

        $categorias_row = $categoriaModel->where('TIPO', 'SERVICIO')->findAll(); 
        $servicios_row = $servicioModel->findAll();

        $servicios = [];

        foreach($categorias_row as $c){
            $servicios[$c['VALOR']] = [];
            foreach($servicios_row as $s){
                if($s['CATEGORIA_SERVICIO'] == $c['CATEGORIA_ID']){
                    array_push($servicios[$c['VALOR']], $s);
                }
            }
        }

        $data = ['titulo' => 'Turnos', 'servicios' => $servicios];
        return view('plantillas/header_view', $data)
                .view('plantillas/navbar_view')
                .view('contenido/turnos/turno')
                .view('plantillas/footer_view');
    }

    public function sacar_turno(): ResponseInterface | string {
        $rules = [
            'tipo-turno' => 'required',
            'fecha' => 'required',
            'horario' => 'required',
        ];

        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        
        $validation->setRules($rules,
        [
        'tipo-turno' => [
            'required' => 'seleccione el tipo de turno'
            ],
        'fecha' => [
            'required' => 'seleccione una fecha'
            ], 
        'horario' => [
            'required' => 'seleccione un horario'
            ], 
        ]);
        
        $model = new TurnoModel();     

        if($validation->withRequest($request)->run()){
            
            $fecha = $this->request->getPost('fecha');
            $horario = $this->request->getPost('horario');

            $data = [
                'USUARIO_ID' => session()->get('USUARIO_ID'),
                'FECHA'      => $fecha,
                'HORARIO'    => $horario,
                'SERVICIO_ID' => $this->request->getPost('tipo-turno'),
            ];
            
            $ingresado = $model->save($data);

            if($ingresado){
                session()->setFlashdata('success', 'se registro su turno con exito!');
                return $this->response->redirect(base_url('perfil'));
            }else{
                session()->setFlashdata('failed', 'hubo un problema al registrar el turno');
                return $this->response->redirect(base_url('/'));
            }
        }else{
            session()->setFlashdata('failed', 'fallo de validacion');
            return $this->response->redirect(base_url('/'));
        }
    }
}

?>
