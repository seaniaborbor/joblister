<?php

namespace App\Models;

use CodeIgniter\Model;

class BidModel extends Model
{
    protected $table = 'bids'; // Replace with your actual database table name

    protected $primaryKey = 'id'; // Replace with your primary key field

    protected $allowedFields = ['bidTitle', 'file_path', 'lastEditedBy', 'logo_path', 'deadLine'];

    // get all bids 
    public function getBids()
    {
        return $this->orderBy('id', 'desc')->findAll();
    }

    // get unexpired bids 
    public function unexpireBids()
    {
        return $this->orderBy('id', 'desc')->where('deadline >=', date('Y-m-d'))->findAll();
    }

    // save a bid 
    public function createBid($data)
    {
        return $this->insert($data);
    }

    // update bid 
    public function updateBid($id, $data)
    {
        return $this->where('id', $id)->set($data)->update();
    }
    // You can add more methods as needed, e.g., updating and deleting jobs
}
