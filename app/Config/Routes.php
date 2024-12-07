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
$routes->get('/registro/(:alpha)', 'Inicio::vRegistro/$1');// Registro basado en rol
$routes->post('/validarCredencialesLogin', 'Inicio::validarDatosIngreso');// Validar credenciales de login
$routes->post('/crear_persona', 'Persona::crear');// Crear un nuevo usuario en el sistema

//Ruta de olvidar contraseña
$routes->get('/restablecer', 'Restablecer::index');
$routes->post('/restablecer', 'Restablecer::restablecer');

// Rutas para gestión de los perfiles
$routes->get('/perfil', 'Persona::editarPerfil'); // Para editar datos del perfil
$routes->post('/perfil/cambiarContrasena', 'Persona::cambiarContrasena'); //para el cambio de contraseña
$routes->post('/actualizar_persona', 'Persona::actualizarPerfil');//para la actualizacion del perfil
$routes->post('/perfil/eliminarPersona', 'Persona::eliminarPersona');//para eliminar perfil

// Rutas para gestión de máquinas
$routes->get('/publicacion_maquina/(:num)', 'Perfiles::publicacion_maquina/$1');// Publicaciones relacionadas con el historial de máquinas
$routes->get('/historial', 'perfiles::historial');// Historial de las máquinas
$routes->get('/servicio_mantenimiento', 'perfiles::servicio_mantenimiento');// Servicios de mantenimiento
$routes->post('/crear_maquina', 'Maquina::crear');//para agregar máquinas


// Rutas para gestión de publicacion
$routes->get('/crear_publicacion', 'Oferta_Cliente::RegistroPublicacion'); //para crear publicaicion///buscar metodo en perfiles
$routes->get('/ofertas', 'publicacion_maquinas::index'); // Listar todas las ofertas----------------------
$routes->get('/ofertas/crear', 'Oferta_Cliente::create'); // Página para crear una nueva oferta-----------------
$routes->post('/ofertas/guardar', 'Oferta_Cliente::store'); // Guardar una nueva oferta--------------
$routes->get('/ofertas/editar/(:num)', 'Oferta_Cliente::edit/$1'); // Página para editar una oferta específica
$routes->post('/ofertas/actualizar/(:num)', 'Oferta_Cliente::update/$1'); // Actualizar una oferta específica
$routes->get('/ofertas/eliminar/(:num)', 'Oferta_Cliente::delete/$1'); // Eliminar una oferta específica



// Rutas para el chat