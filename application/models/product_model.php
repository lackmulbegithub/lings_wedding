<?php
class Product_model extends CI_Model{
    function getActiveProductsCount(){
        $table = $this->db->dbprefix('products pr');
        $this->db->select('count(id) as product_count');
        $this->db->from($table);
        $this->db->where('pr.is_active',1);
        $query = $this->db->get();
        //die(print($query->row()->product_count));
        if($query->num_rows() > 0)
        {
            return $query->row()->product_count;
        }
        else{
            return "No data found";
        }
    }
}