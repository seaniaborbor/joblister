<?php

namespace App\Controllers;
use App\Models\JobModel; // Import the JobModel
use App\Codeigniter\Controller; // Import the JobModel

class Jobcontroller extends BaseController
{
    public function __construct()
    {
        helper("form");
    }
   

    public function index()
    {
        $jobModel = new JobModel();
        $data = [];
        $data['title'] = 'create_job';
        $data['jobs'] = $jobModel->getJobs();
    
        // if the form is submitted 
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'jobTitle' => 'required',
                'location' => 'required',
                'deadLine' => 'required',
                'file' => 'uploaded[file]|max_size[file,1024]|ext_in[file,pdf]',
                'logo' => 'uploaded[logo]|max_size[logo,2048]|ext_in[logo,jpg,jpeg,png,gif]',
            ];
    
            if ($this->validate($rules)) {
                
                $file = $this->request->getFile('file');

                if ($file->isValid() && !$file->hasMoved()) {
                    $fileNewName = $file->getRandomName();
                    $file->move('uploads/', $fileNewName);
                }

                $logo = $this->request->getFile('logo');
                if ($logo->isValid() && !$logo->hasMoved()) {
                    $logoNewName = $logo->getRandomName();
                    $logo->move('uploads/', $logoNewName);
                }

                // Now, you can save the form data and file paths to the database or perform other actions.

                // Example: Saving the form data to a model
                $jobData = [
                    'title' => $this->request->getPost('jobTitle'),
                    'location' => $this->request->getPost('location'),
                    'deadline' => $this->request->getPost('deadLine'),
                    'file_path' => $fileNewName,
                    'logo_path' => $logoNewName,
                    'lastEditedBy' => session()->get('loginEmail'),

                ];
                $jobModel->insert($jobData);

                return redirect()->to(base_url('dashboard/create_job'))->with('success', 'Job details saved successfully');


            } else {
                // Correct the variable name to 'validation'
                
                $data['validation'] = $this->validator;
            }
        }
    
        return view('dashboard/create_job', $data);
    }



    public function edit_job($id)
    {
        $db = new JobModel();
        $data = [];
       $record  = $db->where('id', $id)->first();
       $data['job'] = $record;

        $data['title'] = 'create_job';
        if(empty($record)){
            return redirect()->to(base_url('dashboard/create_job'))->with('error', 'Resource Not Found. ');
        }

        $updateLogo = false; 
        $updateFile = false;
        
    
        // if the form is submitted 
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'jobTitle' => 'required',
                'location' => 'required',
                'deadLine' => 'required'
            ];

        //if they submitted a file 
        if($this->request->getFile('file') && $this->request->getFile('file')->isValid()){
            $rules['file'] = 'uploaded[file]|max_size[file,1024]|ext_in[file,pdf]';
            $updateFile = true;
        } 

         //if they submitted a file 
         if($this->request->getFile('logo') && $this->request->getFile('logo')->isValid()){
            $rules['logo'] = 'uploaded[logo]|max_size[logo,2048]|ext_in[logo,jpg,jpeg,png,gif]';
            $updateLogo = true;
        } 
    
            if ($this->validate($rules)) {


                $jobData = [
                    'title' => $this->request->getPost('jobTitle'),
                    'location' => $this->request->getPost('location'),
                    'deadline' => $this->request->getPost('deadLine'),
                    'lastEditedBy' => session()->get('loginEmail'),
                ];
                
               if($updateFile){
                    $file = $this->request->getFile('file');

                    if ($file->isValid() && !$file->hasMoved()) {
                        $fileNewName = $file->getRandomName();
                        $file->move('uploads/', $fileNewName);
                        $jobData['file_path'] = $fileNewName;
                    }
               }
               

                if($updateLogo){
                    $logo = $this->request->getFile('logo');
                    if ($logo->isValid() && !$logo->hasMoved()) {
                        $logoNewName = $logo->getRandomName();
                        $logo->move('uploads/', $logoNewName);
                        $jobData['logo_path'] = $logoNewName;
                    }
                }

                // Example: Saving the form data to a model
                
                $db->updateJob($id, $jobData);

                return redirect()->to(base_url('dashboard/edit_job/'.$id))->with('success', 'Job details updateded successfully');


            } else {
                // Correct the variable name to 'validation'
                
                $data['validation'] = $this->validator;
            }
        }
    
        return view('dashboard/edit_job', $data);
    }

    public function delete_job($id)
    {
        $db = new JobModel();
          $job = $db->find($id);
          $data['title'] = "Delete";
          
  
          if($job){
              $db->delete($id);
              return redirect()->to('/dashboard/create_job')->with("success", "You deleted a job post from the database ");
          }else{
              return redirect()->back()->with("failed", "The job post does not exist, you're trying to  delete");
          }
    }
    


   
}
