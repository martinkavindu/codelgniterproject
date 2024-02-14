<?php

class register_model extends CI_Model{


    public function insert($data)
    {

        $this->db->insert('register',$data);

        return $this->db->insert_id();
    }
}





?>