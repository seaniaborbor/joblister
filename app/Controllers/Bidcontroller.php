<?php

namespace App\Controllers;
use App\Codeigniter\Controller; 

use App\Models\BidModel; // Import the BidModel
use App\Models\JobModel; // Import the JobModel

class Bidcontroller extends BaseController
{
    public function __construct()
    {
        helper("form");
    }
   
// ========   OAD A BID TABLE AND FORM ================
    public function index()
    {
        $bidModel = new BidModel();
        $data = [];
        $data['bids'] = $bidModel->getBids();
        $data['title'] = 'create_bid';
        
    
        // if the form is submitted 
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'bidTitle' => 'required',
                'deadLine' => 'required',
                'file' => 'uploaded[file]|max_size[file,2048]|ext_in[file,pdf]',
                'logo' => 'uploaded[logo]|max_size[logo,2048]|ext_in[logo,png,jpg,jpeg]',
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
                $bidData = [
                    'bidTitle' => $this->request->getPost('bidTitle'),
                    'deadLine' => $this->request->getPost('deadLine'),
                    'file_path' => $fileNewName,
                    'lastEditedBy' => session()->get('loginEmail'),
                    'logo_path' => $logoNewName,
                ];
                $bidModel->createBid($bidData);

                return redirect()->to(base_url('dashboard/create_bid'))->with('success', 'Bid posted successfully');


            } else {
                // Correct the variable name to 'validation'
                
                $data['validation'] = $this->validator;
            }
        }
    
        return view('dashboard/create_bid', $data);
    }
    

    //============ EDIT A BID METHOD ===========

    public function edit_bid($id)
    {
        $db = new BidModel();
        $data = [];
        $record  = $db->where('id', $id)->first();
        $data['bid'] = $record;

        $data['title'] = 'create_bid';
            if(empty($record)){
                return redirect()->to(base_url('dashboard/create_bid'))->with('error', 'Resource Not Found. ');
                exit();
            }

        $updateLogo = false; 
        $updateFile = false;
        
    
        // if the form is submitted 
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'bidTitle' => 'required',
                'deadLine' => 'required',
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
                    'bidTitle' => $this->request->getPost('bidTitle'),
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
                
                $db->updateBid($id, $jobData);

                return redirect()->to(base_url('dashboard/edit_bid/'.$id))->with('success', 'Bid updateded successfully');


            } else {
                // Correct the variable name to 'validation'
                
                $data['validation'] = $this->validator;
            }
        }
    
        return view('dashboard/edit_bid', $data);
    }


    public function delete_bid($id)
    {
        $db = new BidModel();
          $loan = $db->find($id);
          $data['title'] = "Delete";
          
  
          if($loan){
              $db->delete($id);
              return redirect()->to('/dashboard/create_bid')->with("success", "You deleted a Bid from the database ");
          }else{
              return redirect()->back()->with("failed", "The bid doesn't exist, you're trying to deleate");
          }
    }
    
    
   
}
