<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\ServicioModel;
use App\Models\TurnoModel;
use App\Models\ProductoModel;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\RedirectResponse;

/*
Todas las funcionalidades de la pagina principal, primariamente tomar cosas de la base de datos para
poder mostrarlas
*/

class Home extends BaseController
{
    public function index(): string
    {
        $data['titulo'] = "PetCare";

        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/principal')
            . view('plantillas/footer_view');
    }

    public function contacto(): string
    {
        $data['titulo'] = "Contacto";
        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/nosotros/nosotros_header')
            . view('contenido/nosotros/contacto')
            . view('plantillas/footer_view');
    }

    public function nosotros(): string
    {
        $data['titulo'] = "Nosotros";
        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/nosotros/nosotros_header') // página por defecto
            . view('contenido/nosotros/quienes_somos')
            . view('plantillas/footer_view');
    }



    public function equipo(): string
    {
        $data['titulo'] = "Nuestro equipo";
        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/nosotros/nosotros_header')
            . view('contenido/nosotros/equipo')
            . view('plantillas/footer_view');
    }

    public function mision(): string
    {
        $data['titulo'] = "Misión";
        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/nosotros/nosotros_header')
            . view('contenido/nosotros/mision')
            . view('plantillas/footer_view');
    }

    public function valores(): string
    {
        $data['titulo'] = "Valores";
        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/nosotros/nosotros_header')
            . view('contenido/nosotros/valores')
            . view('plantillas/footer_view');
    }

    public function catalogo(): string
    {
        $data['titulo'] = "catalogo";
        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/catalogo')
            . view('plantillas/footer_view');
    }

    public function terminos(): string
    {
        $data['titulo'] = "terminos";
        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/terminos')
            . view('plantillas/footer_view');
    }

    public function servicios(): string
    {
        $data['titulo'] = "servicios";
        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/servicios')
            . view('plantillas/footer_view');
    }

    // En desarrollo
    public function enDesarrollo(): string
    {
        $data['titulo'] = "enDesarrollo";
        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/enDesarrollo')
            . view('plantillas/footer_view');
    }

    public function comercializacion(): string
    {
        $data['titulo'] = "comercializacion";
        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/comercializacion')
            . view('plantillas/footer_view');
    }

    public function login(): string | RedirectResponse
    {
        //si ya existe una sesion redirigir a salida de sesion
        if (session()->get('LOGGED')) {
            return redirect()->to('perfil');
        }

        $session = session();
        $flash = $session->getFlashdata();

        $data['titulo'] = "login";
        $data['validation'] = $flash;
        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/login/entrar')
            . view('plantillas/footer_view');
    }

    public function registro(): string
    {
        $data['titulo'] = "registro";
        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/login/registrarse')
            . view('plantillas/footer_view');
    }

    public function salir(): string
    {
        $data['titulo'] = "salir";
        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/login/salir')
            . view('plantillas/footer_view');
    }

    public function perfil(): string
    {
        $turnoModel = new TurnoModel();
        $servicioModel = new ServicioModel();

        $turnos_row = $turnoModel->where('USUARIO_ID', session()->get('USUARIO_ID'))->findAll();
        $servicios_row = $servicioModel->findAll();

        $session = session();

        $servicios = [];

        foreach ($turnos_row as $t) {
            foreach ($servicios_row as $s) {

                if ($s['SERVICIO_ID'] == $t['SERVICIO_ID']) {
                    $servicios[$s['SERVICIO_ID']] = $s['DESCRIPCION'];
                } else {
                    $servicios[$s['SERVICIO_ID']] = '?';
                }
            }
        }

        $usuario = [
            'nombre' => $session->get('NOMBRE'),
            'apellido' => $session->get('APELLIDO'),
            'imagen' => $session->get('IMAGEN')
        ];

        $data = [
            'titulo' => 'Perfil',
            'usuario' => $usuario,
            'turnos' => $turnos_row,
            'servicios' => $servicios,
        ];

        return view('plantillas/header_view', $data)
            . view('plantillas/navbar_view')
            . view('contenido/perfil')
            . view('plantillas/footer_view');
    }

    public function usuarios_listar(){
        $usuarioModel = new UsuarioModel();
        $usuarios = $usuarioModel->findAll();

        $data = ['titulo' => 'Usuarios', 'usuarios' => $usuarios];
        return view('plantillas/header_view', $data)
        .view('plantillas/navbar_view')
        .view('contenido/usuarios/usuarios_listado')
        .view('plantillas/footer_view');
    }

    public function usuarios_actualizar(){
        helper('url');
        $request = \Config\Services::request();
        $usuarioModel = new UsuarioModel();

        $id = $this->request->getPost('id');
        $mayorista = $this->request->getPost('mayorista');

        if($mayorista){
            $mayorista = 1;
        }else{
            $mayorista = 0;
        }
        
        $usuarioModel->update($id, ['ES_MAYORISTA' => $mayorista]);
        
        return redirect()->to('carrito');
    }
}
