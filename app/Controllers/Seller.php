<?php

namespace App\Controllers;

class Seller extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Seller | Dashboard'
        ];
        return view('sellers/index', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Seller | Profile'
        ];
        return view('sellers/profile', $data);
    }
}
