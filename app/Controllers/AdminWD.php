<?php

namespace App\Controllers;

use App\Models\WalletModel;
use App\Models\WdModel;

class AdminWD extends BaseController
{
    protected $wdModel, $walletModel;

    public function __construct()
    {
        $this->wdModel = new WdModel();
        $this->walletModel = new WalletModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin | WD',
            'wd' => $this->wdModel->getAllWd()
        ];

        return view('admin/wd/index', $data);
    }

    public function finish($id)
    {
        $this->wdModel->update($id, [
            'status_wd' => 'success'
        ]);

        return redirect()->to('/admin/wd');
    }

    public function reject($id)
    {
        $this->wdModel->update($id, [
            'status_wd' => 'failed'
        ]);

        $wd = $this->wdModel->where('id', $id)->first();
        $wallet = $this->walletModel->where('id', $wd['wallet_id'])->first();

        $this->walletModel->update($wd['wallet_id'], [
            'saldo' => $wallet['saldo'] + $wd['jml_wd']
        ]);

        return redirect()->to('/admin/wd');
    }
}
