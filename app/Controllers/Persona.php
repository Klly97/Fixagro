<?php

namespace App\Controllers;

use App\Models\PersonaModel;
use App\Models\PublicacionModel;
use App\Models\MaquinaModel;
use App\Models\TrabajosModel;

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

        echo "DATOS GUARDADOS";
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

        return redirect()->to('/')->with('success', 'Perfil actualizado correctamente.');
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
        // Aquí puedes obtener el ID del técnico autenticado (por ejemplo, desde la sesión)
        $idTecnico = session()->get('id');

        // Crear instancia del modelo para Publicación
        $publicacionModel = new PublicacionModel();

        // Obtener los datos de la publicación usando el ID
        $publicacion = $publicacionModel->find($idPublicacion);  // Suponiendo que 'find' devuelve la publicación por su ID

        // Verificar si se obtuvo la publicación
        if ($publicacion) {
            // Obtener la id_maquina de la publicación
            $idMaquina = $publicacion['id_maquina']; // Suponiendo que id_maquina es el campo que almacena el ID de la máquina

            // Crear instancia del modelo para Trabajos
            $trabajoModel = new TrabajosModel();

            // Datos a insertar en la tabla trabajos
            $data = [
                'id_tecnico' => $idTecnico,
                'id_maquina' => $idMaquina,  // Ahora usamos la id_maquina obtenida de la publicación
                'estado' => 'pendiente', // Estado inicial
                'fecha_creacion' => date('Y-m-d H:i:s'),
            ];

            // Insertar el trabajo
            if ($trabajoModel->insert($data)) {
                return redirect()->back()->with('success', 'Trabajo asignado exitosamente.');
            } else {
                // Mostrar errores
                $errors = $trabajoModel->errors();
                var_dump($errors);
                exit();
            }
        } else {
            return redirect()->back()->with('error', 'Publicación no encontrada.');
        }
    }


    public function perfilTecnico()
    {
        $trabajoModel = new TrabajosModel();
        $maquinaModel = new MaquinaModel();  // Cargar el modelo de Maquina

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

            // Almacenar el trabajo con la información de la máquina
            $trabajosConMaquinas[] = $trabajo;
        }

        // Pasar los trabajos con las máquinas a la vista
        
        return view('servicio_mantenimiento', ['trabajos' => $trabajosConMaquinas]);
    }
}
