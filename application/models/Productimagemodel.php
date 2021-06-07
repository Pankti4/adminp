<?php
class Productimagemodel extends CI_Model
{   

     function create($formArray)
    {    
         $this->db->insert('productimage',$formArray);
    }


    function get_Product()
    {
        $result = $this->db->get('products');
        return  $result;
    }

    function get_Product_id($id)
    {
        $this->db->select('productimage.*,products.id as proid,products.name');
        $this->db->from('productimage');
        $this->db->join('products','products.id=productimage.product_id','left');
        $this->db->where('productimage.product_id',$id);
        return $productimage = $this->db->get();
    }

    function all() 
    {
        $this->db->select('productimage.*,products.id as proid,products.name');
        $this->db->from('productimage');
        $this->db->join('products','products.id=productimage.product_id','left');
        return $productimage = $this->db->get();

    }

    function getImg($imgId) 
    {
        $this->db->where('id',$imgId);
        return $result = $this->db->get('productimage');
    }

    function updateImg($imgId,$formArray)
    {
        
        $this->db->where('id',$imgId);
        $this->db->update('productimage',$formArray);
    }

    function deleteImg($imgId)
    {
        $this->db->where('id',$imgId);
        $this->db->delete('productimage');
    }

}
?>    