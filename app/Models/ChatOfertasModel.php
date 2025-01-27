<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatOfertas extends Model
{
    protected $table      = 'chat_ofertas'; // Nombre de tabla
    protected $primaryKey = 'id'; // Llave primaria

    protected $useAutoIncrement = true; // si requerimos que se genere un valor auto incrementable a la primary key (si en el modelo ya lo tenemos en autoincrement, no es necesario onerlo true)    

    protected $returnType = 'array'; // object o array
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_publicacion','destinatario','remitente','mensaje','estado'];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
    protected $useTimestamps = true;
    protected $dateFormat   = 'datetime'; //date //int
    protected $createdField  = 'fec_envio';
    protected $updatedField  = 'fec_envio';
   // protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
