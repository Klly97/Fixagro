<?php

namespace App\Controllers;

use App\Models\PersonaModel;
use App\Models\PublicacionModel;
use App\Models\MaquinaModel;
use App\Models\TrabajosModel;
use App\Models\NotificacionesModel;
class Persona extends BaseController
{
    public function crear()
    {
        $nombre = $this->request->getPostGet('nombre');
        $apellido = $this->request->getPostGet('apellido');
        $telefono = $this->request->getPostGet('telefono');
        $direccion = $this->request->getPostGet('direccion');
        $municipio = $this->request->getPostGet('municipio');
        $departamento = $this->request->getPostGet('departamento');
        $correo = $this->request->getPostGet('correo');
        $contrasena = md5($this->request->getPostGet('contrasena'));
        $tipo_persona = $this->request->getPostGet('tipo_persona');
        $usuariosModel = new PersonaModel();

        $registros = $usuariosModel->save([
            'nombre' => $nombre,
            'apellido' => $apellido,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'municipio' => $municipio,
            'departamento' => $departamento,
            'email' => $correo,
            'nombre_usuario' => $nombre,
            'contrasena' => $contrasena,
            'estado' => "ACTIVO",
            'tipo_persona' => $tipo_persona,
            'avatar' => 'xaSASasasas'
        ]);

    }

    public function cosultarPersona($id_persona)
    {
        $personaModel = new PersonaModel();

        // Obtener información del usuario actual
        $data = $personaModel->where('id', $id_persona)->findAll();
        return $data;
    }

    public function editarPerfil()
    {
        $personaModel = new PersonaModel();

        // Obtener el ID del usuario de la sesión
        $id = session()->get('id');

        if (!$id) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión primero.');
        }

        // Obtener información del usuario actual
        $data['persona'] = $personaModel->find($id);

        if (!$data['persona']) {
            return redirect()->to('/')->with('error', 'Usuario no encontrado.');
        }

