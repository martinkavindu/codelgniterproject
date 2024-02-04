<?php

class Excel_export_model extends CI_Model{

    public function fetch_users(){
    
$this->db->order_by("id","ASC");

$query = $this->db->get("users");
return $query->result();
    }
}

?>