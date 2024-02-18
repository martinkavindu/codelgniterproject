
<?php
class multiple_deletemodel extends CI_Model{

    public function fetch_data(){

      $this->db->select("*");
      $this->db->from('emp');
      $this->db->order_by('id','ASC');
      return $this->db->get() ; 
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('emp');

    }
}




?>