        // Enviar los datos del usuario a la vista
        return view('perfil', $data);
    }

    public function actualizarPerfil()
    {
        $personaModel = new PersonaModel();

        // Obtener el ID del usuario de la sesión
        $id = session()->get('id');

        if (!$id) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión primero.');
        }

        // Obtener datos del formulario
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'direccion' => $this->request->getPost('direccion'),
            'municipio' => $this->request->getPost('municipio'),
            'departamento' => $this->request->getPost('departamento'),
            'telefono' => $this->request->getPost('telefono'),
        ];

        // Actualizar los datos del usuario en la base de datos
        $personaModel->update($id, $data);

        return redirect()->route('/');
    }
    public function cambiarContrasena()
    {
        $personaModel = new PersonaModel();
        $usuarioId = session()->get('id');
        $usuario = $personaModel->find($usuarioId);

        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('new_password');

        if (md5($oldPassword) === $usuario['contrasena']) {
            $newHashedPassword = md5($newPassword);
            $personaModel->update($usuario['id'], ['contrasena' => $newHashedPassword]);
            session()->destroy();

            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Contraseña actual incorrecta']);
        }
    }


    public function eliminarPersona()
    {
        // Obtener el ID de la persona desde el formulario
        $usuarioId = session()->get('id');
        $personaModelo = new PersonaModel();


        if ($personaModelo->delete($usuarioId)) {
            session()->destroy();
            return redirect()->to('/login')->with('mensaje', 'exito en eliminar');
        } else {
            return redirect()->back()->with('error', 'Error al eliminar la persona');
        }
    }

    public function buscarPersona()
    {
        // Capturar el término de búsqueda desde el formulario
        $termino = $this->request->getPost('busqueda');

        // Instanciar el modelo
        $modelo = new PersonaModel();

        // Dividir el término de búsqueda en palabras
        $palabras = explode(' ', trim($termino));

        // Filtrar solo los registros que sean de tipo TECNICO
        $query = $modelo;

        if (count($palabras) > 1) {
            // Si hay más de una palabra, buscaremos ambas en nombre y apellido
            $query->groupStart()
                ->like('nombre', $palabras[0])
                ->like('apellido', $palabras[1])
                ->groupEnd();
        } else {
            // Si solo hay una palabra, buscaremos en nombre o apellido
            $query->groupStart()
                ->like('nombre', $palabras[0])
                ->orLike('apellido', $palabras[0])
                ->groupEnd();
        }

        // Ejecutar la consulta
        $resultados = $query->findAll();

        // Cargar la vista con los resultados
        return view('persona_resultado', ['resultados' => $resultados]);
    }

    public function detalle($id)
    {
        $personaModel = new PersonaModel();
        $publicacionModel = new PublicacionModel();
        $maquinaModel = new MaquinaModel(); // Cargar el modelo de máquinas

        // Obtener la información de la persona por su ID
        $persona = $personaModel->find($id);

        // Si no se encuentra la persona, mostrar error
        if (!$persona) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Persona no encontrada');
        }

        // Obtener las publicaciones del usuario
        $publicaciones = $publicacionModel->where('id_usuario', $id)->findAll();

        // Obtener la máquina asociada a cada publicación
        foreach ($publicaciones as &$publicacion) {
            // Obtener la máquina relacionada con la publicación
            $maquina = $maquinaModel->find($publicacion['id_maquina']);

            // Agregar la imagen de la máquina a los datos de la publicación
            if ($maquina) {
                $publicacion['maquina_img'] = $maquina['img'];
            } else {
                $publicacion['maquina_img'] = null; // En caso de que no haya una máquina asociada
            }
        }

        // Verificar el tipo de persona y cargar la vista correspondiente
        if ($persona['tipo_persona'] === 'TECNICO') {
            return view('tecnico_detalle', ['persona' => $persona, 'publicaciones' => $publicaciones]);
        } elseif ($persona['tipo_persona'] === 'CLIENTE') {
            return view('usuario_detalle', ['persona' => $persona, 'publicaciones' => $publicaciones]);
        }
    }






    public function asignarTrabajo($idPublicacion)
    {
        // Obtener el id del técnico desde la sesión
        $idTecnico = session()->get('id');
        
        // Obtener el ID de la máquina a partir de la publicación
        $publicacionModel = new PublicacionModel();
        $publicacion = $publicacionModel->find($idPublicacion);

        if ($publicacion) {
            $idMaquina = $publicacion['id_maquina']; // Asegúrate de obtener el id de la máquina

            // Crear el trabajo
            $trabajoModel = new TrabajosModel();
            $data = [
                'id_tecnico' => $idTecnico,
                'id_maquina' => $idMaquina,
                'estado' => 'pendiente',
                'fecha_creacion' => date('Y-m-d H:i:s'),
            ];
            
            if ($trabajoModel->insert($data)) {
                // Obtener el ID del trabajo recién insertado
                $idTrabajo = $trabajoModel->insertID();

                // Enviar notificación al dueño de la máquina
                $notificacionModel = new NotificacionesModel();
                $notificacionData = [
                    'id_trabajo' => $idTrabajo,
                    'id_tecnico' => $idTecnico,
                    'id_maquina' => $idMaquina,
                    'mensaje' => "El técnico ha solicitado trabajar en tu máquina. ¿Aceptarás su oferta?",
                    'estado' => 'pendiente',  // El estado de la notificación por defecto es 'pendiente'
                    'fecha_creacion' => date('Y-m-d H:i:s'),
                ];
                
                // Insertar la notificación
                if ($notificacionModel->insert($notificacionData)) {
                    return redirect()->back()->with('success', 'Trabajo asignado y notificación enviada exitosamente.');
                } else {
                    return redirect()->back()->with('error', 'Hubo un problema al enviar la notificación.');
                }
            } else {
                return redirect()->back()->with('error', 'Hubo un problema al asignar el trabajo.');
            }
        } else {
            return redirect()->back()->with('error', 'La publicación no existe.');
        }
    }


    public function perfilTecnico()
    {
        $trabajoModel = new TrabajosModel();
        $maquinaModel = new MaquinaModel();

        // Obtener el id_tecnico desde la sesión
        $idTecnico = session()->get('id');

        // Filtrar los trabajos para este técnico
        $trabajos = $trabajoModel->where('id_tecnico', $idTecnico)->findAll();

        // Crear un arreglo para almacenar la información completa de las máquinas
        $trabajosConMaquinas = [];

        // Recorrer los trabajos y obtener la información de la máquina asociada
        foreach ($trabajos as $trabajo) {
            $idMaquina = $trabajo['id_maquina'];

            // Obtener la información de la máquina
            $maquina = $maquinaModel->where('id_maquina', $idMaquina)->first();

            // Agregar la información de la máquina al trabajo
            $trabajo['maquina'] = $maquina;

            // Agregar un campo para determinar si se puede completar
            $trabajo['puede_completar'] = $trabajo['estado'] !== 'pendiente';

            // Almacenar el trabajo con la información de la máquina
            $trabajosConMaquinas[] = $trabajo;
        }

        // Pasar los trabajos con las máquinas a la vista
        return view('servicio_mantenimiento', ['trabajos' => $trabajosConMaquinas]);
    }

    public function completar($id_trabajo)
    {
        $trabajoModel = new TrabajosModel();

        // Buscar el trabajo por su ID
        $trabajo = $trabajoModel->find($id_trabajo);

        // Validar que el trabajo exista y no esté en estado "pendiente"
        if (!$trabajo || $trabajo['estado'] === 'pendiente') {
            return redirect()->back()->with('error', 'No se puede completar un trabajo pendiente.');
        }

        // Actualizar el estado del trabajo a "completado"
        $trabajoModel->update($id_trabajo, ['estado' => 'completado']);
        return redirect()->back()->with('success', 'Trabajo completado con éxito.');
    }


    public function mostrarNotificaciones(){
        
            // Obtener el id del cliente desde la sesión
            $idCliente = session()->get('id');
            $rol = session()->get('tipo_persona'); // Asume que el rol está guardado en la sesión
    
    // Verificar si el rol es 'tecnico'
    if ($rol == 'TECNICO') {
        // Si el rol es técnico, redirigir a la vista de notificaciones del técnico
        return redirect()->to('notificacionesTecnico'); // Cambia esta ruta a la ruta que quieras
    }
            // Crear el modelo de máquinas para obtener las máquinas asociadas al cliente
            $maquinasModel = new MaquinaModel();
            $maquinas = $maquinasModel->where('id_usuario', $idCliente)->findAll(); // Obtener todas las máquinas del cliente
            
            if (empty($maquinas)) {
                // Si no se encuentran máquinas, redirigir o mostrar mensaje
                return redirect()->to('/inicio')->with('error', 'No tienes máquinas registradas.');
            }
            
            // Crear el modelo de notificaciones
            $notificacionesModel = new NotificacionesModel();
            
            // Filtrar las notificaciones para las máquinas del cliente, solo las pendientes
            $notificaciones = $notificacionesModel
                ->whereIn('id_maquina', array_column($maquinas, 'id_maquina')) // Filtrar por las máquinas del cliente
                ->where('estado', 'pendiente') // Solo mostrar las notificaciones pendientes
                ->findAll();
            
            // Pasar las notificaciones a la vista
            return view('notificacion', ['notificaciones' => $notificaciones]);
        
    }
    public function aceptar($idNotificacion)
{
    // Obtener el modelo de Notificaciones y Trabajos
    $notificacionesModel = new NotificacionesModel();
    $trabajoModel = new TrabajosModel();

    // Obtener la notificación por su ID
    $notificacion = $notificacionesModel->find($idNotificacion);

    // Verificar si la notificación existe
    if ($notificacion) {
        // Cambiar el estado de la notificación a 'aceptada'
        $notificacionesModel->update($idNotificacion, ['estado' => 'aceptada']);
        
        // Obtener el ID del trabajo desde la notificación
        $idTrabajo = $notificacion['id_trabajo'];

        // Cambiar el estado del trabajo a 'en espera'
        $trabajoModel->update($idTrabajo, ['estado' => 'en espera']);

        return redirect()->back()->with('success', 'Oferta aceptada correctamente.');
    } else {
        return redirect()->back()->with('error', 'No se encontró la notificación.');
    }
}
public function rechazar($idNotificacion)
{
    // Obtener el modelo de notificaciones
    $notificacionModel = new NotificacionesModel();
    
    // Obtener la notificación que se está rechazando
    $notificacion = $notificacionModel->find($idNotificacion);

    // Eliminar la notificación (puedes agregar la condición de que solo se puede rechazar si la notificación está pendiente)
    $notificacionModel->delete($idNotificacion);

    // Eliminar el trabajo asociado al rechazo
    $trabajoModel = new TrabajosModel();
    $trabajoModel->where('id_trabajo', $notificacion['id_trabajo'])->delete();

    return redirect()->to('/notificaciones')->with('success', 'Trabajo rechazado y notificación eliminada.');
}
public function notificacionesTecnico()
    {
       // Obtener el id del técnico desde la sesión
       $idTecnico = session()->get('id');
        
       // Obtener el modelo de notificaciones
       $notificacionesModel = new NotificacionesModel();
       
       // Obtener todas las notificaciones que correspondan al técnico
       $notificaciones = $notificacionesModel->where('id_tecnico', $idTecnico)->findAll();

       // Pasar las notificaciones a la vista
       return view('notificaciones_tecnico', ['notificaciones' => $notificaciones]);
    }

    
}
