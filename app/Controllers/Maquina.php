<?php

namespace App\Controllers;

use App\Models\MaquinaModel;

class Maquina extends BaseController
{
    public function crear()
    {
        $tipo_maquina =  $this->request->getPostGet('tipo_maquina');
        $modelo = $this->request->getPostGet('modelo');
        $marca = $this->request->getPostGet('marca');
        $img = $this->request->getPostGet('img');
        $id_usuario = session('id_usuario');
        $estado = "ACTIVO";
        
        $maquinaModel = new MaquinaModel();

        $registros = $maquinaModel->save([
            'tipo_maquina' => $tipo_maquina,
            'modelo' => $modelo,
            'marca' => $marca,
            'img' => $img,
            'id_usuario' => $id_usuario,
            'estado' => $estado
        ]);

       echo "DATOS GUARDADOS";
    }
}
