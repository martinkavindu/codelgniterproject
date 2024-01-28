<?php

class CartModel extends CI_Model {

    public function fetch_all(){

        $query = $this->db->get('products');
        return $query->result();
    }

 

}


?>