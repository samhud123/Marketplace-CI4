<?php

namespace App\Controllers;

class SellerOrders extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Seller | Orders'
        ];
        return view('sellers/orders/index', $data);
    }
}
