<?php
class Dynamic_dependent_model extends CI_Model
{
 function fetch_category()
 {
  $this->db->order_by("category_name", "ASC");
  $query = $this->db->get("category");
  return $query->result();
 }

 function fetch_subcategory($category_id)
 {
  $this->db->where('category_id', $category_id);
  $this->db->order_by('subcategory_name', 'ASC');
  $query = $this->db->get('subcategory');
  $output = '<option value="">Select Subcategory</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->subcategory_id.'">'.$row->subcategory_name.'</option>';
  }
  return $output;
 }
}

?>