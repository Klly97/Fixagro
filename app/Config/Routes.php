<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Configuración general
$routes->setDefaultNamespace('App\Controllers'); // Espacio de nombres por defecto
$routes->setDefaultController('Inicio');        // Controlador por defecto
$routes->setDefaultMethod('index');             // Método por defecto
$routes->setTranslateURIDashes(false);          // No traducir guiones en la URL

// Rutas principales del sistema
$routes->get('/', 'Inicio::redirecInicio'); // Redirige al inicio de la aplicación
$routes->get('/login', 'Inicio::index');    // Página de login
$routes->get('/inicio', 'Inicio::inicio');  // Página principal después de iniciar sesión
$routes->get('/cerrar_sesion', 'Inicio::cerrarSesion'); // Cierra la sesión del usuario

// Rutas relacionadas con el registro de usuarios
$routes->get('/selec_registro', 'Inicio::selec_registro'); // Seleccionar tipo de registro
$routes->get('/registro/(:alpha)', 'Inicio::vRegistro/$1'); // Registro basado en rol
$routes->post('/validarCredencialesLogin', 'Inicio::validarDatosIngreso'); // Validar credenciales de login
$routes->post('/crear_persona', 'Persona::crear'); // Crear un nuevo usuario en el sistema

// Rutas para gestión de máquinas
$routes->get('/publicacion_historial_maquina', 'Perfiles::publicacion_historial_maquina'); // Publicaciones relacionadas con el historial de máquinas
$routes->get('/ventanafin', 'Perfiles::ventanaFin'); // Ventana final de proceso
$routes->get('/historial', 'Perfiles::historial');   // Historial de las máquinas
$routes->get('/servicio_mantenimiento', 'Perfiles::servicio_mantenimiento'); // Servicios de mantenimiento
$routes->get('/agregar_maquinas', 'Perfiles::RegistroMaquinas'); // Página para agregar máquinas

// Rutas para gestión de ofertas
$routes->get('/ofertas', 'Oferta_Cliente::index'); // Listar todas las ofertas
$routes->get('/ofertas/crear', 'Oferta_Cliente::create'); // Página para crear una nueva oferta
$routes->post('/ofertas/guardar', 'Oferta_Cliente::store'); // Guardar una nueva oferta
$routes->get('/ofertas/editar/(:num)', 'Oferta_Cliente::edit/$1'); // Página para editar una oferta específica
$routes->post('/ofertas/actualizar/(:num)', 'Oferta_Cliente::update/$1'); // Actualizar una oferta específica
$routes->get('/ofertas/eliminar/(:num)', 'Oferta_Cliente::delete/$1'); // Eliminar una oferta específica

// Rutas para el chat
$routes->get('/chat', 'ChatController::index'); // Página principal del chat
$routes->post('/chat/enviar_mensaje', 'ChatController::sendMessage'); // Enviar un mensaje en el chat

//Ruta de olvidar contraseña
$routes->get('/restablecer', 'Restablecer::index');
$routes->post('/restablecer', 'Restablecer::restablecer');