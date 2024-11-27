<?php

namespace App\Controllers;

use App\Models\Oferta_modelo;

class Oferta_Cliente extends BaseController
{
    // Muestra todas las ofertas
    public function index()
    {
        $model = new Oferta_modelo();
        $data['ofertas'] = $model->findAll(); // Obtiene todas las ofertas

        return view('inicio_cliente', $data); // Carga la vista con los datos
    }

    // Muestra el formulario para crear una nueva oferta
    public function create()
    {
        return view('ofertas/crear'); // Vista para crear una oferta
    }

    // Almacena una nueva oferta en la base de datos
    public function store()
    {
        $model = new Oferta_modelo();
        $archivo = $this->request->getFile('imagen');
        $nombreArchivo = null;
    
        if ($archivo && $archivo->isValid() && !$archivo->hasMoved()) {
            $nombreArchivo = $archivo->getRandomName();
            $archivo->move('uploads', $nombreArchivo);
        }
    
        $model->save([
            'id_cliente'    => session('id'), // Asocia el cliente autenticado
            'tipo_maquina'  => $this->request->getPost('tipo_maquina'),
            'modelo'        => $this->request->getPost('modelo'),
            'marca'         => $this->request->getPost('marca'),
            'descripcion'   => $this->request->getPost('descripcion'),
            'imagen'        => $nombreArchivo,
        ]);
    
        return redirect()->to('/inicio');
    }
    

    // Muestra el formulario para editar una oferta
    public function edit($id)
    {
        $model = new Oferta_modelo();
        $data['oferta'] = $model->find($id); // Busca la oferta por ID

        if (!$data['oferta']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Oferta no encontrada');
        }

        return view('ofertas/editar', $data); // Carga la vista de edición
    }

    // Actualiza una oferta existente
    public function update($id)
    {
        $model = new Oferta_modelo();
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
        $model = new Oferta_modelo();
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
}
