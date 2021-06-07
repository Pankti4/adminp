<?php 

class Pin_model extends CI_Model
{
	public function createData($data)
	{
		$query = $this->db->insert('pin',$data);
		return $query;
	}

	public function fetchAllData($data,$tablename,$where)
	{
		$query = $this->db->select($data)
				->from($tablename)
				->where($where)
				->get();
		return $query->result_array();
	}
}