<?php
class Subcatemodel extends CI_Model
{  

    function __construct() 
    {
        $this->categories = 'categories';
    } 

    public function get_count($params="") 
    {
        $this->db->select("COUNT(*) as allcount");
        $this->db->from('subcategories');

        if($params != '')
        {
        $this->db->like('subcategories.name', $params);
        }

        $query = $this->db->get();
        $result = $query->result_array();
        
        return $result[0]['allcount'];
    }



     function create($formArray)
    {    
         $this->db->insert('subcategories',$formArray);

    }


    function get_Category(){
        $result = $this->db->get('categories');
        return  $result;
    }

    function all($limit, $start, $params="") 
    {
        $this->db->select('subcategories.*,categories.name as categoryname');
        $this->db->from('subcategories');
        $this->db->join('categories','subcategories.category_id=categories.id','left');

        if($params != '')
        {
        $this->db->like('subcategories.name', $params);
        }

        
        $this->db->limit($limit,$start);
        
        $result = $this->db->get();
        $str = $this->db->last_query();
   
        // echo "<pre>";
        // print_r($str);
        // exit;

        return $result->result_array();

    }




    // function all() 
    // {
    //     $this->db->select('subcategories.*,categories.name as categoryname');
    //     $this->db->from('subcategories');
    //     $this->db->join('categories','subcategories.category_id=categories.id','left');
    //     return $subcategories = $this->db->get()->result_array();

    // }

    function getSubcategories($subcategoriesId) 
    {
        $this->db->where('id',$subcategoriesId);
        return $subcategories = $this->db->get('subcategories')->row_array();
    }

    function updateSubcategories($subcategoriesId,$formArray)
    {
        $this->db->where('id',$subcategoriesId);
        $this->db->update('subcategories',$formArray);
    }

    function deleteSubcategories($subcategoriesId)
    {
        $this->db->where('id',$subcategoriesId);
        $this->db->delete('subcategories');
    }

}
?>    