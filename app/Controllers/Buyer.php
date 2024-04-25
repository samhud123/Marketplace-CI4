<?php

namespace App\Controllers;

use App\Models\OrdersModel;
use Myth\Auth\Models\UserModel;

class Buyer extends BaseController
{
    protected $userModel, $ordersModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->ordersModel = new OrdersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Buyer | Profile'
        ];
        return view('buyers/index', $data);
    }

    public function saveProfile()
    {
        $profile = $this->userModel->where('id', user_id())->first();

        if ($profile->username == $this->request->getPost('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|is_unique[users.username]';
        }

        if ($profile->email == $this->request->getPost('email')) {
            $rule_email = 'required';
        } else {
            $rule_email = 'required|valid_email|is_unique[users.email,id,{id}]';
        }

        $validation = [
            'username'  => $rule_username,
            'email'     => $rule_email
        ];

        if (!$this->validate($validation)) {
            return redirect()->to('/buyer')->withInput()->with('errors', $this->validator->getErrors());
        } else {
            $this->userModel->update(user_id(), [
                'nama'      => $this->request->getPost('nama'),
                'username'  => $this->request->getPost('username'),
                'email'     => $this->request->getPost('email'),
                'no_tlp'    => $this->request->getPost('no_tlp'),
                'alamat'    => $this->request->getPost('alamat')
            ]);

            //flash message
            session()->setFlashdata('message', 'Successfully update profile');
            return redirect()->to('/buyer');
        }
    }

    public function order()
    {
        $data = [
            'title' => 'Buyer | Order',
            'orders' => $this->ordersModel->getNewOrders(user_id())
        ];
        return view('buyers/order', $data);
    }
}
