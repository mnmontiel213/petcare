<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//index
$routes->get('/',                'Home::index');
$routes->get('principal',        'Home::index');
$routes->get('contacto',         'Home::contacto');

//nosotros
//$routes->get('nosotros_header', 'Home::nosotros');
$routes->get('nosotros_header/quienes_somos', 'Home::nosotros');
$routes->get('nosotros_header/equipo', 'Home::equipo');
$routes->get('nosotros_header/mision', 'Home::mision');
$routes->get('nosotros_header/valores', 'Home::valores');

$routes->get('servicios',        'Home::servicios');
$routes->get('terminos',         'Home::terminos');
$routes->get('catalogo',         'Home::catalogo');
$routes->get('enDesarrollo',     'Home::enDesarrollo');

$routes->get('productos',                          'Productos::listar');
$routes->get('productos/agregar',                  'Productos::agregar', ['filter' => 'admin']);
$routes->post('productos/registrar_producto',      'Productos::registrar_nuevo');

//consultas
$routes->get('contactos',        'Consulta::consultas');
$routes->get('consultas',        'Consulta::consultas');
$routes->post('enviar_consulta', 'Consulta::enviar_consulta');

//turnos
$routes->get('turno',                'Turno::turno', ['filter' => 'auth']);
$routes->post('turno/agregar_turno', 'Turno::sacar_turno', ['filter' => 'auth']);

//login
$routes->get('login/entrar',                   'Home::login');
$routes->get('login/registrar',                'Home::registro');
$routes->get('salir',                   'Home::salir');
$routes->post('login/crear_usuario',    'Login::crear_usuario');
$routes->post('login/ingresar_usuario', 'Login::ingresar_usuario');
$routes->get('login/salir',             'Login::salir_usuario');

//perfil del usuario
$routes->get('perfil', 'Home::perfil', ['filter' => 'auth']);
