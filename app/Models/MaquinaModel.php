<?php

namespace App\Models;

use CodeIgniter\Model;

class MaquinaModel extends Model
{
    protected $table      = 'maquinas'; // Nombre de tabla
    protected $primaryKey = 'id_maquina'; // Llave primaria

    protected $useAutoIncrement = true; // si requerimos que se genere un valor auto incrementable a la primary key (si en el modelo ya lo tenemos en autoincrement, no es necesario onerlo true)    

    protected $returnType = 'array'; // object o array
    protected $useSoftDeletes = false;

    protected $allowedFields = ['tipo_maquina', 'modelo','marca', 'img', 'id_usuario', 'estado'];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
    protected $useTimestamps = true;
    protected $dateFormat   = 'datetime'; //date //int
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_creacion';
   // protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
