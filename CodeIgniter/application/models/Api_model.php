<?php
 class Api_model extends CI_model{

    public function fetch_all()
    {
        $this->db->order_by('id','DESC');
        return
       
        $this->db->get('emp');
    }

    public function insert_api($data){
       $this->db->insert('emp',$data); 
       
    }
 }

?>