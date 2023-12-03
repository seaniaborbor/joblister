<?php

namespace App\Controllers;
use App\Models\JobModel; // Import the JobModel
use App\Models\BidModel; // Import the JobModel
use App\Models\LoginModel;

class Dashboard extends BaseController
{
    // this is the default hompage of the dashboard
    public function index(): string
    {
        $data['title'] = 'dashboard';

        
        // get db handle
        $job_db = new JobModel();
        $bid_db = new BidModel();
        $log_db = new LoginModel();
        // create quaries that aggregate data summary 
        $data['total_expire_bids'] = $bid_db->where('deadline <=', date('Y-m-d'))->countAllResults();
        $data['total_bids'] = $bid_db->countAllResults();
        $data['total_expire_jobs'] = $job_db->where('deadLine <=', date('Y-m-d'))->countAllResults();;
        $data['total_jobs'] = $job_db->countAllResults();


        $data['admin_users'] = $log_db->where('accountType', 1)->countAllResults();
        $data['user_users'] = $log_db->where('accountType', 0)->countAllResults();
        $data['total_user'] = $log_db->countAllResults();



        return view('dashboard/index', $data);
    }

    
   
}
