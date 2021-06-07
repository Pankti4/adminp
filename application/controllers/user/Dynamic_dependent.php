<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dynamic_dependent extends CI_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('dynamic_dependent_model');
 }

 function index()
 {
  $data['category'] = $this->dynamic_dependent_model->fetch_category();
  $this->load->view('user/dynamic_dependent', $data);
 }

 function fetch_subcategory()
 {
  if($this->input->post('category_id'))
  {
   echo $this->dynamic_dependent_model->fetch_subcategory($this->input->post('category_id'));
  }
 } 
}