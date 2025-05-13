<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['titulo'] = "index";
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

    public function consultas(): string
    {
        $data['titulo'] = "consultas";
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/consultas').view('plantillas/footer_view');
    }

    public function terminos(): string
    {
        $data['titulo'] = "terminos";
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/terminos').view('plantillas/footer_view');
    }

    public function comercializacion(): string
    {
        $data['titulo'] = "comercializacion";
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/comercializacion').view('plantillas/footer_view');
    }

    // En desarrollo
    public function enDesarrollo(): string
    {
        $data['titulo'] = "enDesarrollo";
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/enDesarrollo').view('plantillas/footer_view');
    }
}
