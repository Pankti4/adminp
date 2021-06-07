<?php
class Statemodel extends CI_Model
{   

     function create($formArray)
    {    
         $this->db->insert('states',$formArray);

    }

     function get_Country(){
        $result = $this->db->get('countries');
        return  $result;
    }
    
    function all() 
    {
        $this->db->select('states.*,countries.name as countryname');
        $this->db->from('states');
        $this->db->join('countries','states.country_id=countries.id','left');
        return $states = $this->db->get()->result_array();

    }

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