<?php

namespace App\Controllers;

use App\Models\Oferta_modelo;
use App\Models\PersonaModel;
use CodeIgniter\Session\Session;
use App\Controllers\Maquina;

class Restablecer extends BaseController
{
    
    public function index(){
        echo 'soy el index';
        return view('restablecer');

    }

    public function restablecer(){
        $email = $this->request->getPost('email');
        $new_password = $this->request->getPost('new_password');
        // $confirm_new_password = $this->request->getPost('confirm_new_password');

        $personaModel = new PersonaModel(); // Instancia del modelo
        $usuario = $personaModel->where('email', $email)->first(); // Busca al usuario por correo

        /// Obntener el id del usuario
        $id = $usuario['id'];


        if (!$usuario) {
            // Flujo de usuario no encontrado
            // return redirect()->back()->with('error', 'Correo no encontrado.');
            echo 'Correo no encontrado';
            return;
        }

        /// Flujo de usuario encontrado
        /// Datos para actualizar la contraseña
        echo $usuario['email'];
        echo $new_password;
        echo $id;

        // Contraseña encriptada
        $finalPassword =  md5($new_password);

        $data = [
            'email' => $email,
            'contrasena' => $finalPassword,
        ];


       $personaModel->update($id, $data); // Actualiza la contraseña

        echo "DATOS GUARDADOS";
    }
    
}
