<?php

namespace App\Models;

use CodeIgniter\Model;

class WdModel extends Model
{
    protected $table          = 'tbl_wd';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $allowedFields  = ['seller_id', 'wallet_id', 'jml_wd', 'status_wd', 'created_at'];

    public function getWdBySeller($seller_id)
    {
        return $this->db->table('tbl_wd')
            ->select('tbl_wd.jml_wd, tbl_wd.status_wd, tbl_wd.created_at, tbl_wallet.no_wallet, tbl_wallet.nama_wallet')
            ->join('tbl_wallet', 'tbl_wd.wallet_id = tbl_wallet.id')
            ->where('tbl_wd.seller_id', $seller_id)
            ->orderBy('tbl_wd.created_at', 'DESC')
            ->get()->getResultArray();
    }

    public function getAllWd()
    {
        return $this->db->table('tbl_wd')
            ->select('tbl_wd.id, users.username, users.email, tbl_wd.jml_wd, tbl_wd.status_wd, tbl_wd.created_at, tbl_wallet.no_wallet, tbl_wallet.nama_wallet')
            ->join('tbl_wallet', 'tbl_wd.wallet_id = tbl_wallet.id')
            ->join('users', 'tbl_wd.seller_id = users.id')
            ->orderBy('tbl_wd.created_at', 'DESC')
            ->get()->getResultArray();
    }
}
