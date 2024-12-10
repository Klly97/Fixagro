<?php 

namespace App\Controllers;

use App\Models\PersonaModel;
use CodeIgniter\Session\Session;

class Ofertas extends BaseController
{

    public function index(){
        return view('ofertas');
    }

}

?>