<?php

namespace App\Controllers;

use App\Models\OrdersModel;
use App\Models\CategoriesModel;
use Myth\Auth\Models\UserModel;

class BuyerHistory extends BaseController
{
    protected $userModel, $ordersModel, $categories;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->ordersModel = new OrdersModel();
        $this->categories =  new CategoriesModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Buyer | History',
            'orders' => $this->ordersModel->getNewOrders(user_id()),
            'categories'    => $this->categories->findAll(),
        ];
        return view('buyers/history/index', $data);
    }

    public function detail($orderId)
    {
        $data = [
            'title' => 'Buyer | History',
            'order' => $this->ordersModel->getDetailOrderBuyer($orderId, user_id()),
            'categories' => $this->categories->findAll(),
        ];
        return view('buyers/history/detail', $data);
    }
}