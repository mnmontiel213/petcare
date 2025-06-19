<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\ServicioModel;
use App\Models\TurnoModel;
use App\Models\MascotaModel;

use CodeIgniter\HTTP\ResponseInterface;


/*
Logica de los usuarios y sus registros
*/
class Turno extends BaseController{

    public function turno(): string{
        $categoriaModel = new CategoriaModel();
        $servicioModel = new ServicioModel();
        $mascotasModel = new MascotaModel();

        $session = session();
        
        $mascotas_row = $mascotasModel->where('USUARIO_ID', $session->get('USUARIO_ID'))->findAll();
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

        $mascotas = [];

        foreach($mascotas_row as $m){
            array_push($mascotas, ['nombre' => $m['NOMBRE'], 'id' => $m['MASCOTA_ID']]);
        }

        $data = ['titulo' => 'Turnos', 'servicios' => $servicios, 'mascotas' => $mascotas];
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
            'mascota' => 'required',
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
        'mascota' => [
            'required' => 'seleccione una mascota'
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
                'MASCOTA_ID' => $this->request->getPost('mascota'),
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
