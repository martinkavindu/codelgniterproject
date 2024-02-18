<?php

class product_filter_model extends CI_model{

   public function  fetch_filter_type($type){

    $this->db->distinct();
    $this->db->select($type);
    $this->db->from('product');

    $this->db->where('product_status','1');
    return $this->db->get();

   }
}


?>