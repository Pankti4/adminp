<?php
class Countrymodel extends CI_Model{

    public function get_country(){

        if(!empty($this->input->get("search"))){

          $this->db->like('name', $this->input->get("search"));

          $this->db->or_like('status', $this->input->get("search")); 

        }

        $query = $this->db->get("countries");

        return $query->result();

    }


public function update_status_model($id,$status)
{
    //here we will change the value of the status that if we get the value one of the status then zero is updated in database otherwise one.

    if($status == 1)
    {
        $sval = 0;
    }
    else{
        $sval = 1;
    }

    // update status value in database 
    $data = array( 'status' => $sval );

    $this->db->where('id',$id);

    return $this->db->update('countries',$data);
}



    public function insert_country($formArray)

    {    

        // $formArray = array(

        //     'name' => $this->input->post('name'),

        //     'status' => $this->input->post('status')

        // );

         $this->db->insert("countries",$formArray);

    }



    public function update_country($id) 

    {

        $data=array(

            'name' => $this->input->post('name'),

            'status'=> $this->input->post('status')

        );

        if($id==0){

            return $this->db->insert('countries',$data);

        }else{

            $this->db->where('id',$id);

            return $this->db->update('countries',$data);

        }        

    }



    public function find_country($id)

    {

        return $this->db->get_where('countries', array('id' => $id))->row();

    }



    public function delete_country($id)

    {

        return $this->db->delete('countries', array('id' => $id));

    }

}

?>