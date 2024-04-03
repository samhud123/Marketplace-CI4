<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table      = 'tbl_services';
    protected $primaryKey = 'service_id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['user_id', 'category_id', 'judul', 'deskripsi', 'foto'];

    // get service berdasarkan ID
    public function getServices($userId)
    {
        return $this->db->table('tbl_services')
            ->join('tbl_categories', 'tbl_categories.id_categories = tbl_services.category_id')
            ->where('user_id', $userId)
            ->get()->getResultArray();
    }

    // ambil service berdasarkan Id service dan user id
    public function getDetailService($serviceId, $userId)
    {
        return $this->db->table('tbl_services')
            ->join('tbl_categories', 'tbl_categories.id_categories = tbl_services.category_id')
            ->where('service_id', $serviceId)
            ->where('user_id', $userId)
            ->get()->getFirstRow();
    }

    public function getAllService()
    {
        return $this->db->table('tbl_services')
            ->join('tbl_categories', 'tbl_categories.id_categories = tbl_services.category_id')
            ->join('users', 'tbl_services.user_id = users.id')
            ->get()->getResultArray();
    }

    public function serviceCategory($idCategory)
    {
        return $this->db->table('tbl_services')
            ->join('tbl_categories', 'tbl_categories.id_categories = tbl_services.category_id')
            ->join('users', 'tbl_services.user_id = users.id')
            ->where('category_id', $idCategory)
            ->get()->getResultArray();
    }

    public function search($keyword)
    {
        return $this->select('tbl_services.*, users.username')
            ->join('users', 'tbl_services.user_id = users.id')
            ->like('judul', $keyword)
            ->orLike('deskripsi', $keyword)
            ->findAll();
    }
}
