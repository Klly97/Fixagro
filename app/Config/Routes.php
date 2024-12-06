<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Inicio');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);


$routes->get('/', 'Inicio::redirecInicio');
$routes->get('/login', 'Inicio::index');
$routes->get('/inicio', 'Inicio::inicio');
$routes->get('/cerrar_sesion', 'Inicio::cerrarSesion');


$routes->get('/selec_registro', 'Inicio::selec_registro');
$routes->get('/registro/(:alpha)', 'Inicio::vRegistro/$1');
$routes->post('/validarCredencialesLogin', 'Inicio::validarDatosIngreso');
$routes->post('/crear_persona', 'Persona::crear');

$routes->get('/publicacion_historial_maquina/(:num)', 'Perfiles::publicacion_historial_maquina/$1');
$routes->get('/ventanafin', 'perfiles::ventanaFin');
$routes->get('/historial', 'perfiles::historial');
$routes->get('/servicio_mantenimiento', 'perfiles::servicio_mantenimiento');

//Maquinas
$routes->post('/crear_maquina', 'Maquina::crear');
$routes->get('/maquinas', 'maquina::index');
$routes->get('/maquina/detalle/(:num)', 'maquina::detalle/$1');
$routes->get('/maquina/detalle/(:num)/historial', 'maquina::historial/$1', ['as' => 'maquina_historial']);
