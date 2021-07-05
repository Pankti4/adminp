<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Main_model extends CI_Model {

  function __construct() 
    {
        $this->subcategories = 'subcategories';
    }

  // Fetch records
  public function getData($rowno,$rowperpage,$search="") {
 
    $this->db->select('*');
    $this->db->from('posts');

    if($search != ''){
      $this->db->like('title', $search);
      $this->db->or_like('content', $search);
    }

    $this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();
 
    return $query->result_array();
  }

  // Select total records
  public function getrecordCount($search = '') {

    $this->db->select('count(*) as allcount');
    $this->db->from('posts');
 
    if($search != ''){
      $this->db->like('title', $search);
      $this->db->or_like('content', $search);
    }

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }


  function create($formArray)
    {    
         $this->db->insert('products',$formArray);

    }

    function get_Category()
    {
        $result = $this->db->get('categories');
        return  $result;
    }

    
    public function setCategoryID($categoryid) 
    {
        return $this->_categoryid = $categoryid;
    }


    public function getSubcategory() 
    {
        $this->db->select(array('s.id as subcat_id', 's.category_id', 's.name as subcat_name'));
        $this->db->from('subcategories as s');
        $this->db->where('s.category_id', $this->_categoryid);
        $query = $this->db->get();
        return $query->result_array();
    }


    function all() 
    {
        // $this->db->limit($limit, $start);
        $this->db->select('products.*,categories.name as catname,subcategories.name as subcatname');
        $this->db->from('products');
        $this->db->join('categories','categories.id=products.category_id','left');
        $this->db->join('subcategories','subcategories.id=products.subcategory_id','left');

        //  if($params != '')
        // {
        // $this->db->like('products.name', $params);
        // }
        // $this->db->limit($limit,$start);
        $result = $this->db->get();
        return $result->result_array();
    }


    function getProducts($productsId) 
    {
        
        $this->db->select('products.*,categories.name as catname,subcategories.name as subcatname');
        $this->db->from('products');
        $this->db->join('categories','categories.id=products.category_id','left');
        $this->db->join('subcategories','subcategories.id=products.subcategory_id','left');
        $this->db->where('products.id',$productsId);
        $result = $this->db->get();
        return $result;
    }

    function updateProducts($productsId,$formArray)
    {
        $this->db->where('id',$productsId);
        $this->db->update('products',$formArray);
    }

    function deleteProducts($productsId)
    {
        $this->db->where('id',$productsId);
        $this->db->delete('products');
    }

}
?>