<?php 

namespace App\Controllers;

use App\Models\PersonaModel;
use CodeIgniter\Session\Session; 
use App\Controllers\Maquina;

class Perfiles extends BaseController
{

    public function publicacion_maquina($id_maquina){

        $maquina = new Maquina();
        $datos['maquina'] = $maquina->getMaquinaCliente(session('id'),$id_maquina);
        return view('publicacion_maquina', $datos);
    }

    public function historial(){
        return view('historial');
    }
    public function perfil(){
        return view('perfil');
    }

    public function servicio_mantenimiento(){
        return view('servicio_mantenimiento');
    }





}

?>