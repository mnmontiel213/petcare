<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('principal', 'Home::index');
$routes->get('contacto', 'Home::contacto');
$routes->get('quienes_somos', 'Home::quienes_somos');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('terminos', 'Home::terminos');
$routes->get('catalogo', 'Home::catalogo');
$routes->get('consultas', 'Home::consultas');
$routes->get('productos', 'Home::productos');

// Informe de desarrollo
$routes->get('enDesarrollo', 'Home::enDesarrollo');

$routes->get('login', 'Home::login');
$routes->post('login', 'Usuario_controller::agregar_usuario');

