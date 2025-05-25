<?php

namespace App\Controllers;

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
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/principal').view('plantillas/footer_view');
    }

    public function contacto(): string
    {
        $data['titulo'] = "contacto";
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/contacto').view('plantillas/footer_view');
    }

    public function quienes_somos(): string
    {
        $data['titulo'] = "quienes_somos";
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/quienes_somos').view('plantillas/footer_view');
    }

    public function catalogo(): string
    {
        $data['titulo'] = "catalogo";
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/catalogo').view('plantillas/footer_view');
    }

    public function terminos(): string
    {
        $data['titulo'] = "terminos";
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/terminos').view('plantillas/footer_view');
    }

    public function servicios(): string
    {
        $data['titulo'] = "servicios";
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/servicios').view('plantillas/footer_view');
    }

    // En desarrollo
    public function enDesarrollo(): string
    {
        $data['titulo'] = "enDesarrollo";
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/enDesarrollo').view('plantillas/footer_view');
    }

    public function productos(): string
    {
        $productoModel = new ProductoModel();
        $result = $productoModel->findAll();
        
        $data = ['titulo' => "index", 'productos' => $result];
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/productos').view('plantillas/footer_view');
    }


    public function login(): string | RedirectResponse
    {   
        //si ya existe una sesion redirigir a salida de sesion
        if(session()->get('LOGGED')){
            return redirect()->to('perfil');
        }
        
        $session = session();
        $flash = $session->getFlashdata();
        
        $data['titulo'] = "login";
        $data['validation'] = $flash;
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/login/entrar').view('plantillas/footer_view');        
    }

    public function registro(): string
    {   
        $data['titulo'] = "registro";
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/login/registrarse').view('plantillas/footer_view');
    }

    public function salir(): string
    {
        $data['titulo'] = "salir";
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/login/salir').view('plantillas/footer_view');
    }

    public function perfil(): string
    {
        $data = ['titulo' => 'Perfil', 'nombre_usuario' => session()->get('NOMBRE')];
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/perfil').view('plantillas/footer_view');
    }
}
