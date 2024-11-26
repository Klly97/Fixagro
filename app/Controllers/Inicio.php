<?php

namespace App\Controllers;

use App\Models\PersonaModel;
use CodeIgniter\Session\Session;
use App\Controllers\Maquina;

class Inicio extends BaseController
{
    
    public function index()
    {
        return view('inicio_sesion');
    }

    public function inicio()
    {
        $tipo_persona=session('tipo_persona');

        if (isset($tipo_persona)) {
            if ($tipo_persona == "CLIENTE") {

                $maquina = new Maquina();
                $datos['maquinas'] = $maquina->getMaquinasCliente(session('id'));
                return view('inicio_cliente',$datos);
            } elseif ($tipo_persona == "TECNICO") {
                return view('inicio_tecnico');
            }
        }else{
            return redirect('login');
        }
        
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

        session()->destroy();
       
        echo view('inicio_sesion');

    }
}
