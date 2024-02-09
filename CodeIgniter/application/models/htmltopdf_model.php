<?php
class Htmltopdf_model extends CI_Model
{
 function fetch()
 {
  $this->db->order_by('id', 'DESC');
  return $this->db->get('emp');
 }
 function fetch_single_details($customer_id)
 {
  $this->db->where('id', $customer_id);
  $data = $this->db->get('emp');
  $output = '<table width="100%" cellspacing="5" cellpadding="5">';
  foreach($data->result() as $row)
  {
   $output .= '
   <tr>
    <td width="25%"><img src="'.base_url().'uploads/'.$row->images.'" /></td>
    <td width="75%">
     <p><b>Name : </b>'.$row->name.'</p>
     <p><b>Address : </b>'.$row->address.'</p>
     <p><b>Skills : </b>'.$row->skills.'</p>
     <p><b>Designation: </b>'.$row->designation.'</p>
     <p><b>Age : </b> '.$row->age.' </p>
    </td>
   </tr>
   ';
  }
  $output .= '
  <tr>
   <td colspan="2" align="center"><a href="'.base_url().'htmltopdf" class="btn btn-primary">Back</a></td>
  </tr>
  ';
  $output .= '</table>';
  return $output;
 }
}

?>