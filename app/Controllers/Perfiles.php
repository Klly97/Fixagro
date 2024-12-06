<?php 

namespace App\Controllers;

use App\Models\PersonaModel;
use CodeIgniter\Session\Session; 
use App\Controllers\Maquina;

class Perfiles extends BaseController
{

    public function publicacion_historial_maquina($id_maquina){

        $maquina = new Maquina();
        $datos['maquina'] = $maquina->getMaquinaCliente(session('id'),$id_maquina);
        return view('publicacion_historial_maquina', $datos);
    }

    public function ventanaFin(){
        return view('ventanaFin');
    }

    public function historial(){
        return view('historial');
    }

    public function servicio_mantenimiento(){
        return view('servicio_mantenimiento');
    }





}

?>