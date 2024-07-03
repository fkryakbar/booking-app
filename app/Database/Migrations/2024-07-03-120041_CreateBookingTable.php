<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingTable extends Migration
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
            'user_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tour_date' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'from' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'paket_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tipe_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'paket_price' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tipe_price' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'price_total' => [
                'type'       => 'NUMERIC',
                'constraint' => '65',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'invoice_path' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
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
        $this->forge->createTable('bookings');
    }

    public function down()
    {
        $this->forge->dropTable('bookings');
    }
}
