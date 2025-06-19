<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//index
$routes->get('/',                'Home::index');
$routes->get('principal',        'Home::index');
// $routes->get('contacto',         'Home::contacto');

//nosotros
//$routes->get('nosotros_header', 'Home::nosotros');
$routes->get('nosotros_header/quienes_somos', 'Home::nosotros');
$routes->get('nosotros_header/equipo', 'Home::equipo');
$routes->get('nosotros_header/mision', 'Home::mision');
$routes->get('nosotros_header/valores', 'Home::valores');
$routes->get('nosotros_header/contacto', 'Home::contacto');

$routes->get('comercializacion',        'Home::comercializacion');
$routes->get('terminos',         'Home::terminos');
$routes->get('catalogo',         'Home::catalogo');
$routes->get('enDesarrollo',     'Home::enDesarrollo');

// servicios
$routes->get('servicios',        'Home::servicios');
$routes->get('servicios/salud',        'Home::salud');
$routes->get('servicios/nutricion',        'Home::nutricion');
$routes->get('servicios/estetica',        'Home::estetica');


$routes->get('productos',                          'Productos::listar');
$routes->get('productos/agregar',                  'Productos::agregar', ['filter' => 'admin']);
$routes->post('productos/registrar_producto',      'Productos::registrar_nuevo');

//consultas
// $routes->get('contactos',         'Consulta::consultas');
$routes->get('consultas',         'Consulta::consultas');
$routes->post('enviar_consulta',  'Consulta::enviar_consulta');
$routes->get('consultas/listar',  'Consulta::listar', ['filter' => 'admin']);
$routes->post('consulta/eliminar', 'Consulta::eliminar', ['filter' => 'admin']);

//turnos
$routes->get('turno',                'Turno::turno', ['filter' => 'auth']);
$routes->post('turno/agregar_turno', 'Turno::sacar_turno', ['filter' => 'auth']);

//login
$routes->get('login/ingresar',                   'Login::login_ingresar');
$routes->get('login/registrar',                   'Login::login_registrarse');
$routes->get('login/salir',             'Login::salir_usuario');
$routes->get('salir',                   'Login::salir');
$routes->post('login/crear_usuario',    'Login::crear_usuario');
$routes->post('login/ingresar_usuario', 'Login::ingresar_usuario');
$routes->post('login/cuenta_actualizar', 'Login::actualizar_cuenta');


//perfil del usuario
$routes->get('perfil', 'Home::perfil', ['filter' => 'auth']);
$routes->get('usuarios/listar', 'Home::usuarios_listar', ['filter' => 'admin']);

$routes->post('usuarios/actualizar', 'Home::usuarios_actualizar', ['filter' => 'admin']);

//carrito
$routes->get('carrito', 'Carrito::carrito', ['filter' => 'auth']);
$routes->post('carrito/agregar', 'Carrito::agregar_producto', ['filter' => 'auth']);
$routes->post('carrito/update', 'Carrito::actualizar', ['filter' => 'auth']);
$routes->post('carrito/pagar', 'Carrito::pagar', ['filter' => 'auth']);
