<?php
class Productmodel extends CI_Model
{   
    function __construct() 
    {
        $this->subcategories = 'subcategories';
    }


    public function get_count() 
    {
        $this->db->select("COUNT(*) as num_row");
        $this->db->from('products');
        $this->db->order_by('id');
        $query = $this->db->get();
        return $this->db->count_all("products");
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

    public function searchRecord($data)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->like('name',$data);
        // $this->db->or_like('',$key);
        $this->db->or_like('id',$data);
        $query = $this->db->get();

        if($query->num_rows()>0){
          return $query->result();
        }
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


    function all($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $this->db->select('products.*,categories.name as catname,subcategories.name as subcatname');
        $this->db->from('products');
        $this->db->join('categories','categories.id=products.category_id','left');
        $this->db->join('subcategories','subcategories.id=products.subcategory_id','left');
        $this->db->order_by('id');
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