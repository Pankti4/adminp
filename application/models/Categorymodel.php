<?php
class Categorymodel extends CI_Model
{   

     function create($formArray)
    {    
         $this->db->insert('categories',$formArray);

    }

    function all() 
    {
        return $categories = $this->db->get('categories')->result_array();

    }

    function getCategories($categoriesId) 
    {
        $this->db->where('id',$categoriesId);
        return $categories = $this->db->get('categories')->row_array();
    }

    function updateCategories($categoriesId,$formArray)
    {
        $this->db->where('id',$categoriesId);
        $this->db->update('categories',$formArray);
    }

    function deleteCategories($categoriesId)
    {
        $this->db->where('id',$categoriesId);
        $this->db->delete('categories');
    }

}
?>    