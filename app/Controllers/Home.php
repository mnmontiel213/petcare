<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('plantillas/header_view').view('plantillas/navbar_view').view('contenido/principal').view('plantillas/footer_view');
    }


    public function contacto(): string
    {
        return view('plantillas/header_view').view('plantillas/navbar_view').view('contenido/contacto').view('plantillas/footer_view');
    }

    public function quienes_somos(): string
    {
        return view('plantillas/header_view').view('plantillas/navbar_view').view('contenido/quienes_somos').view('plantillas/footer_view');
    }

    public function catalogo(): string
    {
        return view('plantillas/header_view').view('plantillas/navbar_view').view('contenido/catalogo').view('plantillas/footer_view');
    }

    public function consultas(): string
    {
        return view('plantillas/header_view').view('plantillas/navbar_view').view('contenido/consultas').view('plantillas/footer_view');
    }

    public function terminos(): string
    {
        return view('plantillas/header_view').view('plantillas/navbar_view').view('contenido/terminos').view('plantillas/footer_view');
    }

    public function comercializacion(): string
    {
        return view('plantillas/header_view').view('plantillas/navbar_view').view('contenido/comercializacion').view('plantillas/footer_view');
    }
}
