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
$routes->post('/buscar', 'Persona::buscarPersona');//Para buscar perfiles por su nombre
$routes->get('persona/detalle/(:num)', 'Persona::detalle/$1');//abrir perfil de la persona
$routes->get('/tecnico', 'Persona::tecnico');

// Rutas para gestión de máquinas
$routes->get('/publicacion_maquina/(:num)', 'Maquina::maquina/$1');// Publicaciones relacionadas con el historial de máquinas
$routes->post('maquina/actualizar', 'Maquina::actualizar');//actualizar las maquinas
$routes->get('maquina/eliminar/(:num)', 'Maquina::eliminar/$1');//se elimina la maquina

$routes->post('/crear_maquina', 'Maquina::crear');//para agregar máquinas


// Rutas para gestión de publicacion
$routes->post('/crear_publicacion', 'Publicacion::crear'); //para crear publicaicion///buscar metodo en perfiles
$routes->get('/historial', 'Publicacion::historial');// Historial de las máquinas
$routes->get('eliminar_publicacion/(:num)', 'Publicacion::eliminarPublicacion/$1');//eliminar publicacion

//rutas para los trabajos del tecnico
$routes->get('perfil_tecnico', 'Persona::perfilTecnico');

$routes->get('trabajo/asignar/(:num)', 'Persona::asignarTrabajo/$1');

$routes->get('/finalizar_servicio', 'Maquina::finalizar_servicio');

$routes->post('/ofertas', 'Ofertas::index'); //para crear publicaicion///buscar metodo en perfiles
