<?php

namespace App\Controllers;

use App\Models\OrdersModel;

class Seller extends BaseController
{
    protected $ordersModel;

    public function __construct()
    {
        $this->ordersModel = new OrdersModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Seller | Dashboard',
            'orders_complate' => $this->ordersModel->where('seller_id', user_id())->where('status_order', 'success')->countAllResults(),
            'incoming_orders' => $this->ordersModel->where('seller_id', user_id())->where('status_order', 'process')->orWhere('status_order', 'approved')->countAllResults(),
            'orders_failed' => $this->ordersModel->where('seller_id', user_id())->where('status_order', 'rejected')->orWhere('status_order', 'cancelled')->countAllResults(),
        ];

        return view('sellers/index', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Seller | Profile'
        ];
        return view('sellers/profile', $data);
    }
}
