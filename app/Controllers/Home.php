<?php

namespace App\Controllers;
use App\Models\JobModel; // Import the JobModel
use App\Models\BidModel; // Import the JobModel

class Home extends BaseController
{
    // this is the default hompage 
    public function index(): string
    {
        $jobModel = new JobModel();
        $data = [];
        $data['currentJobs'] = $jobModel->where('deadline >=', date('Y-m-d'))->findAll();
        $data['countiesWithJobs'] = $jobModel->groupBy("location","desc")->where('deadline >=', date('Y-m-d'))->findAll();
        $data['totalJobs'] = $jobModel->where('deadline >=', date('Y-m-d'))->countAllResults();
        

        return view('index', $data);
    }


     // this is the bid page 
     public function bids(): string
     {
         $bidModel = new BidModel();
         $jobModel = new JobModel();
         $data = [];
         $data['currentBids'] = $bidModel->unexpireBids();
         $data['currentJobs'] = $jobModel->where('deadline >=', date('Y-m-d'))->findAll();
         $data['countiesWithJobs'] = $jobModel->groupBy("location","desc")->where('deadline >=', date('Y-m-d'))->findAll();
         $data['totalJobs'] = $jobModel->where('deadline >=', date('Y-m-d'))->countAllResults();

         return view('bids', $data);
     }


       // this is the bid page 
       public function job_location($location): string
       {
           $bidModel = new BidModel();
           $jobModel = new JobModel();
           $data = [];
           $data['loc'] = $location;
           $data['currentBids'] = $bidModel->unexpireBids();
           $data['countiesWithJobs'] = $jobModel->groupBy("location","desc")->where('deadline >=', date('Y-m-d'))->findAll();
         $data['currentJobs'] = $jobModel->where('deadline >=', date('Y-m-d'))->findAll();

         $data['location_jobs'] = $jobModel->getJobsByLocationAndDeadline($location);
     
     

           $data['totalJobs'] = $jobModel->where('deadline >=', date('Y-m-d'))->countAllResults();
  
           return view('job_locations', $data);
       }

       // this is the default hompage 
    public function about(): string
    {
        $jobModel = new JobModel();
        $data = [];
        $data['currentJobs'] = $jobModel->where('deadline >=', date('Y-m-d'))->findAll();
        $data['countiesWithJobs'] = $jobModel->groupBy("location","desc")->where('deadline >=', date('Y-m-d'))->findAll();
        $data['totalJobs'] = $jobModel->where('deadline >=', date('Y-m-d'))->countAllResults();
        

        return view('about', $data);
    }

    public function sent_message(){
        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'email' => 'required',
                'phone' => 'required',
                'message' => 'required',
            ];
            if($this->validate($rules))
            {
                echo "Mail client needed to be installed <br><br><b>Mail Data</b><br>";
                print_r($this->request->getPost());

            }else{
                return redirect()->back()->with("error", "You did not fill the message form well. Please try again ");
            }
        }
    }

    // this is the login route 
    public function login(): string
    {
        return view('login');
    }
}
