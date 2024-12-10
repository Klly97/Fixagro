<?php

namespace App\Controllers;

use App\Models\MaquinaModel;
use App\Models\PublicacionModel;
use App\Models\TrabajosModel;
class Maquina extends BaseController
{

    // vista que muestra informacion de la maquina
    public function maquina($id_maquina)
    {

        $maquina = new Maquina();
        $datos['maquina'] = $maquina->getMaquinaCliente(session('id'), $id_maquina);

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
        } else {
            echo $mensaje = "NO#INSERT";
        }
    }

    public function getMaquinasCliente($id_usuario)
    {

        $maquinaModel = new MaquinaModel();
        $consulta = $maquinaModel->where("id_usuario", $id_usuario)->findAll();
        return $consulta;
    }


    private function getUltimoId()
    {

        $maquinaModel = new MaquinaModel();

        $sentencia = $maquinaModel->select("MAX(id_maquina) id_maquina")->find();

        if ($sentencia) {
            return  $sentencia[0]['id_maquina'] + 1;
        } else {
            return "1";
        }
    }

    public function getMaquinaCliente($id_usuario, $id_maquina)
    {

        $maquinaModel = new MaquinaModel();
        $consulta = $maquinaModel->where(["id_usuario" => $id_usuario, "id_maquina" => $id_maquina])->findAll();
        return $consulta;
    }

    public function completarTrabajo($id_trabajo)
{
    $trabajoModel = new TrabajosModel();
    $maquinaModel = new MaquinaModel();
    $publicacionModel = new PublicacionModel(); // Cargar el modelo de Publicación

    // Obtener el trabajo
    $trabajo = $trabajoModel->find($id_trabajo);

    if (!$trabajo) {
        return redirect()->back()->with('error', 'Trabajo no encontrado.');
    }

    // Obtener la máquina asociada al trabajo
    $maquina = $maquinaModel->find($trabajo['id_maquina']);

    if (!$maquina) {
        return redirect()->back()->with('error', 'Máquina no encontrada.');
    }

    // Obtener la publicación asociada a la máquina
    $publicacion = $publicacionModel->where('id_maquina', $trabajo['id_maquina'])->first();

    if (!$publicacion) {
        return redirect()->back()->with('error', 'Publicación no encontrada.');
    }

    // Pasar los datos a la vista
    return view('finalizar_servicio', [
        'trabajo' => $trabajo,
        'maquina' => $maquina,
        'publicacion' => $publicacion
    ]);
}


    public function guardarSolucion($id_trabajo)
    {
        $trabajoModel = new TrabajosModel();

        // Obtener la información del formulario
        $problemaSolucionado = $this->request->getPost('problema_solucionado');
        $descripcion = $this->request->getPost('descripcion');

        // Actualizar el estado del trabajo
        $trabajoModel->update($id_trabajo, [
            'estado' => 'completado',
            'problema_solucionado' => $problemaSolucionado,
            'descripcion' => $descripcion,
        ]);

        return redirect()->to('/trabajos')->with('success', 'Trabajo completado con éxito.');
    }

    public function actualizar()
{
    $maquinaModel = new MaquinaModel();
    $id_maquina = $this->request->getPost('id_maquina');
    $tipo = $this->request->getPost('tipo');
    $modelo = $this->request->getPost('modelo');
    $marca = $this->request->getPost('marca');
    $imagen = $this->request->getFile('foto');

    // Obtener los datos actuales de la máquina
    $maquinaActual = $maquinaModel->find($id_maquina);

    // Preparar los datos a actualizar
    $datosActualizar = [];

    // Verificar si los campos no están vacíos antes de actualizar
    if (!empty($tipo)) {
        $datosActualizar['tipo_maquina'] = $tipo;
    } else {
        $datosActualizar['tipo_maquina'] = $maquinaActual['tipo_maquina'];
    }

    if (!empty($modelo)) {
        $datosActualizar['modelo'] = $modelo;
    } else {
        $datosActualizar['modelo'] = $maquinaActual['modelo'];
    }

    if (!empty($marca)) {
        $datosActualizar['marca'] = $marca;
    } else {
        $datosActualizar['marca'] = $maquinaActual['marca'];
    }

    // Verificar si se subió una nueva imagen
    if ($imagen && $imagen->isValid()) {
        $extension = $imagen->getExtension();
        if (in_array($extension, ['png', 'jpg', 'jpeg'])) {
            $nombre_foto = 'foto_' . $id_maquina . '.' . $extension;

            // Eliminar la imagen anterior si existía
            if (!empty($maquinaActual['img']) && file_exists('./public/img/maquina/' . $maquinaActual['img'])) {
                unlink('./public/img/maquina/' . $maquinaActual['img']);
            }

            // Mover la nueva imagen
            $imagen->move('./public/img/maquina', $nombre_foto);
            $datosActualizar['img'] = $nombre_foto;
        }
    }

    // Actualizar los datos en la base de datos
    $resultado = $maquinaModel->update($id_maquina, $datosActualizar);

    if ($resultado) {
        return redirect()->to(base_url('publicacion_maquina/' . $id_maquina) . '?v=' . time())->with('mensaje', 'Máquina actualizada con éxito.');
    } else {
        return redirect()->back()->with('error', 'No se pudo actualizar la máquina.');
    }
}


public function eliminar($id_maquina)
{
    $db = db_connect();

    // Eliminar las notificaciones relacionadas primero
    $db->table('notificaciones')->where('id_maquina', $id_maquina)->delete();
    // Eliminar los trabajos relacionados
    $db->table('trabajos')->where('id_maquina', $id_maquina)->delete();

    // Luego eliminar la máquina
    $db->table('maquinas')->where('id_maquina', $id_maquina)->delete();

    return redirect()->to(base_url('/inicio'))->with('mensaje', 'Máquina y publicaciones eliminadas con éxito.');
}

}
