<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaOfertas extends Migration
{
    public function up()
    {
        // Definimos los campos de la tabla "ofertas"
        
            $this->forge->addField([
                'id'             => ['type' => 'INT', 'auto_increment' => true],
                'id_cliente'     => ['type' => 'INT', 'null' => false], // ID del cliente que crea la oferta
                'tipo_maquina'   => ['type' => 'VARCHAR', 'constraint' => 255],
                'modelo'         => ['type' => 'VARCHAR', 'constraint' => 255],
                'marca'          => ['type' => 'VARCHAR', 'constraint' => 255],
                'descripcion'    => ['type' => 'TEXT'],
                'imagen'         => ['type' => 'VARCHAR', 'constraint' => 255],
                'fecha_creacion' => ['type' => 'DATETIME', 'null' => true],
                'fecha_actualizacion' => ['type' => 'DATETIME', 'null' => true],
            ]);
        
           
        
        
        // Definimos la clave primaria de la tabla
        $this->forge->addKey('id', true);
        // Creamos la tabla "ofertas"
        $this->forge->createTable('ofertas');
    }

    public function down()
    {
        // Eliminamos la tabla "ofertas" si existe
        $this->forge->dropTable('ofertas');
    }
}
