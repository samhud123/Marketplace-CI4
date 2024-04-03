<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\ServiceModel;

class Home extends BaseController
{
    protected $categories, $serviceModel;

    public function __construct()
    {
        $this->categories =  new CategoriesModel();
        $this->serviceModel = new ServiceModel();
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
        return "All Category";
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
}
