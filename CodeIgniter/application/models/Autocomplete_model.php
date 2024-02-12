<?php
class Autocoplete_model extends CI_model{

    public function fetch_data($query){

        $this->db->like('product_name',$query);
        $query = $this->db->get('products');

        if($query->num_rows()>0)
        {
            foreach($query->result_array() as $row)
            {
               $output[] = array(

                'name' => $row['product_name'],
                'image'=> $row['image'], 
               ) ;
            }

            echo json_encode($output);
        }

    }
}




?>