<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class State extends CI_Controller {
  
  
  public function __construct() 
    {
           parent::__construct(false);
           $this->load->model('Statemodel');
       }

  function index()
  {   
      $this->load->model('Statemodel');
      $states = $this->Statemodel->all();
      $data['states'] = $states;
      $this->load->view('user/slist',$data);
  }

   function create()
   {
      $this->load->model('Statemodel');
      $this->form_validation->set_rules('name','Name','required|is_unique[states.name]');
      $this->form_validation->set_rules('status','Status','required');

      if($this->form_validation->run() == false)
      {
         $country = $this->Statemodel->get_Country();
         $dt['country'] = $country->result();
         $this->load->view('user/screate',$dt); 
      } else 
      {
        $formArray = array();
        $formArray['country_id'] = $this->input->post('country');
        $formArray['name'] = $this->input->post('name');
        $formArray['status'] = $this->input->post('status');
        $formArray['created'] = date('Y-m-d H:i:s', time());
        $this->Statemodel->create($formArray);
        $this->session->set_flashdata('success','State Successfully Added!');
        redirect(base_url().'user/State');
      }  
    }

    function edit($statesId)
  {
    $country = $this->Statemodel->get_Country();
    $data['country'] = $country->result();
    $states = $this->Statemodel->getStates($statesId);
    $data['states'] = $states;
    $formArray = array();
    $this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_rules('status','Status','required');
    if ($this->form_validation->run() == false) 
    {
      
      $this->load->view('user/sedit',$data);
    } else
     {
      $formArray = array();
      $formArray['country_id'] = $this->input->post('country');
      $formArray['name'] = $this->input->post('name');
      $formArray['status'] = $this->input->post('status',true);
      $formArray['updated'] = date('Y-m-d H:i:s', time());
      $this->Statemodel->updateStates($statesId,$formArray);
      $this->session->set_flashdata('success','State Updated successfully!');
      redirect(base_url().'user/State');
     }    
  }

  function delete($statesId)
  {
    $this->load->model('Statemodel');
    $states = $this->Statemodel->getStates($statesId);
    if(empty($states))
    {
      $this->session->set_flashdata('failure','States not found in database!');
      redirect(base_url().'user/States');  
    }
    $this->Statemodel->deleteStates($statesId);
    $this->session->set_flashdata('success','State deleted successfully');
      redirect(base_url().'user/State');
  }
}
?>