<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\UserModel;

class ManageSellers extends BaseController
{
    public function index(): string
    {
        $sellers = new GroupModel();

        $data = [
            'title' => 'Admin | Sellers',
            'sellers' => $sellers->getUsersForGroup(2),
        ];
        return view('admin/sellers/index', $data);
    }

    public function disabled($id)
    {
        $seller = new UserModel();

        $seller->update($id, [
            'active' => 0
        ]);

        return redirect()->to('/admin/sellers');
    }

    public function enabled($id)
    {
        $seller = new UserModel();

        $seller->update($id, [
            'active' => 1
        ]);

        return redirect()->to('/admin/sellers');
    }

    public function detail($username)
    {
        $seller = new UserModel();
        $services = new ServiceModel();

        $getSeller = $seller->where('username', $username)->first();

        $data = [
            'title' => 'Admin | Sellers',
            'seller' => $getSeller,
            'services' => $services->where('user_id', $getSeller->id)->findAll()
        ];
        return view('admin/sellers/detail', $data);
    }
}
