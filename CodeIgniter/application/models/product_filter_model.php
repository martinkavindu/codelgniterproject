<?php

class product_filter_model extends CI_model{

   public function  fetch_filter_type($type){

    $this->db->distinct();
    $this->db->select($type);
    $this->db->from('product');

    $this->db->where('product_status','1');
    return $this->db->get();

   }
   public function make_query($minimum_price,$maximum_price,$brand,$ram,$storage){

$query ="SELECT * FROM  product WHERE product_status = '1'";

 if(isset($minimum_price,$maximum_price) && !empty($minimum_price)&& !empty($maximum_price))
 {
    $query .= "AND product_price BETWEEN'".$_POST["minimum_price"]."'AND '".$_POST["maximum_price"]."'";
 }

 if(isset($brand)){
    $brand_filter = implode("','",$brand);
    $query .= "AND product_brand IN('".$brand_filter."')";
 }

 if(isset($ram)){
$ram_filter = implode("','",$ram);
$query .= "AND product_ram IN ('".$ram_filter."')";
 }

 if(isset($storage)){
    $storage_filter = implode("','",$storage);
    
    $query .= " AND product_storage IN ('".$storage_filter."')";

 }
 return $query;
 
   }

   public function count_all($minimum_price,$maximum_price,$brand,$ram,$storage){

    $query =$this->make_query($minimum_price,$maximum_price,$brand,$ram,$storage);

    $data = $this->db->query($query);

    return $data->num_rows();
   }
}


?>