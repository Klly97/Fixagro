<?php

namespace App\Controllers;

use App\Models\MaquinaModel;

class Maquina extends BaseController
{
    
    // vista que muestra informacion de la maquina
    public function maquina ($id_maquina){

        $maquina = new Maquina();
        $datos['maquina'] = $maquina->getMaquinaCliente(session('id'),$id_maquina);

        $publicaciones_maquina = new Publicacion();
        $datos['publicaciones'] = $publicaciones_maquina->getPublicacionesMaquina($id_maquina);
        return view('publicacion_maquina', $datos);
    }

    public function crear()
    {
        $tipo_maquina =  $this->request->getPostGet('tipo');
        $modelo = $this->request->getPostGet('modelo');
        $marca = $this->request->getPostGet('marca');
        $id_usuario = session('id');
        $estado = "ACTIVO";
        $imagen = $this->request->getFile('foto');


        $extension = $imagen->getExtension();

        if (in_array($extension, array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'))) {

            $maquinaModel = new MaquinaModel();
          
            $nombre_foto = 'foto_' . self::getUltimoId() . '.' . $extension;

            $registros = $maquinaModel->save([
                'tipo_maquina' => $tipo_maquina,
                'modelo' => $modelo,
                'marca' => $marca,
                'img' => $nombre_foto,
                'id_usuario' => $id_usuario,
                'estado' => $estado
            ]);

            $ruta = "./public/img/maquina";

            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, false);
            }

            $imagen->move('./public/img/maquina', $nombre_foto);

            if ($registros) {
               echo $mensaje = "OK#INSERT";
            } else {
               echo $mensaje = "ERROR#INSERT";
            }
        }else{
           echo $mensaje = "NO#INSERT";
        }
    }

    public function getMaquinasCliente($id_usuario){
        
        $maquinaModel = new MaquinaModel();
        $consulta = $maquinaModel->where("id_usuario", $id_usuario)->findAll();
        return $consulta;
    }
    

    private function getUltimoId(){

        $maquinaModel = new MaquinaModel();

        $sentencia = $maquinaModel->select("MAX(id_maquina) id_maquina")->find();

        if ($sentencia) {
            return  $sentencia[0]['id_maquina'] + 1;
        }else{
            return "1";
        }
    }

    public function getMaquinaCliente($id_usuario,$id_maquina){
        
        $maquinaModel = new MaquinaModel();
        $consulta = $maquinaModel->where(["id_usuario" => $id_usuario, "id_maquina" => $id_maquina])->findAll();
        return $consulta;
    }
}
