<?php 

namespace App\Controllers;

use App\Models\PersonaModel;
use CodeIgniter\Session\Session;

class Perfiles extends BaseController
{

    public function perfil(){
        return view('perfil');
    }

    public function crearfotoperfil()
    {
        $avatar = $this->request->getFile('avatar');


        $extension = $avatar->getExtension();

        if (in_array($extension, array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'))) {

            $maquinaModel = new PersonaModel();
          
            $nombre_foto = 'foto_' . self::getUltimoId() . '.' . $extension;

            $registros = $personaModel->save([
               
                'avatar' => $avatar
            ]);

            $ruta = "./public/img/perfil";

            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, false);
            }

            $avatar->move('./public/img/perfil', $nombre_foto);

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