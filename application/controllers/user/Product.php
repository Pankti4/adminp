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
        $config["base_url"] = base_url() . 'index.php/user/Product/index/';
        $config["total_rows"] = $this->Productmodel->get_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        // print_r($config);

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page_link');
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
      $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data['message'] = '';
        $data['products'] = $this->Productmodel->all($config["per_page"], $page);
        
        $data['records'] = $this->Productmodel->all($config['per_page'], $page);

        $key = $this->input->post('search');


         $this->load->view('user/prolist',$data);
     }

     public function searchUser() 
     {
        
        $key = $this->input->post('search');

        if(isset($key) and !empty($key)){
            $data['search'] = $this->Productmodel->searchRecord($key);
            $data['link'] = '';
            $data['message'] = 'Search Results';
            $data["links"] = $this->pagination->create_links();
            $this->load->view('user/prolist', $data);
        }
        else {
            redirect('user/Product') ;
        }
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