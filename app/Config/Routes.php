<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */ 

//index
$routes->get('/',                'Home::index');
$routes->get('principal',        'Home::index');
$routes->get('contacto',         'Home::contacto');
$routes->get('quienes_somos',    'Home::quienes_somos');
$routes->get('servicios',        'Home::servicios');
$routes->get('terminos',         'Home::terminos');
$routes->get('catalogo',         'Home::catalogo');
$routes->get('consultas',        'Home::consultas');
$routes->get('productos',        'Home::productos');
$routes->get('login',            'Home::login');
$routes->get('registro',         'Home::registro');
$routes->get('enDesarrollo',     'Home::enDesarrollo');

//login
$routes->post('login/crear_usuario', 'Login::crear_usuario');
$routes->post('login/ingresar_usuario', 'Login::ingresar_usuario');

//perfil del usuario
$routes->get('perfil', 'Perfil::index', ['filter' => 'auth']);