<?php
class Statemodel extends CI_Model
{

    function __construct() 
    {
        $this->countries = 'countries';
    }

    public function get_count($params="") 
    {
        $this->db->select("COUNT(*) as allcount");
        $this->db->from('states');

        if($params != '')
        {
        $this->db->like('states.name', $params);
        }

        $query = $this->db->get();
        $result = $query->result_array();
        
        return $result[0]['allcount'];
    }


     function create($formArray)
    {    
         $this->db->insert('states',$formArray);

    }

     function get_Country(){
        $result = $this->db->get('countries');
        return  $result;
    }


    function all($limit, $start, $params="") 
    {
        $this->db->select('states.*,countries.name as countryname');
         $this->db->from('states');
         $this->db->join('countries','states.country_id=countries.id','left');

        if($params != '')
        {
        $this->db->like('states.name', $params);
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
    //     $this->db->select('states.*,countries.name as countryname');
    //     $this->db->from('states');
    //     $this->db->join('countries','states.country_id=countries.id','left');
    //     return $states = $this->db->get()->result_array();

    // }

    function getStates($statesId) 
    {
        $this->db->where('id',$statesId);
        return $states = $this->db->get('states')->row_array();
    }

    function updateStates($statesId,$formArray)
    {
        $this->db->where('id',$statesId);
        $this->db->update('states',$formArray);
    }

    function deleteStates($statesId)
    {
        $this->db->where('id',$statesId);
        $this->db->delete('states');
    }

}
?>    