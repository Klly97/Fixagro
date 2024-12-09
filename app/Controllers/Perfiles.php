<?php 

namespace App\Controllers;

use App\Models\PersonaModel;
use CodeIgniter\Session\Session;

class Perfiles extends BaseController
{

    public function perfil(){
        return view('perfil');
    }

    
    public function crear()
    {
        $avatar = $this->request->getFile('foto');


        $extension = $imagen->getExtension();

        if (in_array($extension, array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'))) {

            $maquinaModel = new PersonaModel();
          
            $nombre_foto = 'foto_' . self::getUltimoId() . '.' . $extension;

            $registros = $maquinaModel->save([
                'tipo_maquina' => $tipo_maquina,
                'modelo' => $modelo,
                'marca' => $marca,
                'img' => $nombre_foto,
                'id_usuario' => $id_usuario,
                'estado' => $estado
            ]);

            $ruta = "./public/img/perfil";

            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, false);
            }

            $imagen->move('./public/img/perfil', $nombre_foto);

            if ($registros) {
               echo $mensaje = "OK#INSERT";
            } else {
               echo $mensaje = "ERROR#INSERT";
            }
        }else{
           echo $mensaje = "NO#INSERT";
        }
    }

}

?>