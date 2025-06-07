<?php

namespace App\Controllers;

use App\Models\TurnoModel;
use App\Models\ProductoModel;
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
        $data['titulo'] = "contacto";
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/contacto')
            .view('plantillas/footer_view');
    }

    public function nosotros(): string
    {
        $data['titulo'] = "Nosotros";
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/nosotros/nosotros_header') // página por defecto
            .view('contenido/nosotros/quienes_somos')
            .view('plantillas/footer_view');
    }



    public function equipo(): string
    {
        $data['titulo'] = "Nuestro equipo";
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/nosotros/nosotros_header')
            .view('contenido/nosotros/equipo')
            .view('plantillas/footer_view');
    }

    public function mision(): string
    {
        $data['titulo'] = "Misión";
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/nosotros/nosotros_header')
            .view('contenido/nosotros/mision')
            .view('plantillas/footer_view');
    }

    public function valores(): string
    {
        $data['titulo'] = "Valores";
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/nosotros/nosotros_header')
            .view('contenido/nosotros/valores')
            .view('plantillas/footer_view');
    }

    public function catalogo(): string
    {
        $data['titulo'] = "catalogo";
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/catalogo')
            .view('plantillas/footer_view');
    }

    public function terminos(): string
    {
        $data['titulo'] = "terminos";
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/terminos')
            .view('plantillas/footer_view');
    }

    public function servicios(): string
    {
        $data['titulo'] = "servicios";
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/servicios')
            .view('plantillas/footer_view');
    }

    // En desarrollo
    public function enDesarrollo(): string
    {
        $data['titulo'] = "enDesarrollo";
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/enDesarrollo')
            .view('plantillas/footer_view');
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
            .view('plantillas/navbar_view')
            .view('contenido/login/entrar')
            .view('plantillas/footer_view');
    }

    public function registro(): string
    {
        $data['titulo'] = "registro";
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/login/registrarse')
            .view('plantillas/footer_view');
    }

    public function salir(): string
    {
        $data['titulo'] = "salir";
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/login/salir')
            .view('plantillas/footer_view');
    }

    public function perfil(): string
    {
        $turnoModel = new TurnoModel();
        $turnos = $turnoModel->where('USUARIO_ID', session()->get('USUARIO_ID'))->findAll();

        $session = session();
        
        $usuario = ['nombre' => $session->get('NOMBRE') ,
                    'apellido' => $session->get('APELLIDO'),
                    'imagen' => $session->get('IMAGEN'),];
        
        $data = [
            'titulo' => 'Perfil',
            'usuario' => $usuario,
            'turnos' => $turnos
        ];
        
        return view('plantillas/header_view', $data)
            .view('plantillas/navbar_view')
            .view('contenido/perfil')
            .view('plantillas/footer_view');
    }
}
