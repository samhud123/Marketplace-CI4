<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdersModel;

class AdminReports extends BaseController
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrdersModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Admin | Reports',
            'orders' => $this->orderModel->getAllOrders()
        ];
        return view('admin/reports/index', $data);
    }

    public function search()
    {
        $query = $this->request->getGet('keyword');

        $data = [
            'title' => 'Admin | Reports',
            'orders' => $this->orderModel->searchAll($query)
        ];

        // dd($data['orders']);

        return view('admin/reports/index', $data);
    }
}
