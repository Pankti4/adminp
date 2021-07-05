<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Country extends CI_Controller 
{
  public function __construct() 
     {
           parent::__construct();

           $this->load->helper('url','form');
           $this->load->library(array("pagination"));
           $this->load->model('Countrymodel');
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
        
        $allcount = $this->Countrymodel->get_count($search_text);

        $search_text = $this->input->get('searchKeyword');

        $config['base_url'] = base_url().'user/Country/index?searchKeyword='.$search_text;
        $config['first_url'] = $config['base_url'];
         
        $config['total_rows'] = $this->Countrymodel->get_count($search_text);

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
         $data['countries'] = $this->Countrymodel->all($config["per_page"], $page, $search_text);

        
      if($this->input->get('submitSearch') != NULL )
      {
      $search_text = $this->input->get('searchKeyword');
      }
 
        $data['searchKeyword'] = $search_text;

         $this->load->view('user/list',$data);



      // $this->load->model('Countrymodel');
      // $countries = $this->Countrymodel->all();
      // $data = array();
      // $data['countries'] = $countries;
      // $this->load->view('user/list',$data);
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