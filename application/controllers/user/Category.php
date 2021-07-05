<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {

public function __construct() 
     {
           parent::__construct();

           $this->load->helper('url','form');
           $this->load->library(array("pagination"));
           $this->load->model('Categorymodel');
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
        
        $allcount = $this->Categorymodel->get_count($search_text);

        $search_text = $this->input->get('searchKeyword');

        $config['base_url'] = base_url().'user/Category/index?searchKeyword='.$search_text;
        $config['first_url'] = $config['base_url'];
         
        $config['total_rows'] = $this->Categorymodel->get_count($search_text);

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
         $data['categories'] = $this->Categorymodel->all($config["per_page"], $page, $search_text);

        
      if($this->input->get('submitSearch') != NULL )
      {
      $search_text = $this->input->get('searchKeyword');
      }
 
        $data['searchKeyword'] = $search_text;

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