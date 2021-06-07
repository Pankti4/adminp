<?php
class Countrymodel extends CI_Model
{

     function create($formArray)
    {    
         $this->db->insert('countries',$formArray);

    }

    function all() 
    {
        return $countries = $this->db->get('countries')->result_array();

    }

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