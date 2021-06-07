<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   class City extends CI_Controller 
   {
   
     public function __construct() {
           parent::__construct(false);
           $this->load->model('Citymodel');
       }
   
     function index()
     {   
         $this->get_city();
     }
   
     public function get_country() 
     {
         $country = $this->Citymodel->get_Country();
         $dt['country'] = $country->result();
     }
   
     public function get_city() 
     {
         $city = $this->Citymodel->city_all();
         $data['city'] = $city->result();
         $this->load->view('user/cilist',$data);
       
     }
   
     public function getStates(){
           $states = array();
           $country_id = $this->input->post('country_id');
           if($country_id){
               $con['conditions'] = array('country_id'=>$country_id);
               $states = $this->Citymodel->getStateRows($con);
           }
           echo json_encode($states);
       }
   
   
      function create()
      {
         $this->load->model('Citymodel');
         $this->form_validation->set_rules('name','Name','required|is_unique[cities.name]');
         $this->form_validation->set_rules('status','Status','required');
   
         if($this->form_validation->run() == false)
         {
            $country = $this->Citymodel->get_Country();
            $dt['country'] = $country->result();
            $this->load->view('user/cicreate',$dt); 
         } else 
         {
           $formArray = array();
           $formArray['country_id'] = $this->input->post('country');
           $formArray['state_id'] = $this->input->post('state');
           $formArray['name'] = $this->input->post('name');
           $formArray['status'] = $this->input->post('status');
           $formArray['created'] = date('Y-m-d H:i:s', time());
           $this->Citymodel->create($formArray);
           $this->session->set_flashdata('success','City Successfully Added!');
           redirect(base_url().'user/City');
         }  
       }
       
   
       function edit($citiesId)
       {
         $this->load->model('Citymodel');
         $cities = $this->Citymodel->getCities($citiesId);
         $data = array();
         $data['cities'] = $cities;
         $country = $this->Citymodel->get_Country();
         $data['country'] = $country->result();
         $formArray = array();
         $this->form_validation->set_rules('name','Name','required');
         $this->form_validation->set_rules('status','Status','required');
         
         if ($this->form_validation->run() == false) 
         {
           $this->load->view('user/ciedit',$data);
         } else {
           $formArray = array();
           $formArray['country_id'] = $this->input->post('country');
           $formArray['state_id'] = $this->input->post('state');
           $formArray['name'] = $this->input->post('name');
           $formArray['status'] = $this->input->post('status',true);
           $formArray['updated'] = date('Y-m-d H:i:s', time());
           $this->Citymodel->updateCities($citiesId,$formArray);
           $this->session->set_flashdata('success','City Updated successfully!');
           redirect(base_url().'user/City');
        }    
     }
   
     function delete($citiesId)
     {
       $this->load->model('Citymodel');
       $cities = $this->Citymodel->getCities($citiesId);
       if(empty($cities))
       {
         $this->session->set_flashdata('failure','Cities not found in database!');
         redirect(base_url().'user/City');  
       }
       $this->Citymodel->deleteCities($citiesId);
       $this->session->set_flashdata('success','City deleted successfully');
         redirect(base_url().'user/City');
     }
   }
   ?>