<?php

namespace App\Controllers;

use App\Models\PublicacionModel;

class Publicacion extends BaseController
{
    // Muestra todas las ofertas
    public function index()
    {
        $model = new PublicacionModel();
        $data['ofertas'] = $model->findAll(); // Obtiene todas las ofertas

        return view('inicio_cliente', $data); // Carga la vista con los datos
    }

    // Muestra el formulario para crear una nueva oferta
    public function create()
    {
        return view('ofertas/crear'); // Vista para crear una oferta
    }

    public function getPublicacionesMaquina($id_maquina)
    {

        $publi_model = new PublicacionModel();
        $publicaciones = $publi_model->where(["id_maquina" => $id_maquina, "estado" => "ACTIVO"])->findAll();
        return $publicaciones;
    }


    public function historial()
    {
        return view('historial');
    }
    // Almacena una nueva oferta en la base de datos
    public function crear()
    {
        $model = new PublicacionModel();
        $nombreArchivo = null;

        $id_maquina = $this->request->getPostGet('id_maquina');
        $descripcion = $this->request->getPostGet('descripcion');

        $model->save([
            'id_maquina'    => $id_maquina,
            'id_usuario'    => session('id'), // Asocia el cliente autenticado
            'descripcion'   =>  $descripcion
        ]);

        return redirect()->to('/publicacion_maquina/'.$id_maquina);
    }


    // Muestra el formulario para editar una oferta
    public function edit($id)
    {
        $model = new PublicacionModel();
        $data['oferta'] = $model->find($id); // Busca la oferta por ID

        if (!$data['oferta']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Oferta no encontrada');
        }

        return view('ofertas/editar', $data); // Carga la vista de edición
    }

    // Actualiza una oferta existente
    public function update($id)
    {
        $model = new PublicacionModel();
        $oferta = $model->find($id); // Busca la oferta por ID

        if (!$oferta) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Oferta no encontrada');
        }

        $archivo = $this->request->getFile('imagen');
        $nombreArchivo = $oferta['imagen']; // Mantiene la imagen existente por defecto

        // Si se sube una nueva imagen
        if ($archivo && $archivo->isValid() && !$archivo->hasMoved()) {
            $nombreArchivo = $archivo->getRandomName(); // Genera un nuevo nombre para la imagen
            $archivo->move('uploads', $nombreArchivo);  // Mueve la nueva imagen

            // Elimina la imagen anterior si existe
            if (file_exists(FCPATH . 'uploads/' . $oferta['imagen'])) {
                unlink(FCPATH . 'uploads/' . $oferta['imagen']);
            }
        }

        // Actualiza los datos en la base de datos
        $model->update($id, [
            'tipo_maquina' => $this->request->getPost('tipo_maquina'),
            'modelo'       => $this->request->getPost('modelo'),
            'marca'        => $this->request->getPost('marca'),
            'descripcion'  => $this->request->getPost('descripcion'),
            'imagen'       => $nombreArchivo,
        ]);

        return redirect()->to('/inicio'); // Redirige a la lista de ofertas
    }

    // Elimina una oferta
    public function delete($id)
    {
        $model = new PublicacionModel();
        $oferta = $model->find($id); // Busca la oferta por ID

        if (!$oferta) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Oferta no encontrada');
        }

        // Elimina la imagen asociada si existe
        if (file_exists(FCPATH . 'uploads/' . $oferta['imagen'])) {
            unlink(FCPATH . 'uploads/' . $oferta['imagen']);
        }

        $model->delete($id); // Elimina la oferta de la base de datos

        return redirect()->to('/inicio'); // Redirige a la lista de ofertas
    }

    public function getPublicacionesTecnicos()
    {
     
        $publi_model = new PublicacionModel();
        $publicaciones = $publi_model->select("publicaciones.descripcion, publicaciones.id_publicacion, publicaciones.fecha_creacion, c.img, concat(concat(d.nombre, ' '),d.apellido) nombre_persona");
        $publicaciones = $publi_model->join('maquinas c',"c.id_maquina = publicaciones.id_maquina AND c.id_usuario = publicaciones.id_usuario",'join');
        $publicaciones = $publi_model->join('persona d',"d.id = publicaciones.id_usuario",'join');
        $publicaciones = $publi_model->where("publicaciones.estado = 'ACTIVO' AND  EXISTS (SELECT 1 from persona b
			                                                            where b.id = publicaciones.id_usuario
                                                                         AND upper(b.departamento) = ('".session("departamento")."'))")->findAll();
        return $publicaciones;
    }

    public function eliminarPublicacion($id_publicacion)
{
    $publicacionModel = new PublicacionModel();

    if ($publicacionModel->delete($id_publicacion)) {
        return redirect()->back()->with('mensaje', 'Publicación eliminada exitosamente');
    } else {
        return redirect()->back()->with('error', 'Error al eliminar la publicación');
    }
}


}
