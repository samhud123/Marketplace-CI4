<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table      = 'tbl_orders';
    protected $primaryKey = 'order_id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $useAutoIncrement = true;
    protected $allowedFields = ['buyer_id', 'service_id', 'pesan', 'harga', 'status_order', 'status_pembayaran', 'confirm_penjual', 'confirm_pembeli'];

    public function getNewOrders($userId)
    {
        return $this->db->table('tbl_orders')
            ->join('tbl_services', 'tbl_services.service_id = tbl_orders.service_id')
            ->where('buyer_id', $userId)
            ->get()->getResultArray();
    }
}
