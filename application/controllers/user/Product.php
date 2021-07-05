<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   class Product extends CI_Controller 
   {
      
     public function __construct() 
     {
           parent::__construct();

           $this->load->helper('url','form');
           $this->load->library(array("pagination"));
           $this->load->model('Productmodel');
      }

        function index()
        {
        $config = array();
              
        $config['page_query_string'] = TRUE;
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = FALSE;
        $config['prefix'] = '';
        $config['suffix'] = '';
        $config['use_global_url_suffix'] = FALSE;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '<p>';
        
        
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page_link');
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $search_text = "";
        
        $allcount = $this->Productmodel->get_count($search_text);

        $search_text = $this->input->get('searchKeyword');

        $config['base_url'] = base_url().'index.php/user/Product/index?searchKeyword='.$search_text;
        $config['first_url'] = $config['base_url'];
         
        $config['total_rows'] = $this->Productmodel->get_count($search_text);

        if ($this->input->get('searchKeyword')) $config['suffix'] = '&' . http_build_query($_GET, '', "&");

        $config['per_page'] = 3;
        $config['use_page_numbers'] = TRUE;
        

        $this->pagination->initialize($config);

        $data["pagination"] = $this->pagination->create_links();


        if($this->input->get('per_page') && $this->input->get('per_page')!='1' ){
            $page = (($this->input->get('per_page') * $config['per_page']) - $config['per_page']) ;
         }
         else{
            $page = '0';
         }
         // echo ($page); die();
         $data['products'] = $this->Productmodel->all($config["per_page"], $page, $search_text);

        
      if($this->input->get('submitSearch') != NULL )
      {
      $search_text = $this->input->get('searchKeyword');
      }
 
        $data['searchKeyword'] = $search_text;

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