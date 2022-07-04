<?php
class User_model extends CI_Model{
    function getActiveUserCount(){
        $table = $this->db->dbprefix('users us');
        $this->db->select('count(us.id) as totalActiveUsrs');
        $this->db->from($table);
        $this->db->where('is_active',1);
        $this->db->where('is_verified',1);
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
}