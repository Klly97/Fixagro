<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificacionesModel extends Model
{
    protected $table = 'notificaciones'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Llave primaria

    // Campos permitidos para insertar o actualizar
    protected $allowedFields = [
        'id_trabajo',
        'id_tecnico',
        'id_maquina',
        'mensaje',
        'estado',
        'fecha_creacion',
    ];

    // Habilitar timestamps si se usan automáticamente
    protected $useTimestamps = false; // Cambia a true si deseas usar `created_at` y `updated_at`
    
    // Opciones de validación (si es necesario)
    protected $validationRules = [
        'id_trabajo' => 'required|integer',
        'id_tecnico' => 'required|integer',
        'id_maquina' => 'required|integer',
        'mensaje' => 'required|string|max_length[255]',
        'estado' => 'required|string|max_length[10]',
        'fecha_creacion' => 'valid_date',
    ];

    protected $validationMessages = []; // Mensajes de validación personalizados (opcional)
    protected $skipValidation = false; // Saltar validación si no es necesario
}
