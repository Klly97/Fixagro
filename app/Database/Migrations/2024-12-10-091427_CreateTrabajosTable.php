<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTrabajosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_trabajo' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_tecnico' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'id_publicacion' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'estado_trabajo' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'fecha_creacion' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'fecha_modificacion' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_trabajo');
        // Actualiza las claves foráneas para que apunten a la tabla correcta
        $this->forge->addForeignKey('id_tecnico', 'tecnicos', 'id_tecnico', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_publicacion', 'publicaciones', 'id_publicacion', 'CASCADE', 'CASCADE');
        $this->forge->createTable('trabajos');
    }

    public function down()
    {
        $this->forge->dropTable('trabajos');
    }
}
