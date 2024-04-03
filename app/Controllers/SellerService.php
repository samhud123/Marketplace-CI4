<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\ServiceModel;

class SellerService extends BaseController
{
    protected $serviceModel, $categoryModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
        $this->categoryModel = new CategoriesModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Seller | Services',
            'services' => $this->serviceModel->getServices(user()->id)
        ];
        return view('sellers/services/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Seller | Services',
            'categories' => $this->categoryModel->findAll()
        ];
        return view('sellers/services/add', $data);
    }

    public function save()
    {
        //define validation
        $validation = [
            'category'  => 'required',
            'title'     => 'required',
            'desc'      => 'required',
            'picture'   => 'max_size[picture,1024]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($validation)) {
            // return redirect()->to('/seller/services')->withInput()->with('validation', $validation);
            return redirect()->to('/seller/services/add')->withInput()->with('errors', $this->validator->getErrors());
        } else {
            // get picture
            $picture = $this->request->getFile('picture');
            // validasi upload
            if ($picture->getError() == 4) {
                return redirect()->to('/seller/services/add')->withInput()->with('errors', 'What you entered is not an image');
            } else {
                // generate nama sampul random
                $namePicture = $picture->getRandomName();
                // move file to folder img
                $picture->move('img/services', $namePicture);
            }

            //insert data into database
            $this->serviceModel->insert([
                'user_id'       => user()->id,
                'category_id'   => $this->request->getPost('category'),
                'judul'         => $this->request->getPost('title'),
                'deskripsi'     => $this->request->getPost('desc'),
                'foto'          => $namePicture
            ]);

            //flash message
            session()->setFlashdata('message', 'Successfully added service');
            return redirect()->to('/seller/services');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Seller | Services',
            'service' => $this->serviceModel->getDetailService($id, user()->id),
            'categories' => $this->categoryModel->findAll()
        ];
        return view('sellers/services/edit', $data);
    }

    public function update($id)
    {
        //define validation
        $validation = [
            'category'  => 'required',
            'title'     => 'required',
            'desc'      => 'required',
            'picture'   => 'max_size[picture,1024]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($validation)) {
            // return redirect()->to('/seller/services')->withInput()->with('validation', $validation);
            return redirect()->to('/seller/services/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        } else {
            $fotoBaru = $this->request->getFile('picture');
            $fotoLama = $this->request->getVar('foto');

            // check foto
            if ($fotoBaru->getError() == 4) {
                $namaFoto = $fotoLama;
            } else {
                // generate random name
                $namaFoto = $fotoBaru->getRandomName();
                // move the foto
                $fotoBaru->move('img/services', $namaFoto);

                // delete old foto
                unlink('img/services/' . $fotoLama);
            }

            $this->serviceModel->update($id, [
                'category_id' => $this->request->getPost('category'),
                'judul'     => $this->request->getPost('title'),
                'deskripsi' => $this->request->getPost('desc'),
                'foto'      => $namaFoto
            ]);

            //flash message
            session()->setFlashdata('message', 'Successfully update service');
            return redirect()->to('/seller/services');
        }
    }

    public function delete($id)
    {
        $service = $this->serviceModel->find($id);

        if ($service) {
            //delete foto
            unlink('img/services/' . $service['foto']);
            // delete data
            $this->serviceModel->delete($id);
            //flash message
            session()->setFlashdata('message', 'Service Deleted Successfully!');
            return redirect()->to('/seller/services');
        } else {
            session()->setFlashdata('errors', 'data not found');
            return redirect()->to('/seller/services');
        }
    }
}
