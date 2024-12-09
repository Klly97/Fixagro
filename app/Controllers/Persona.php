<?php

namespace App\Controllers;

use App\Models\PersonaModel;

class Persona extends BaseController
{
    public function crear()
    {
        $nombre =  $this->request->getPostGet('nombre');
        $apellido = $this->request->getPostGet('apellido');
        $telefono = $this->request->getPostGet('telefono');
        $direccion = $this->request->getPostGet('direccion');
        $municipio = $this->request->getPostGet('municipio');
        $departamento = $this->request->getPostGet('departamento');
        $correo = $this->request->getPostGet('correo');
        $contrasena =  md5($this->request->getPostGet('contrasena'));
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
        $usuarioId = session()->get('id');
        $personaModel = new PersonaModel();
        $usuario = $personaModel->find($usuarioId);
        // Obtener los datos del formulario
        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('new_password');




        // Suponiendo que tienes el ID del usuario en sesión
        $usuario = $personaModel->find(session()->get('id'));

        if (md5($oldPassword) === $usuario['contrasena']) {
            // Si la contraseña actual es correcta, actualizar la nueva contraseña
            $newHashedPassword = md5($newPassword); // O usa password_hash() para mayor seguridad
            $personaModel->update($usuario['id'], ['contrasena' => $newHashedPassword]);
            return redirect()->to('/login')->with('mensaje', 'Contraseña actualizada correctamente');
        } else {
            return redirect()->to('/perfil')->with('error', 'Contraseña actual incorrecta');
        }
    }

    public function eliminarPersona()
    {
        // Obtener el ID de la persona desde el formulario
        $usuarioId = session()->get('id');
        $personaModelo = new PersonaModel();
        

        if($personaModelo->delete($usuarioId)){
            return redirect()->to('/login')->with('mensaje', 'exito en eliminar');
        }else{
            return redirect()->back()->with('error', 'Error al eliminar la persona');
        }
    }
}
