<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {

  function index()
  {   
      $this->load->model('Categorymodel');
      $categories = $this->Categorymodel->all();
      $data = array();
      $data['categories'] = $categories;
      $this->load->view('user/listc',$data);
  }

   function create()
   {
      $this->load->model('Categorymodel');
      $this->form_validation->set_rules('name','Name','required|is_unique[categories.name]');
      $this->form_validation->set_rules('status','Status','required');

      if($this->form_validation->run() == false)
      {
         $this->load->view('user/createc'); 
      } else 
      {
        $formArray = array();
        $formArray['name'] = $this->input->post('name');
        $formArray['status'] = $this->input->post('status');
        $formArray['created'] = date('Y-m-d H:i:s', time());
        $this->Categorymodel->create($formArray);
        $this->session->set_flashdata('success','Category Successfully Added!');
        redirect(base_url().'user/Category');
      }  
    }

    function edit($categoriesId)
  {
    $this->load->model('Categorymodel');
    $categories = $this->Categorymodel->getCategories($categoriesId);
    $data = array();
    $data['categories'] = $categories;
    $formArray = array();
    $this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_rules('status','Status','required');
    if ($this->form_validation->run() == false) 
    {
      $this->load->view('user/editc',$data);
    } else
     {
      $formArray = array();
      $formArray['name'] = $this->input->post('name');
      $formArray['status'] = $this->input->post('status',true);
      $formArray['updated'] = date('Y-m-d H:i:s', time());
      $this->Categorymodel->updateCategories($categoriesId,$formArray);
      $this->session->set_flashdata('success','Category Updated successfully!');
      redirect(base_url().'user/Category');
     }    
  }

  function delete($categoriesId)
  {
    $this->load->model('Categorymodel');
    $categories = $this->Categorymodel->getCategories($categoriesId);
    if(empty($categories))
    {
      $this->session->set_flashdata('failure','Category not found in database!');
      redirect(base_url().'user/Category');  
    }
    $this->Categorymodel->deleteCategories($categoriesId);
    $this->session->set_flashdata('success','Category deleted successfully');
      redirect(base_url().'user/Category');
  }
}
?>