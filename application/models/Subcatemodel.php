<?php
class Subcatemodel extends CI_Model
{   

     function create($formArray)
    {    
         $this->db->insert('subcategories',$formArray);

    }


    function get_Category(){
        $result = $this->db->get('categories');
        return  $result;
    }

    function all() 
    {
        $this->db->select('subcategories.*,categories.name as categoryname');
        $this->db->from('subcategories');
        $this->db->join('categories','subcategories.category_id=categories.id','left');
        return $subcategories = $this->db->get()->result_array();

    }

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