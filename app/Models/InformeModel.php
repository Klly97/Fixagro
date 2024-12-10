<?php

namespace App\Models;

use CodeIgniter\Model;

class InformeModel extends Model
{
    protected $table = 'informes'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Llave primaria de la tabla

    protected $useAutoIncrement = true; // Para que la llave primaria sea autoincrementable

    protected $returnType = 'array'; // Tipo de retorno (array)
    protected $useTimestamps = false; // Deshabilitar el uso de timestamps automáticos

    protected $allowedFields = [
        'id_publicacion', 
        'id_usuario_tec', 
        'tipo_maquina', 
        'modelo', 
        'marca', 
        'descripcion_publicacion', 
        'problema_solucionado', 
        'descripcion_trabajo', 
        'nombre_dueño', 
        'fecha_finalizacion'
    ];

    // Validación de los campos
    protected $validationRules = [
        'id_publicacion' => 'required|is_not_unique[publicaciones.id_publicacion]',
        'id_usuario_tec' => 'required|integer',
        'tipo_maquina' => 'required|string|max_length[255]',
        'modelo' => 'required|string|max_length[255]',
        'marca' => 'required|string|max_length[255]',
        'descripcion_publicacion' => 'required|string',
        'problema_solucionado' => 'required|string',
        'descripcion_trabajo' => 'required|string',
        'nombre_dueño' => 'required|string|max_length[255]',
        'fecha_finalizacion' => 'required|valid_date'
    ];

    protected $validationMessages = [
        // Mensajes de error personalizados si se requiere
    ];

    protected $skipValidation = false;
}
