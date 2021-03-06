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

    function getActiveProductsNotBelongsToUser(){
        $table1 = $this->db->dbprefix('products pr');
        $table2 = $this->db->dbprefix('user_product up');
        $this->db->select('distinct(product_id)');
        $this->db->from($table2);
        $product_belongs_to = $this->db->get();
        if($product_belongs_to->num_rows()>0)
        {
            foreach($product_belongs_to->result() as $rows)
            {
                $product_list[] = $rows->product_id;
            }
        }
        else{
            return "No data found";
        }
        $this->db->select('count(pr.id) as totalProducts');
        $this->db->from($table1);
        $this->db->where_not_in('pr.id',$product_list);
        $this->db->where('pr.is_active',1);
        $query = $this->db->get();
        //die(print($query->row()->product_count));
        if($query->num_rows() > 0)
        {
            return $query->row()->totalProducts;
        }
        else{
            return "No data found";
        }
    }

    function getAmountOfActiveAttachedProducts()
    {
        $table1 = $this->db->dbprefix('products pr');
        $table2 = $this->db->dbprefix('user_product up');
        $this->db->select('sum(up.qty) as prod_amount');
        $this->db->from($table2);
        $this->db->join($table1,'pr.id=up.product_id');
        $this->db->where('pr.is_active',1);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row()->prod_amount;
        }
        else{
            return "No data found";
        }
    }

    function getPriceOfActiveAttachedProducts()
    {
        $table1 = $this->db->dbprefix('products pr');
        $table2 = $this->db->dbprefix('user_product up');
        $this->db->select('sum(up.qty * up.price) as prod_price');
        $this->db->from($table2);
        $this->db->join($table1,'pr.id=up.product_id');
        $this->db->where('pr.is_active',1);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row()->prod_price;
        }
        else{
            return "No data found";
        }
    }

    function getSummerizedPriceOfActiveProductsUserWise()
    {
        $table1 = $this->db->dbprefix('products pr');
        $table2 = $this->db->dbprefix('user_product up');
        $table3 = $this->db->dbprefix('users us');
        $this->db->select('sum(up.qty * up.price) as prod_price,us.name');
        $this->db->from($table2);
        $this->db->join($table1,'pr.id=up.product_id');
        $this->db->join($table3,'us.id = up.user_id');
        $this->db->where('pr.is_active',1);
        $this->db->group_by('up.user_id');
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            $output = "";
            foreach($query->result() as $rows){
                $output = $output.", ".$rows->name." - ".$rows->prod_price."$";
            }
            $output = substr($output,1);
            return $output;
        }
        else{
            return "No data found";
        }
    }
}