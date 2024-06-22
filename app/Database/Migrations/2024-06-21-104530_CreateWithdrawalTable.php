<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWithdrawalTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'seller_id' => [
                'type'           => 'INT',
                'null'           => false,
                'unsigned'       => true,
            ],
            'wallet_id' => [
                'type'           => 'INT',
                'null'           => false,
            ],
            'jml_wd' => [
                'type'          => 'decimal',
                'constraint'    => '20,2',
                'null'          => true
            ],
            'status_wd' => [
                'type' => 'ENUM',
                'constraint' => "'process', 'success', 'failed'",
                'default' => 'process'
            ],
            'created_at'    => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addForeignKey('seller_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('wallet_id', 'tbl_wallet', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_wd');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_wd');
    }
}
