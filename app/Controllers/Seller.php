<?php

namespace App\Controllers;

use App\Models\OrdersModel;
use App\Models\WalletModel;
use Myth\Auth\Models\UserModel;

class Seller extends BaseController
{
    protected $ordersModel, $walletModel;

    public function __construct()
    {
        $this->ordersModel = new OrdersModel();
        $this->walletModel = new WalletModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Seller | Dashboard',
            'orders_complate' => $this->ordersModel->where('seller_id', user_id())->where('status_order', 'success')->countAllResults(),
            'incoming_orders' => $this->ordersModel->where('seller_id', user_id())->where('status_order', 'process')->orWhere('status_order', 'approved')->countAllResults(),
            'orders_failed' => $this->ordersModel->where('seller_id', user_id())->where('status_order', 'rejected')->orWhere('status_order', 'cancelled')->countAllResults(),
            'saldo' => $this->walletModel->where('seller_id', user_id())->first()
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

    public function updateProfile()
    {
        $user = new UserModel();

        $profile = $user->where('id', user_id())->first();

        if ($profile->username == $this->request->getPost('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|is_unique[users.username, id,' . user_id() . ']';
        }

        if ($profile->email == $this->request->getPost('email')) {
            $rule_email = 'required';
        } else {
            $rule_email = 'required|valid_email|is_unique[users.email,id,' . user_id() . ']';
        }

        $validation = [
            'username'  => $rule_username,
            'email'     => $rule_email
        ];

        if (!$this->validate($validation)) {
            return redirect()->to('/seller/profile')->withInput()->with('errors', $this->validator->getErrors());
        } else {
            $user->update(user_id(), [
                'nama'      => $this->request->getPost('nama'),
                'username'  => $this->request->getPost('username'),
                'email'     => $this->request->getPost('email'),
                'no_tlp'    => $this->request->getPost('phone'),
                'alamat'    => $this->request->getPost('address')
            ]);

            //flash message
            session()->setFlashdata('message', 'Successfully update profile');
            return redirect()->to('/seller/profile');
        }
    }

    public function photo()
    {
        $user = new UserModel();
        $validation = [
            'picture'  => 'max_size[picture,1024]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($validation)) {
            return redirect()->to('/seller/profile')->withInput()->with('errors', $this->validator->getErrors());
        } else {
            // get picture
            $picture = $this->request->getFile('picture');
            // validasi upload
            if ($picture->getError() == 4) {
                return redirect()->to('/seller/profile')->withInput()->with('errors', 'What you entered is not an image');
            } else {
                // generate nama sampul random
                $namePicture = $picture->getRandomName();
                // move file to folder img
                $picture->move('img/seller', $namePicture);
            }

            $user->update(user_id(), [
                'foto' => $namePicture,
            ]);

            //flash message
            session()->setFlashdata('message', 'Successfully update photo');
            return redirect()->to('/seller/profile');
        }
    }
}
