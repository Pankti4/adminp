<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Country extends CI_Controller {

  function index()
  {
      $this->load->model('Countrymodel');
      $countries = $this->Countrymodel->all();
      $data = array();
      $data['countries'] = $countries;
      $this->load->view('user/list',$data);
  }

   function create()
   {
      $this->load->model('Countrymodel');
      $this->form_validation->set_rules('name','Name','required|is_unique[countries.name]');
      $this->form_validation->set_rules('status','Status','required');

      if($this->form_validation->run() == false)
      {
         $this->load->view('user/create'); 
      } else 
      {
        $formArray = array();
        $formArray['name'] = $this->input->post('name');
        $formArray['status'] = $this->input->post('status');
        $formArray['created'] = date('Y-m-d H:i:s', time());
        $this->Countrymodel->create($formArray);
        $this->session->set_flashdata('success','Country Successfully Added!');
        redirect(base_url().'user/Country');
      }  
    }

    function edit($countriesId)
  {
    $this->load->model('Countrymodel');
    $countries = $this->Countrymodel->getCountries($countriesId);
    $data = array();
    $data['countries'] = $countries;
    $formArray = array();
    $this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_rules('status','Status','required');
    if ($this->form_validation->run() == false) 
    {
      $this->load->view('user/edit',$data);
    } else
     {
      $formArray = array();
      $formArray['name'] = $this->input->post('name');
      $formArray['status'] = $this->input->post('status',true);
      $formArray['updated'] = date('Y-m-d H:i:s', time());
      $this->Countrymodel->updateCountries($countriesId,$formArray);
      $this->session->set_flashdata('success','Country Updated successfully!');
      redirect(base_url().'user/Country');
     }    
  }

  function delete($countriesId)
  {
    $this->load->model('Countrymodel');
    $countries = $this->Countrymodel->getCountries($countriesId);
    if(empty($countries))
    {
      $this->session->set_flashdata('failure','Country not found in database!');
      redirect(base_url().'user/Country');  
    }
    $this->Countrymodel->deleteCountries($countriesId);
    $this->session->set_flashdata('success','Country deleted successfully');
      redirect(base_url().'user/Country');
  }
}
?>