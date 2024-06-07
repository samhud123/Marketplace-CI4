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
    protected $allowedFields = ['buyer_id', 'id_transaksi', 'seller_id', 'service_id', 'pesan', 'harga', 'token', 'status_order', 'status_pembayaran', 'confirm_penjual', 'confirm_pembeli'];

    // order buyer
    public function getNewOrders($userId)
    {
        return $this->db->table('tbl_orders')
            ->join('tbl_services', 'tbl_services.service_id = tbl_orders.service_id')
            ->where('buyer_id', $userId)
            ->get()->getResultArray();
    }

    // order seller
    public function getOrdersSeller($sellerId)
    {
        return $this->db->table('tbl_orders')
            ->select('tbl_orders.order_id, users.username, users.email, tbl_services.judul, tbl_orders.created_at, tbl_orders.harga, tbl_orders.status_order')
            ->join('tbl_services', 'tbl_services.service_id = tbl_orders.service_id')
            ->join('users', 'tbl_orders.buyer_id = users.id')
            ->where('seller_id', $sellerId)
            ->get()->getResultArray();
    }

    // order detail seller
    public function getDetailOrderSeller($orderId, $sellerId)
    {
        return $this->db->table('tbl_orders')
            ->join('tbl_services', 'tbl_services.service_id = tbl_orders.service_id')
            ->join('users', 'tbl_orders.buyer_id = users.id')
            ->where('order_id', $orderId)
            ->where('seller_id', $sellerId)
            ->get()->getRowObject();
    }

    // order detail seller
    public function getDetailOrderBuyer($orderId, $buyerId)
    {
        return $this->db->table('tbl_orders')
            ->join('tbl_services', 'tbl_services.service_id = tbl_orders.service_id')
            ->join('users', 'tbl_orders.seller_id = users.id')
            ->where('order_id', $orderId)
            ->where('buyer_id', $buyerId)
            ->get()->getRowObject();
    }

    // search buyer
    public function searchBuyer($sellerId, $keyword)
    {
        return $this->db->table('tbl_orders')
            ->join('tbl_services', 'tbl_services.service_id = tbl_orders.service_id')
            ->join('users', 'tbl_orders.buyer_id = users.id')
            ->like('username', $keyword)
            ->orLike('nama', $keyword)
            ->orLike('email', $keyword)
            ->where('seller_id', $sellerId)
            ->get()->getResultArray();
    }

    // reports admin
    public function getAllOrders()
    {
        return $this->table('tbl_orders')
            ->select('tbl_orders.order_id, buyer.username as buyer, buyer.email as emailBuyer, seller.email as emailSeller, seller.username as seller, tbl_services.judul, tbl_orders.harga, tbl_orders.status_order, tbl_orders.created_at')
            ->join('tbl_services', 'tbl_services.service_id = tbl_orders.service_id')
            ->join('users as buyer', 'tbl_orders.buyer_id = buyer.id')
            ->join('users as seller', 'tbl_orders.seller_id = seller.id')
            ->orderBy('tbl_orders.order_id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function searchAll($keyword)
    {
        return $this->db->table('tbl_orders')
            ->select('tbl_orders.order_id, buyer.username as buyer, buyer.email as emailBuyer, seller.email as emailSeller, seller.username as seller, tbl_services.judul, tbl_orders.harga, tbl_orders.status_order, tbl_orders.created_at')
            ->join('tbl_services', 'tbl_services.service_id = tbl_orders.service_id')
            ->join('users as buyer', 'tbl_orders.buyer_id = buyer.id')
            ->join('users as seller', 'tbl_orders.seller_id = seller.id')
            ->like('buyer.username', $keyword)
            ->orLike('seller.username', $keyword)
            ->orLike('buyer.email', $keyword)
            ->orLike('seller.email', $keyword)
            ->orLike('tbl_services.judul', $keyword)
            ->get()->getResultArray();
    }
}
