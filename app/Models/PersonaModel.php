<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonaModel extends Model
{
    protected $table      = 'persona'; // Nombre de tabla
    protected $primaryKey = 'id'; // Llave primaria

    protected $useAutoIncrement = true; // si requerimos que se genere un valor auto incrementable a la primary key (si en el modelo ya lo tenemos en autoincrement, no es necesario onerlo true)    

    protected $returnType = 'array'; // object o array
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'apellido','direccion', 'municipio', 'departamento','telefono', 'email', 'contrasena', 'estado', 'tipo_persona', 'avatar'];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
    protected $useTimestamps = true;
    protected $dateFormat   = 'datetime'; //date //int
    protected $createdField  = 'fecha_registro';
    protected $updatedField  = 'fecha_registro';
   // protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
