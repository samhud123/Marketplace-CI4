<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\CommentModel;
use App\Models\OrdersModel;
use App\Models\ServiceModel;

class Home extends BaseController
{
    protected $categories, $serviceModel, $ordersModel, $commentModel;

    public function __construct()
    {
        $this->categories =  new CategoriesModel();
        $this->serviceModel = new ServiceModel();
        $this->ordersModel = new OrdersModel();
        $this->commentModel = new CommentModel();
    }

    public function index(): string
    {
        $data = [
            'categories' => $this->categories->findAll()
        ];
        return view('index', $data);
    }

    public function category()
    {
        $data = [
            'categories' => $this->categories->findAll()
        ];
        return view('categories', $data);
    }

    public function show($category)
    {
        $findCategory = $this->categories->where('category_name', $category)->first();

        $data = [
            'title' => 'Category',
            'search' => $category,
            'categories' => $this->categories->findAll(),
            'services' => $this->serviceModel->serviceCategory($findCategory['id_categories'])
        ];

        return view('category', $data);
    }

    public function search()
    {
        $keyword = $this->request->getVar('keyword');

        // Jika ada keyword, lakukan pencarian
        if ($keyword) {
            $result = $this->serviceModel->search($keyword);
        } else {
            // Jika tidak ada keyword, tampilkan semua produk
            $result = $this->serviceModel->getAllService();
        }

        $data = [
            'keyword'       => $keyword,
            'categories'    => $this->categories->findAll(),
            'services'      => $result
        ];
        return view('services', $data);
    }

    public function detail($serviceId)
    {
        $data = [
            'service'       => $this->serviceModel->getServiceById($serviceId),
            'comments'      => $this->commentModel->getCommentByService($serviceId),
            'categories'    => $this->categories->findAll(),
        ];

        return view('service-detail', $data);
    }

    public function order()
    {
        $serviceId = $this->request->getGet('service');
        $data = [
            'categories'    => $this->categories->findAll(),
            'service'       => $this->serviceModel->getServiceById($serviceId)
        ];
        return view('order', $data);
    }

    public function attemptOrder()
    {
        $this->ordersModel->insert([
            'buyer_id' => user_id(),
            'seller_id' => $this->request->getPost('sellerId'),
            'service_id' => $this->request->getPost('serviceId'),
            'pesan'     => $this->request->getPost('message'),
        ]);

        //flash message
        session()->setFlashdata('message', 'Order successful, waiting for seller confirmation...');
        return redirect()->to('/buyer/order');
    }
}
