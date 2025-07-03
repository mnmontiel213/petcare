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

    public function turno($validation = []): string{
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

        $data = ['titulo' => 'Turnos', 'servicios' => $servicios, 'mascotas' => $mascotas, 'validation' => $validation];
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


            $turnos = $model->findAll();

            foreach($turnos as $t){

                $igualdad_horarios = strcmp($this->request->getPost('horario') . ':00', $t['HORARIO']) == 0;
                $igualdad_fechas = strcmp($this->request->getPost('fecha'), $t['FECHA']) == 0;
                $igualdad_turnos = $this->request->getPost('tipo-turno') == $t['SERVICIO_ID'];

                if($igualdad_fechas && $igualdad_horarios && $igualdad_turnos){
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
        
                    $data = ['titulo' => 'Turnos', 'servicios' => $servicios, 'mascotas' => $mascotas, 'validation' => ['fecha' => 'Ya existe turno para esta fecha', 'horario' => 'ya existe turno para este horario']];
                    return view('plantillas/header_view', $data)
                            .view('plantillas/navbar_view')
                            .view('contenido/turnos/turno')
                            .view('plantillas/footer_view');
                }
            }

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

            return redirect()->to('perfil');
        }else{
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

            $data = ['titulo' => 'Turnos', 'servicios' => $servicios, 'mascotas' => $mascotas, 'validation' => $validation->getErrors()];
            return view('plantillas/header_view', $data)
                    .view('plantillas/navbar_view')
                    .view('contenido/turnos/turno')
                    .view('plantillas/footer_view');
        }
    }
}

?>
