<?php

namespace App\Models;

use CodeIgniter\Model;

class WalletModel extends Model
{
    protected $table          = 'tbl_wallet';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $allowedFields  = ['seller_id', 'wallet', 'saldo'];

}