<?php

namespace App\Controllers;

use App\Models\OrdersModel;
use \Mpdf\Mpdf;
use CodeIgniter\HTTP\DownloadResponse;

class SellerOrders extends BaseController
{
    protected $ordersModel;

    public function __construct()
    {
        $this->ordersModel = new OrdersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Seller | Orders',
            'orders' => $this->ordersModel->getOrdersSeller(user_id()),
        ];
        return view('sellers/orders/index', $data);
    }

    public function detail($orderId)
    {
        $data = [
            'title' => 'Seller | Orders',
            'order' => $this->ordersModel->getDetailOrderSeller($orderId, user_id())
        ];
        // dd($data['order']);
        return view('sellers/orders/detail', $data);
    }

    public function download_zip($file_name)
    {
        if (!$file_name) {
            return redirect()->to('/seller/orders')->withInput()->with('errors', 'File not found');
        }

        $file = WRITEPATH . 'uploads/' . $file_name;

        if (file_exists($file)) {
            // return new DownloadResponse($file, null, true);
            return $this->response->download($file, null);
        } else {
            return redirect()->to('/seller/orders')->withInput()->with('errors', 'File not found');
        }
    }

    public function invoice($orderId)
    {
        ini_set('max_execution_time', 3600);
        // Inisialisasi mPDF
        $mpdf = new Mpdf(['format' => 'A4']);

        // Contoh HTML yang akan dijadikan PDF
        $data = [
            'order' => $this->ordersModel->getDetailOrder($orderId)
        ];

        // dd($data['order']);

        $html = view('buyers/order/invoice', $data);

        // Menambahkan konten HTML ke mPDF
        $mpdf->WriteHTML($html);

        // Output dalam bentuk PDF
        $mpdf->Output('invoice.pdf', 'D'); // 'D' untuk download, 'I' untuk inline view
    }

    public function price()
    {
        $this->ordersModel->update(
            $this->request->getPost('orderId'),
            [
                'harga' => $this->request->getPost('price'),
            ]
        );

        return redirect()->to('/seller/orders');
    }

    public function reject($orderId)
    {
        $this->ordersModel->update($orderId, [
            'status_order' => 'rejected'
        ]);
        return redirect()->to('/seller/orders');
    }
}
