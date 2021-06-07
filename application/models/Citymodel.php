<?php
class Citymodel extends CI_Model
{   

    function __construct() 
    {
        $this->countryTbl = 'countries';
        $this->stateTbl = 'states';
    }

    function get_Country(){
        $result = $this->db->get('countries');
        return  $result;
    }

    function getCountryRows($params = array()){
        $this->db->select('c.id, c.name');
        $this->db->from($this->countryTbl.' as c');
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                if(strpos($key,'.') !== false){
                    $this->db->where($key,$value);
                }else{
                    $this->db->where('c.'.$key,$value);
                }
            }
        }
        $this->db->where('c.status','1');
        
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

        //return fetched data
        return $result;
    }


    function getStateRows($params = array()){
        $this->db->select('s.id, s.name');
        $this->db->from($this->stateTbl.' as s');
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                if(strpos($key,'.') !== false){
                    $this->db->where($key,$value);
                }else{
                    $this->db->where('s.'.$key,$value);
                }
            }
        }
        
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

        //return fetched data
        return $result;
    }
    


     function create($formArray)
    {    
         $this->db->insert('cities',$formArray);

    }

    function all() 
    {
        return $cities = $this->db->get('cities')->result_array();

    }

    function city_all()
    {
        $this->db->select('cities.*,states.name as statename,countries.name as countryname');
        $this->db->from('cities');
        $this->db->join('states','states.id=cities.state_id','left');
        $this->db->join('countries','countries.id=cities.country_id','left');
        $result = $this->db->get();
        return $result;
    }

    function getCities($citiesId) 
    {
        $this->db->select('cities.*,states.name as statename,countries.name as countryname');
        $this->db->from('cities');
        $this->db->join('states','states.id=cities.state_id','left');
        $this->db->join('countries','countries.id=cities.country_id','left');
        $this->db->where('cities.id',$citiesId);
        return $cities = $this->db->get()->row_array();
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