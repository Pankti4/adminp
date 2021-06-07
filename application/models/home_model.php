<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Home_model extends CI_Model {
 public function fillgrid(){ 
    $this->db->order_by("id", "desc"); 
        $data = $this->db->get('countries');
        foreach ($data->result() as $row){
            $edit = base_url().'user/home/edit/';
            $delete = base_url().'user/home/delete/';
            echo "
<tr>
<td>$row->name</td>
<td>$row->status</td>
<td>$row->created</td>
<td><a href='$edit' data-id='$row->id' class='btnedit' title='edit'><i class='glyphicon glyphicon-pencil' title='edit'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='$delete' data-id='$row->id' class='btndelete' title='delete'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
}
        exit;
    }
  
    public function create(){
        $data = array('name'=>  $this->input->post('name'),
                'status'=>$this->input->post('status'),
                // 'contact'=>$this->input->post('contact'),
                // 'facebook_link'=>$this->input->post('facebook'),
                'created'=>date('d/m/y'));
            $this->db->insert('countries', $data);
            echo'
<div class="alert alert-success">One record inserted Successfully</div>
';
            exit;
    }
      
}
  
?>