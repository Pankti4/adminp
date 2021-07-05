<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User1 extends CI_Controller {

  public function __construct(){
 
    parent::__construct();
    $this->load->helper('url');

    // Load session
    $this->load->library('session');

    // Load Pagination library
    $this->load->library('pagination');

    // Load model
    $this->load->model('Main_model');
  }

  public function index(){
    $this->load->view('user/user_view');
    // redirect('user/User1/loadRecord');
    $data['pagination'] = $this->pagination->create_links();
  }

  public function loadRecord($rowno=0){

    // Search text
    $search_text = "";
    if($this->input->post('submit') != NULL ){
      $search_text = $this->input->post('search');
      $this->session->set_userdata(array("search"=>$search_text));
    }else{
      if($this->session->userdata('search') != NULL){
        $search_text = $this->session->userdata('search');
      }
    }

    // Row per page
    $rowperpage = 5;

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
    $allcount = $this->Main_model->getrecordCount($search_text);

    // Get records
    $users_record = $this->Main_model->getData($rowno,$rowperpage,$search_text);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'index.php/user/User1/loadRecord';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;

    // Initialize
    $this->pagination->initialize($config);
 
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $users_record;
    $data['row'] = $rowno;
    $data['search'] = $search_text;

    // Load view
    $this->load->view('user/user_view',$data);
 
  }

  public function getSubcategory() 
      {
        $json = array();
        $this->Productmodel->setCategoryID($this->input->post('category'));
        $json = $this->Productmodel->getSubcategory();
        header('Content-Type: application/json');
        echo json_encode($json);
      }

      function create()
      {
         $this->load->model('Main_model');
         $this->form_validation->set_rules('name','Name','required|is_unique[products.name]');
         $this->form_validation->set_rules('status','Status','required');
   
         if($this->form_validation->run() == false)
         {
            $category = $this->Main_model->get_Category();
            $data['category'] = $category->result();
            $this->load->view('user/procreate',$data); 
         } else 
         {
           $formArray = array();
           $formArray['category_id'] = $this->input->post('category');
           $formArray['subcategory_id'] = $this->input->post('sub_category');
           $formArray['name'] = $this->input->post('name');
           $formArray['status'] = $this->input->post('status');
           $formArray['created'] = date('Y-m-d H:i:s', time());
           $this->Main_model->create($formArray);
           $this->session->set_flashdata('success','Product Successfully Added!');
           redirect(base_url().'user/User1');
         }  
       }
   
       function edit($productsId)
     {
       $category = $this->Main_model->get_Category();
       $data['category'] = $category->result();
       
       $products = $this->Main_model->getProducts($productsId);
       $data['products'] = $products;
       
       $formArray = array();
       $this->form_validation->set_rules('name','Name','required');
       $this->form_validation->set_rules('status','Status','required');
       if ($this->form_validation->run() == false) 
       {
         $this->load->view('user/proedit',$data);
       } else
        {
         $formArray = array();
         $formArray['category_id'] = $this->input->post('category');
         $formArray['subcategory_id'] = $this->input->post('sub_category');
         $formArray['name'] = $this->input->post('name');
         $formArray['status'] = $this->input->post('status',true);
         $formArray['updated'] = date('Y-m-d H:i:s', time());
         $this->Main_model->updateProducts($productsId,$formArray);
         $this->session->set_flashdata('success','Products Updated successfully!');
         redirect(base_url().'user/User1');
        }    
     }
   
     function delete($productsId)
     {
       $this->load->model('Main_model');
       $products = $this->Main_model->getProducts($productsId);
       if(empty($products))
       {
         $this->session->set_flashdata('failure','Products not found in database!');
         redirect(base_url().'user/User1');  
       }
       $this->Main_model->deleteProducts($productsId);
       $this->session->set_flashdata('success','Products deleted successfully');
         redirect(base_url().'user/User1');
     }

}
?>