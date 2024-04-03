<?php

namespace App\Controllers;

use Myth\Auth\Models\GroupModel;

class ManageBuyers extends BaseController
{
    public function index(): string
    {
        $buyers = new GroupModel();

        $data = [
            'title' => 'Admin | Buyers',
            'buyers' => $buyers->getUsersForGroup(3)
        ];
        return view('admin/buyers/index', $data);
    }
}
