<?php

namespace App\Controllers;

use App\Models\OrdersModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\UserModel;

class ManageBuyers extends BaseController
{
    public function index(): string
    {
        $buyers = new GroupModel();

        $data = [
            'title' => 'Admin | Buyers',
            'buyers' => $buyers->getUsersForGroup(3)
        ];
        // dd($data);
        return view('admin/buyers/index', $data);
    }

    public function disabled($id)
    {
        $buyer = new UserModel();

        $buyer->update($id, [
            'active' => 0
        ]);

        return redirect()->to('admin/buyers');
    }

    public function enabled($id)
    {
        $buyer = new UserModel();

        $buyer->update($id, [
            'active' => 1
        ]);

        return redirect()->to('admin/buyers');
    }

    public function detail($username)
    {
        $buyers = new UserModel();
        $orders = new OrdersModel();

        $getBuyers = $buyers->where('username', $username)->first();

        $data = [
            'title' => 'Admin | Buyers',
            'buyer' => $getBuyers,
            'orders' => $orders->getOrdersByBuyer($getBuyers->id)
        ];
        return view('admin/buyers/detail', $data);
    }
}
