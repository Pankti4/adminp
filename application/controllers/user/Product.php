<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   class Product extends CI_Controller {
      
     public function __construct() 
     {
           parent::__construct(false);

           $this->load->helper('url','form');
          $this->load->library("pagination");
          // $this->perPage = 10;
           $this->load->model('Productmodel');
       }

   
     function index()
     {     
        $config = array();
        $config["base_url"] = base_url() . 'user/Product/';
        $config["total_rows"] = $this->Productmodel->get_count();
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;
        print_r($config);

      $this->pagination->initialize($config);
        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
    
        $data["links"] = $this->pagination->create_links();

        $data['products'] = $this->Productmodel->all($config["per_page"], $page);


         $this->load->view('user/prolist',$data);
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
         $this->load->model('Productmodel');
         $this->form_validation->set_rules('name','Name','required|is_unique[products.name]');
         $this->form_validation->set_rules('status','Status','required');
   
         if($this->form_validation->run() == false)
         {
            $category = $this->Productmodel->get_Category();
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
           $this->Productmodel->create($formArray);
           $this->session->set_flashdata('success','Product Successfully Added!');
           redirect(base_url().'user/Product');
         }  
       }
   
       function edit($productsId)
     {
       $category = $this->Productmodel->get_Category();
       $data['category'] = $category->result();
       
       $products = $this->Productmodel->getProducts($productsId);
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
         $this->Productmodel->updateProducts($productsId,$formArray);
         $this->session->set_flashdata('success','Products Updated successfully!');
         redirect(base_url().'user/Product');
        }    
     }
   
     function delete($productsId)
     {
       $this->load->model('Productmodel');
       $products = $this->Productmodel->getProducts($productsId);
       if(empty($products))
       {
         $this->session->set_flashdata('failure','Products not found in database!');
         redirect(base_url().'user/Product');  
       }
       $this->Productmodel->deleteProducts($productsId);
       $this->session->set_flashdata('success','Products deleted successfully');
         redirect(base_url().'user/Product');
     }
   }
   ?>