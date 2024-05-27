<?php

namespace App\Controllers;

use App\Models\OrdersModel;

class SellerOrders extends BaseController
{
    protected $ordersModel;

    public function __construct()
    {
        $this->ordersModel = new OrdersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Seller | Orders',
            'orders' => $this->ordersModel->getOrdersSeller(user_id()),
        ];
        return view('sellers/orders/index', $data);
    }

    public function detail($orderId)
    {
        $data = [
            'title' => 'Seller | Orders',
            'order' => $this->ordersModel->getDetailOrderSeller($orderId, user_id())
        ];
        return view('sellers/orders/detail', $data);
    }

    public function price()
    {
        $this->ordersModel->update($this->request->getPost('orderId'),
        [
            'harga' => $this->request->getPost('price'),
        ]);

        return redirect()->to('/seller/orders');
    }

    public function reject($orderId)
    {
        $this->ordersModel->update($orderId, [
            'status_order' => 'rejected'
        ]);
        return redirect()->to('/seller/orders');
    }
}
