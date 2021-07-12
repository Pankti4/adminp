<?php
class Citymodel extends CI_Model
{   
    
    function __construct() 
    {
        $this->states = 'states';
    }


    public function get_count($params="") 
    {
        $this->db->select("COUNT(*) as allcount");
        $this->db->from('cities');

        if($params != '')
        {
        $this->db->like('cities.name', $params);
        }

        $query = $this->db->get();
        $result = $query->result_array();
        
        return $result[0]['allcount'];
    }


     function create($formArray)
    {    
         $this->db->insert('cities',$formArray);

    }

    function get_Country()
    {
        $result = $this->db->get('countries');
        return  $result;
    }

    
    public function setCountryID($countryid) 
    {
        return $this->_countryid = $countryid;
    }


    public function getState() 
    {
        $this->db->select(array('s.id as state_id', 's.country_id', 's.name as state_name'));
        $this->db->from('states as s');
        $this->db->where('s.country_id', $this->_countryid);
        $query = $this->db->get();
        return $query->result_array();
    }



    function all($limit, $start, $params="") 
    {
        $this->db->select('cities.*,countries.name as cname,states.name as sname');
        $this->db->from('cities');
        $this->db->join('countries','countries.id=cities.country_id','left');
        $this->db->join('states','states.id=cities.state_id','left');

        if($params != '')
        {
        $this->db->like('cities.name', $params);
        }

        
        $this->db->limit($limit,$start);
        
        $result = $this->db->get();
        $str = $this->db->last_query();
   
        // echo "<pre>";
        // print_r($str);
        // exit;

        return $result->result_array();

    }



    function getCities($citiesId) 
    {
        
        $this->db->select('cities.*,countries.name as cname,states.name as sname');
        $this->db->from('cities');
        $this->db->join('countries','countries.id=cities.country_id','left');
        $this->db->join('states','states.id=cities.state_id','left');
        $this->db->where('cities.id',$citiesId);
        $result = $this->db->get();
        return $result;
    }

    function updateCities($citiesId,$formArray)
    {
        $this->db->where('id',$citiesId);
        $this->db->update('cities',$formArray);
    }

    function deleteCities($citiesId)
    {
        $this->db->where('id',$citiesId);
        $this->db->delete('cities');
    }

}
?>    