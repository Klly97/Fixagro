<?php 

namespace App\Controllers;

use App\Models\PersonaModel;
use CodeIgniter\Session\Session;

class Perfiles extends BaseController
{

    public function perfil(){
        return view('perfil');
    }

    public function servicio_mantenimiento(){
        return view('servicio_mantenimiento');
    }

}

?>