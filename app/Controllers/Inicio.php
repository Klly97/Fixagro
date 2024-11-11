<?php

namespace App\Controllers;

use App\Models\PersonaModel;
use CodeIgniter\Session\Session; 

class Inicio extends BaseController
{
    
    public function index()
    {
        return view('inicio_sesion');
    }

    public function inicio()
    {
        return view('perfilCliente');
    }

  
    // Aca validamos los datos para el inicio de sesion
    public function validarDatosIngreso()
    {
        $correo = $this->request->getPostGet('correo');
        $contrasena =  md5($this->request->getPostGet('contrasena'));
        $mensaje = "";
        $personaModel = new PersonaModel();
        // cosnultamos el usario con la contraseña y correo ingresados en la vista
        $registros = $personaModel->where(['email' => $correo, 'contrasena' => $contrasena])->find();

        if (count($registros) == 0) {
            $mensaje = 'DATOS_INCORRECTOS';
        } else {
            if ($registros[0]["estado"] == "INACTIVO") {
                $mensaje = 'USUARIO_INACTIVO';
            } else if ($registros[0]["estado"] == "ACTIVO") {

                $this->session->set([
                    'correo' => $registros[0]['email'],
                    'id' => $registros[0]['id'],
                    'tipo_persona' => $registros[0]['tipo_persona'],
                    'nombre' => $registros[0]['nombre'],
                    'apellido' => $registros[0]['apellido'],
                    'municipio' => $registros[0]['municipio'],
                    'departamento' => $registros[0]['departamento']

                ]); //creamos la sesión con un objeto llamado username
                $mensaje = 'DATOS_CORRECTOS';
            }
        }
      
        echo $mensaje;
    }

    public function selec_registro()
    {
        return view('selec_registro');
    }
    public function registroSoli(){
        return view('registroSoli');
    }
    public function ventanaFin(){
        return view('ventanaFin');
    }

    public function vRegistro($opcion)
    {
        $data = ['opcion' => $opcion];
        return view('registro', $data);
    }

    public function redirecInicio()
    {
        return $this->response->redirect(base_url('inicio'));
    }

    public function cerrarSesion()
    {
        $this>session()->destroy();
        echo view('inicio_sesion');
        die();
    }
}
