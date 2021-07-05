<?php
class Categorymodel extends CI_Model
{   

    public function get_count($params="") 
    {
        $this->db->select("COUNT(*) as allcount");
        $this->db->from('categories');

        if($params != '')
        {
        $this->db->like('categories.name', $params);
        }

        $query = $this->db->get();
        $result = $query->result_array();
        
        return $result[0]['allcount'];
    }



     function create($formArray)
    {    
         $this->db->insert('categories',$formArray);

    }


    function all($limit, $start, $params="") 
    {
        $this->db->select('*');
        $this->db->from('categories');
        

        if($params != '')
        {
        $this->db->like('categories.name', $params);
        }

        
        $this->db->limit($limit,$start);
        
        $result = $this->db->get();
        $str = $this->db->last_query();
   

        return $result->result_array();

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