<?php

namespace App\Models;

use CodeIgniter\Model;

class TrabajosModel extends Model
{
    protected $table = 'trabajos'; // Nombre de la tabla
    protected $primaryKey = 'id_trabajo'; // Llave primaria

    protected $useAutoIncrement = true; // La columna `id_trabajo` usa auto_increment

    protected $returnType = 'array'; // Los resultados se devolverán como un arreglo asociativo
    protected $useSoftDeletes = false; // No se está manejando soft deletes

    protected $allowedFields = [
        'id_tecnico', 
        'id_maquina', 
        'estado', 
        'fecha_creacion', 
        'fecha_finalizacion'
    ]; // Campos permitidos para inserción/actualización

    protected $useTimestamps = false; // No se usarán automáticamente timestamps
    protected $createdField  = ''; // No se define campo de creación automático
    protected $updatedField  = ''; // No se define campo de modificación automática

    // Validaciones
    protected $validationRules = [
        'id_tecnico' => 'required|is_natural_no_zero',
        'id_maquina' => 'required|is_natural_no_zero',
        'estado' => 'required|max_length[50]',
        'fecha_creacion' => 'required|valid_date',
        'fecha_finalizacion' => 'permit_empty|valid_date',
    ];

    protected $validationMessages = [
        'id_tecnico' => [
            'required' => 'El campo técnico es obligatorio.',
            'is_natural_no_zero' => 'El ID del técnico debe ser un número mayor a 0.',
        ],
        'id_maquina' => [
            'required' => 'El campo publicación es obligatorio.',
            'is_natural_no_zero' => 'El ID de la publicación debe ser un número mayor a 0.',
        ],
        'estado' => [
            'required' => 'El estado es obligatorio.',
            'max_length' => 'El estado no puede tener más de 50 caracteres.',
        ],
        'fecha_creacion' => [
            'required' => 'La fecha de creación es obligatoria.',
            'valid_date' => 'La fecha de creación debe ser válida.',
        ],
        'fecha_finalizacion' => [
            'valid_date' => 'La fecha de finalización debe ser válida.',
        ],
    ];

    protected $skipValidation = false; // No saltar la validación por defecto
}
