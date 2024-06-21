<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWalletTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'seller_id' => [
                'type'           => 'INT',
                'null'           => false,
                'unsigned'       => true,
            ],
            'wallet' => [
                'type'           => 'VARCHAR',
                'constraint'     => '15',
                'null'           => true
            ],
            'saldo' => [
                'type'          => 'decimal',
                'constraint'    => '20,2',
                'null'          => true
            ],
        ]);
        $this->forge->addForeignKey('seller_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_wallet');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_wallet');
    }
}
