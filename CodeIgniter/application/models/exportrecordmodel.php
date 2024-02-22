<?php

class Exportrecordmodel extends CI_Model {
    public function fetch_data() {
        $this->db->select("*");
        $this->db->from("emp");
        return $this->db->get()->result(); 
    }
}

?>