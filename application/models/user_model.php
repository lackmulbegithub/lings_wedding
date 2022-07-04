<?php
class User_model extends CI_Model{
    function getActiveUserCount(){
        $table = $this->db->dbprefix('users us');
        $this->db->select('count(us.id) as totalActiveUsrs');
        $this->db->from($table);
        $this->db->where('us.is_active',1);
        $this->db->where('us.is_verified',1);
        $query = $this->db->get();
        //die(print($this->db->last_query()));
        if($query->num_rows() > 0)
        {
            return $query->row()->totalActiveUsrs;
        }
        else{
            return "No data found";
        }
    }

    function getCountOfActiveUsersOfAttachedActiveProducts(){
        $table1 = $this->db->dbprefix('users us');
        $table2 = $this->db->dbprefix('user_product up');
        $table3 = $this->db->dbprefix('products pr');
        $this->db->select('count(distinct(us.id)) as totalActiveUsrs');
        $this->db->from($table1);
        $this->db->join($table2,'us.id=up.user_id');
        $this->db->join($table3,'pr.id=up.product_id');
        $this->db->where('us.is_active',1);
        $this->db->where('us.is_verified',1);
        $this->db->where('pr.is_active',1);
        $query = $this->db->get();
        //die(print($query->row()->totalActiveUsrs));
        if($query->num_rows() > 0)
        {
            return $query->row()->totalActiveUsrs;
        }
        else{
            return "No data found";
        }
    }
}