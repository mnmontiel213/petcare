<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Codeigniter\HTTP\RedirectResponse;
use Codeigniter\HTTP\ResponseInterface;
use App\Models\ConsultaModel;

class Consulta extends BaseController{

    public function consultas(): string
    {
        $data['titulo'] = "consultas";
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/consultas/consultas')
            .view('plantillas/footer_view');
    }

    public function enviar_consulta(): string
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $data['titulo'] = "Contacto";
        $data['validation'] = [];

        $validation->setRules(
            [
                'titulo' => 'required',
                'correo' => 'required|valid_email',
                'contenido' => 'required',
            ],
            [
                'titulo' => [
                    'required' => 'Ingrese un titulo para la consulta',
                ],
                'correo' =>[
                    'required' => 'Ingrese un correo',
                    'valid_email' => 'Correo invalido'
                ],
                'contenido' => [
                    'required' => 'Ingrese el motivo de la consulta',
                ],
            ]
        );

        if($validation->withRequest($request)->run()){
            $session = session();
            $usuario_id = $session->get('USUARIO_ID');
            if(!$session->get('LOGGED')){
                $usuario_id = 0;
            }

            $consulta = new ConsultaModel();
            $consulta->save([
                'TITULO' => $this->request->getVar('titulo'),
                'CORREO' => $this->request->getVar('correo'),
                'CONTENIDO' => $this->request->getVar('contenido'),
                'USUARIO_ID' => $usuario_id,
            ]);
            
            $data['titulo'] = "Contacto";

            return view('plantillas/header_view', $data)
                    .view('plantillas/navbar_view')
                    .view('contenido/nosotros/nosotros_header')
                    .view('contenido/nosotros/contacto')
                    .view('plantillas/footer_view');
        }else{
            $data['titulo'] = "Contacto";
            $data['validation'] = $validation->getErrors();

            return view('plantillas/header_view', $data)
                    .view('plantillas/navbar_view')
                    .view('contenido/nosotros/nosotros_header')
                    .view('contenido/nosotros/contacto')
                    .view('plantillas/footer_view');
        }
    }

    public function eliminar(){
        $request = \Config\Services::request();
        $consultaModel = new ConsultaModel();

        $id = $this->request->getPost('id');
        $consultaModel->delete($id);

        return redirect()->to('consultas/listar');
    }

    public function listar(){
        $consultaModel = new ConsultaModel();

        $consultas = $consultaModel->findAll();

        $data = ['titulo' => 'Consultas', 'consultas' => $consultas];
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/consultas/consultas_listado')
            .view('plantillas/footer_view');
    }
}