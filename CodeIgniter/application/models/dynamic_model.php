<?php


class dynamic_model extends CI_model{
    public function fetchphone(){
     $this->db->order_by('phone','ASC');
      $query = $this->db->get('members');
      return $query->result();  
    }

    public function fetch_email($phone){
$this->db->where('phone',$phone);
$this->db->order_by('email','ASC');

$query = $this->db->get('members');

$output = '<option value = "">select email</option>';

foreach($query->result() as $row)
{
    $output .='<option value ="'.$row->email.'">'.$row->email.' </option>';

}
 return $output;

    }

    public function fetchname($email){
$this->db->where('email',$email);
$this->db->order_by('name','ASC');

$query = $this->db->get('members');

$output ='<option value ="">select name</option>';
foreach($query->result() as $row)
{

   $output = '<option value ="'.$row->name.'"> '.$row->name.'</option>';
}

return $output;

    }
}
?>