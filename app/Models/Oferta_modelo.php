<?php

namespace App\Models;

use CodeIgniter\Model;

class Oferta_modelo extends Model
{
    protected $table = 'ofertas'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Clave primaria

    // Campos que pueden ser modificados mediante métodos como save(), insert() y update()
    protected $allowedFields = ['id_cliente', 'tipo_maquina', 'modelo', 'marca', 'descripcion', 'imagen'];


    // Activar el manejo automático de las marcas de tiempo ('fecha_creacion' y 'fecha_actualizacion')
    protected $useTimestamps = true;

    // Configuración de nombres personalizados para las columnas de marcas de tiempo
    protected $createdField  = 'fecha_creacion';     // Columna para la fecha de creación
    protected $updatedField  = 'fecha_actualizacion'; // Columna para la fecha de última actualización

    // Reglas de validación para proteger los datos al guardar o actualizar
    protected $validationRules = [
        'tipo_maquina' => 'required|max_length[255]', // Campo obligatorio, longitud máxima de 255 caracteres
        'modelo'       => 'permit_empty|max_length[255]', // Campo opcional, longitud máxima de 255 caracteres
        'marca'        => 'permit_empty|max_length[255]', // Campo opcional, longitud máxima de 255 caracteres
        'descripcion'  => 'required', // Campo obligatorio
        'imagen'       => 'permit_empty|max_length[255]' // Campo opcional, longitud máxima de 255 caracteres
    ];

    // Mensajes personalizados de error (opcional)
    protected $validationMessages = [
        'tipo_maquina' => [
            'required'   => 'El tipo de máquina es obligatorio.',
            'max_length' => 'El tipo de máquina no debe superar los 255 caracteres.'
        ],
        'descripcion' => [
            'required' => 'La descripción es obligatoria.'
        ]
    ];

    // Permitir o no ignorar la validación (false para no ignorar)
    protected $skipValidation = false;
}

