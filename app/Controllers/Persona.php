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
            'tipo_persona' =>  "CLIENTE",
            'avatar' => 'xaSASasasas'
        ]);

       echo "DATOS GUARDADOS";
    }
}
