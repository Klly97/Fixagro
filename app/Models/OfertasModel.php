<?php

namespace App\Models;

use CodeIgniter\Model;

class OfertasModel extends Model
{
    protected $table      = 'ofertas'; // Nombre de tabla
    protected $primaryKey = 'id'; // Llave primaria

    protected $useAutoIncrement = true; // si requerimos que se genere un valor auto incrementable a la primary key (si en el modelo ya lo tenemos en autoincrement, no es necesario onerlo true)    

    protected $returnType = 'array'; // object o array
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_publicacion','id_tecnico','id_persona','estado'];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
    protected $useTimestamps = true;
    protected $dateFormat   = 'datetime'; //date //int
    protected $createdField  = 'id_publicacion';
    protected $updatedField  = 'fec_actu';
   // protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
