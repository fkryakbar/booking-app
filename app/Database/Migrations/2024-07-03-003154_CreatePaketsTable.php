<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePaketsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'price' => [
                'type'       => 'NUMERIC',
                'constraint' => '65',
            ],
            'destination' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'image_path' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type'       => 'TEXT',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pakets');
    }

    public function down()
    {
        $this->forge->dropTable('pakets');
    }
}
