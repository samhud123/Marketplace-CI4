<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table      = 'tbl_categories';
    protected $primaryKey = 'id_categories';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['category_name', 'picture'];
}
