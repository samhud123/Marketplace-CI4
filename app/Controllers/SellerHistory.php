<?php

namespace App\Controllers;

use App\Models\OrdersModel;

class SellerHistory extends BaseController
{
    protected $ordersModel;

    public function __construct()
    {
        $this->ordersModel = new OrdersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Seller | Reports',
            'orders' => $this->ordersModel->getOrdersSeller(user_id()),
        ];
        return view('sellers/history/index', $data);
    }

    public function detail($orderId)
    {
        $data = [
            'title' => 'Seller | Orders',
            'order' => $this->ordersModel->getDetailOrderSeller($orderId, user_id())
        ];
        return view('sellers/history/detail', $data);
    }

    public function search()
    {
        $query = $this->request->getGet('keyword');

        $data = [
            'title' => 'Seller | Reports',
            'orders' => $this->ordersModel->searchBuyer(user_id(), $query),
        ];

        return view('sellers/history/search', $data);
    }
}
