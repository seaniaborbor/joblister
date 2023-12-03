<?php

namespace App\Models;

use CodeIgniter\Model;

class JobModel extends Model
{
    protected $table = 'jobs'; // Replace with your actual database table name

    protected $primaryKey = 'id'; // Replace with your primary key field

    protected $allowedFields = ['title', 'location', 'deadline', 'lastEditedBy', 'file_path',  'logo_path'];

    public function getJobs()
    {
        return $this->orderBy('id', 'desc')->findAll();
    }

    // all unexpire job 
    public function unExpireJobs()
    {
        return $this->orderBy('id', 'desc')->where('deadLine >=', date('Y-m-d'))->findAll();

    }

    public function createJob($data)
    {
        return $this->insert($data);
    }
    
    public function updateJob($id, $data)
    {
        return $this->where('id', $id)->set($data)->update();
    }

    public function getJobsByLocationAndDeadline($location)
    {
        $currentDate = date('Y-m-d');

        return $this->like('location', $location)
                    ->where('deadline >', $currentDate)
                    ->findAll();
    }
}
