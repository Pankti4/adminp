<?php
class Productmodel extends CI_Model
{   
    function __construct() 
    {
        $this->subcategories = 'subcategories';
    }


    public function get_count() 
    {
        return $this->db->count_all("products");
    }

    public function get_data($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("products");
        return $query->result();
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
        $this->db->select('products.*,categories.name as catname,subcategories.name as subcatname');
        $this->db->from('products');
        $this->db->join('categories','categories.id=products.category_id','left');
        $this->db->join('subcategories','subcategories.id=products.subcategory_id','left');
        $result = $this->db->get();
        return $result;

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