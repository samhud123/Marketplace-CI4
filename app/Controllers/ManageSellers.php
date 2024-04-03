<?php

namespace App\Controllers;

use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\UserModel;

class ManageSellers extends BaseController
{
    public function index(): string
    {
        $sellers = new GroupModel();

        $data = [
            'title' => 'Admin | Sellers',
            'sellers' => $sellers->getUsersForGroup(2)
        ];
        return view('admin/sellers/index', $data);
    }

    public function detail($username)
    {
        $seller = new UserModel();

        $data = [
            'title' => 'Admin | Sellers',
            'seller' => $seller->where('username', $username)->first()
        ];
        return view('admin/sellers/detail', $data);
    }
}
