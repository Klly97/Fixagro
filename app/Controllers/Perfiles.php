<?php 

namespace App\Controllers;

use App\Models\PersonaModel;
use CodeIgniter\Session\Session; 

class Perfiles extends BaseController
{

    public function publicacion_historial_maquina(){
        return view('publicacion_historial_maquina');
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