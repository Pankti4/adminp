<?php
class Countrymodel extends CI_Model
{


    public function get_count($params="") 
    {
        $this->db->select("COUNT(*) as allcount");
        $this->db->from('countries');

        if($params != '')
        {
        $this->db->like('countries.name', $params);
        }

        $query = $this->db->get();
        $result = $query->result_array();
        
        return $result[0]['allcount'];
    }

    
     function create($formArray)
    {    
         $this->db->insert('countries',$formArray);

    }

    function all($limit, $start, $params="") 
    {
        $this->db->select('*');
        $this->db->from('countries');
        

        if($params != '')
        {
        $this->db->like('countries.name', $params);
        }

        
        $this->db->limit($limit,$start);
        
        $result = $this->db->get();
        $str = $this->db->last_query();
   

        return $result->result_array();

    }



    // function all() 
    // {
    //     return $countries = $this->db->get('countries')->result_array();

    // }

    function getCountries($countriesId) 
    {
        $this->db->where('id',$countriesId);
        return $countries = $this->db->get('countries')->row_array();
    }

    function updateCountries($countriesId,$formArray)
    {
        $this->db->where('id',$countriesId);
        $this->db->update('countries',$formArray);
    }

    function deleteCountries($countriesId)
    {
        $this->db->where('id',$countriesId);
        $this->db->delete('countries');
    }

}
?>    