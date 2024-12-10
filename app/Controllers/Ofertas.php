<?php 

namespace App\Controllers;

use App\Models\OfertasModel;
use App\Models\PersonaModel;
use CodeIgniter\Session\Session;

class Ofertas extends BaseController
{

    public function index(){
        return view('ofertas');
    }

    
    public function crear()
    {
        $id_publicacion =  $this->request->getPostGet('id_publicacion');
        $id_tecnico =  $this->request->getPostGet('id_tecnico');
        $id_persona =  $this->request->getPostGet('id_persona');

        $estado = "ENVIADA";

        $ofertasModel = new OfertasModel();

        $registros = $ofertasModel->save([
            'id_publicacion' => $id_publicacion,
            'id_tecnico' => $id_tecnico,
            'id_persona' => $id_persona,
            'estado' => $estado]);

        echo "DATOS GUARDADOS";
    }


}

?>