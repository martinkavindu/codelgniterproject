

<?php 

class ajaxsearch_model extends CI_Model{

    public function fetch_data($query){
       
        
        $this->db->select("*");
        $this->db->from('emp');

           if($query !=""){

            $this->db->like('name',$query);
            $this->db->or_like('skills',$query);
            $this->db->or_like('address',$query);
            $this->db->or_like('designation',$query);
            $this->db->or_like('age',$query);
           }

           $this->db->order_by('age','ASC');

           return $this->db->get();
    }
}

?>