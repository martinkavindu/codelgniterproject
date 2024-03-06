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
    public function fetch_single_user($user_id){
      $this->db->where('id',$user_id);
       $query = $this->db->get('emp');

       return $query->result_array();
    }
    public function update_api($user_id,$data)
    {
      $this->db->where('id',$user_id);
      $this->db->update('emp',$data);
    }
 }

?>