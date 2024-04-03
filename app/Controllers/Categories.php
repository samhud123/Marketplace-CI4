<?php

namespace App\Controllers;

use App\Models\CategoriesModel;

class Categories extends BaseController
{
    protected $categories;

    public function __construct()
    {
        $this->categories = new CategoriesModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin | Categories',
            'categories' => $this->categories->findAll()
        ];
        return view('admin/categories/index', $data);
    }

    public function save()
    {
        $validation = [
            'category' => 'required|is_unique[tbl_categories.category_name]',
            'picture'  => 'max_size[picture,1024]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($validation)) {
            return redirect()->to('/admin/categories')->withInput()->with('errors', $this->validator->getErrors());
        } else {
            // get picture
            $picture = $this->request->getFile('picture');
            // validasi upload
            if ($picture->getError() == 4) {
                return redirect()->to('/admin/categories')->withInput()->with('errors', 'What you entered is not an image');
            } else {
                // generate nama sampul random
                $namePicture = $picture->getRandomName();
                // move file to folder img
                $picture->move('img/categories', $namePicture);
            }

            //insert data into database
            $this->categories->insert([
                'category_name' => $this->request->getPost('category'),
                'picture'       => $namePicture
            ]);

            //flash message
            session()->setFlashdata('message', 'Successfully added category');
            return redirect()->to('/admin/categories');
        }
    }

    public function update()
    {
        $categoryName = $this->request->getPost('category');
        $idCategory = $this->request->getPost('id_category');

        $oldCategory = $this->categories->where('id_categories', $idCategory)->first();
        if ($oldCategory['category_name'] ==  $categoryName) {
            $rule_category = 'required';
        } else {
            $rule_category = 'required|is_unique[tbl_categories.category_name]';
        }

        $validation = [
            'category' => $rule_category,
            'picture'  => 'max_size[picture,1024]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($validation)) {
            return redirect()->to('/admin/categories')->withInput()->with('errors', $this->validator->getErrors());
        } else {
            $fotoBaru = $this->request->getFile('picture');
            $fotoLama = $this->request->getVar('old_picture');

            // check picture
            if ($fotoBaru->getError() == 4) {
                $namaFoto = $fotoLama;
            } else {
                // generate random name
                $namaFoto = $fotoBaru->getRandomName();
                // move the foto
                $fotoBaru->move('img/categories', $namaFoto);

                // delete old foto
                unlink('img/categories/' . $fotoLama);
            }

            //update data into database
            $this->categories->update($idCategory, [
                'category_name' => $categoryName,
                'picture'       => $namaFoto
            ]);

            //flash message
            session()->setFlashdata('message', 'Successfully update category');
            return redirect()->to('/admin/categories');
        }
    }

    public function delete($id)
    {
        $category = $this->categories->find($id);
        $this->categories->delete($category);

        // delete old foto
        unlink('img/categories/' . $category['picture']);

        //flash message
        session()->setFlashdata('message', 'Category Deleted Successfully!');
        return redirect()->to('/admin/categories');
    }
}
