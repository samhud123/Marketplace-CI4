<?php

namespace App\Controllers;

use App\Models\WalletModel;
use App\Models\WdModel;

class SellerWD extends BaseController
{
    protected $walletModel, $wdModel;

    public function __construct()
    {
        $this->walletModel = new WalletModel();
        $this->wdModel = new WdModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Seller | WD',
            'wallet' => $this->walletModel->where('seller_id', user_id())->first(),
            'wd' => $this->wdModel->getWdBySeller(user_id())
        ];

        return view('sellers/wd/index', $data);
    }

    public function withdrawal()
    {
        $request_wd = $this->request->getPost('jumlah_wd');
        $jumlah_wd = (int) preg_replace('/\D/', '', $request_wd);
        // dd($jumlah_wd);

        $wallet = $this->walletModel->where('id', $this->request->getPost('wallet_id'))->first();
        if ($jumlah_wd > $wallet['saldo']) {
            session()->setFlashdata('errors', 'Your balance is insufficient!');
            return redirect()->to('/seller/wd');
        } else {
            $this->wdModel->insert([
                'seller_id' => user_id(),
                'wallet_id' => $wallet['id'],
                'jml_wd' => $jumlah_wd,
                'status_wd' => 'process',
                'created_at' => date('Y-m-d H:i:s')
            ]);

            $this->walletModel->update($wallet['id'], [
                'saldo' => $wallet['saldo'] - $jumlah_wd
            ]);

            session()->setFlashdata('message', 'Wait for the withdrawal process');
            return redirect()->to('/seller/wd');
        }
    }

    public function saveNoRek()
    {
        // dd($this->request->getPost());
        if ($this->request->getPost('wallet_id')) {
            $this->walletModel->update($this->request->getPost('wallet_id'), [
                'no_wallet' => $this->request->getPost('no'),
                'nama_wallet' => $this->request->getPost('wd')
            ]);
        } else {
            // dd($this->request->getPost());
            $this->walletModel->insert([
                'seller_id' => user_id(),
                'no_wallet' => $this->request->getPost('no'),
                'nama_wallet' => $this->request->getPost('wd')
            ]);
        }

        session()->setFlashdata('message', 'Successfully added service');
        return redirect()->to('/seller/wd');
    }
}
