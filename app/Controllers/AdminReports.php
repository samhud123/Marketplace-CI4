<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdersModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminReports extends BaseController
{
    public function index()
    {
        $orderModel = new OrdersModel();

        $data = [
            'title' => 'Admin | Reports',
            'orders' => $orderModel->findAll()
        ];
        return view('admin/reports/index', $data);
    }
}
