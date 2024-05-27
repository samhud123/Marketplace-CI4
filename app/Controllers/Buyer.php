<?php

namespace App\Controllers;

use App\Models\OrdersModel;
use App\Models\CategoriesModel;
use Myth\Auth\Models\UserModel;

class Buyer extends BaseController
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
            'title' => 'Buyer | Profile',
            'categories'    => $this->categories->findAll(),
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
            'orders' => $this->ordersModel->getNewOrders(user_id()),
            'categories'    => $this->categories->findAll(),
        ];
        return view('buyers/order/index', $data);
    }

    public function detail($orderId)
    {
        $data = [
            'title' => 'Buyer | Order',
            'order' => $this->ordersModel->getDetailOrderBuyer($orderId, user_id()),
            'categories' => $this->categories->findAll(),
        ];
        return view('buyers/order/detail', $data);
    }

    public function confirm($orderId)
    {
        $id_transaksi = rand();
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-c_uIzFpCcATE9-3OEyNZTPH6';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $id_transaksi,
                'gross_amount' => $this->request->getVar('harga'),
            ),
            'customer_details' => array(
                'first_name' => user()->nama,
                'email' => user()->email,
                'phone' => user()->no_tlp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $token = $snapToken;

        $this->ordersModel->update($orderId, [
            'id_transaksi' => $id_transaksi,
            'token' => $token,
            'status_order' => 'approved'
        ]);
        return redirect()->to('/buyer/order');
    }

    public function payment($orderId)
    {
        $result = json_decode($this->request->getPost('result_data'), true);

        $this->ordersModel->update($orderId, [
            'status_code' => $result['status_code'],
            'status_pembayaran' => $result['transaction_status'],
        ]);

        return redirect()->to('/buyer/order');
    }

    public function cancel($orderId)
    {
        $this->ordersModel->update($orderId, [
            'status_order' => 'cancelled'
        ]);
        return redirect()->to('/buyer/order');
    }

    public function finish($orderId)
    {
        $this->ordersModel->update($orderId, [
            'status_order' => 'success'
        ]);
        return redirect()->to('/buyer/order');
    }
}
