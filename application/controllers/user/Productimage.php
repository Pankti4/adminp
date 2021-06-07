<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productimage extends CI_Controller {

  public function __construct() 
    {
           parent::__construct(false);
           $this->load->model('Productimagemodel');
           $this->load->helper(array('form', 'url')); 
           
       }

  function index()
  {   
       $img = $this->Productimagemodel->all();
       $data['img'] = $img->result();
       $this->load->view('user/imglist',$data);
  }

  function create($id)
   {
      $product = $this->Productimagemodel->get_Product_id($id);
      $data['product'] = $product->result();
      $data['pid'] = $id;
      $this->load->view('user/imgcreate',$data); 
      
      if(!empty($_FILES['imagename']['name'])) 
      {
      $image = array();
      $cpt = count($_FILES['imagename']['name']);
      $files = $_FILES;
        for($i=0; $i<$cpt; $i++)
        {
            $_FILES['imagename']['name']= $files['imagename']['name'][$i];
            $_FILES['imagename']['type']= $files['imagename']['type'][$i];
            $_FILES['imagename']['tmp_name']= $files['imagename']['tmp_name'][$i];
            $_FILES['imagename']['error']= $files['imagename']['error'][$i];
            $_FILES['imagename']['size']= $files['imagename']['size'][$i];    

            $uploads_dir = APPPATH."../uploads/files/";
            $tmp_name = $_FILES["imagename"]["tmp_name"];
            $image_name = $_FILES["imagename"]["name"];
            move_uploaded_file($tmp_name, $uploads_dir.'/'.$image_name);
            $image_url = $image_name;
            //array_push($image,$image_url);

            $formArray = array();
            $formArray['product_id'] = $id;
            $formArray['imagename'] = $image_url;
            $formArray['status'] = 1;
            $formArray['created'] = date('Y-m-d H:i:s', time());
            //print_r($formArray); die();
            $this->Productimagemodel->create($formArray);
          }
          $this->session->set_flashdata('success','Image Successfully Added!');
          redirect(base_url().'user/Productimage/create/'.$id);
        }  
    }

  function edit($imgId)
  {
    $product = $this->Productimagemodel->get_Product();
    $data['product'] = $product->result();
    
    $img1 = $this->Productimagemodel->getImg($imgId);
    $data['img'] = $img1;

    $formArray = array();
    $this->form_validation->set_rules('imagename','ImageName','required');
    $this->form_validation->set_rules('status','Status','required');
    
    if ($this->form_validation->run() == false) 
    {
      $this->load->view('user/imgedit',$data);
    } else {
      $formArray = array();
      $formArray['id'] = $this->input->post('img_id');
      $formArray['product_id'] = $this->input->post('product');
      $formArray['imagename'] = $this->input->post('imagename');
      $formArray['status'] = $this->input->post('status',true);
      $formArray['updated'] = date('Y-m-d H:i:s', time());
     

      $this->Productimagemodel->updateImg($formArray['id'],$formArray);
      $this->session->set_flashdata('success','ImageName Updated successfully!');
      redirect(base_url().'user/Productimage');
     }    
  }

  function delete($imgId)
  {
    $this->load->model('Productimagemodel');
    $img = $this->Productimagemodel->getImg($imgId);
    if(empty($img))
    {
      $this->session->set_flashdata('failure','ImageName not found in database!');
      redirect(base_url().'user/Productimage');  
    }
    $this->Productimagemodel->deleteImg($imgId);
    $this->session->set_flashdata('success','ImageName deleted successfully');
      redirect(base_url().'user/Productimage');
  }
}
?>