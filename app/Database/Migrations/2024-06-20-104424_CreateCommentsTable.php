<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'service_id' => [
                'type'          => 'INT',
                'null'          => false,
                'unsigned'      => true,
            ],
            'buyer_id' => [
                'type'           => 'INT',
                'null'           => false,
                'unsigned'      => true,
            ],
            'rating' => [
                'type'           => 'INT',
                'constraint'     => 1,
                'null'           => false,
            ],
            'comment' => [
                'type'  => 'TEXT',
                'null'  => false,
            ],
            'created_at'    => ['type' => 'datetime', 'null' => true],
            'updated_at'    => ['type' => 'datetime', 'null' => true],
            'deleted_at'    => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addForeignKey('service_id', 'tbl_services', 'service_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('buyer_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_comments');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_comments');
    }
}
