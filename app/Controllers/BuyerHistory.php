<?php

namespace App\Controllers;

use App\Models\OrdersModel;
use App\Models\CategoriesModel;
use App\Models\CommentModel;
use Myth\Auth\Models\UserModel;

class BuyerHistory extends BaseController
{
    protected $userModel, $ordersModel, $categories, $commentModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->ordersModel = new OrdersModel();
        $this->categories =  new CategoriesModel();
        $this->commentModel = new CommentModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Buyer | History',
            'orders' => $this->ordersModel->getNewOrders(user_id()),
            'categories' => $this->categories->findAll(),
            'comments' => $this->commentModel->where('buyer_id', user_id())->findAll()
        ];
        // dd($data['comments']);
        return view('buyers/history/index', $data);
    }

    public function detail($orderId)
    {
        $data = [
            'title' => 'Buyer | History',
            'order' => $this->ordersModel->getDetailOrderBuyer($orderId, user_id()),
            'categories' => $this->categories->findAll(),
        ];
        return view('buyers/history/detail', $data);
    }

    public function comment($orderId)
    {
        $data = [
            'title' => 'Buyer | History',
            'order' => $this->ordersModel->getDetailOrderBuyer($orderId, user_id()),
            'categories' => $this->categories->findAll(),
        ];
        return view('buyers/history/comment', $data);
    }

    public function create_comment()
    {
        $validation = [
            'star' => 'required',
            'comment' => 'required|max_length[200]'
        ];

        if (!$this->validate($validation)) {
            // return redirect()->to('/seller/services')->withInput()->with('validation', $validation);
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        } else {
            $this->commentModel->insert([
                'service_id' => $this->request->getPost('service_id'),
                'order_id' => $this->request->getPost('order_id'),
                'buyer_id' => user_id(),
                'rating' => $this->request->getPost('star'),
                'comment' => $this->request->getPost('comment'),
            ]);

            session()->setFlashdata('message', 'Comment sent');
            return redirect()->to('/buyer/history');
        }
    }
}
