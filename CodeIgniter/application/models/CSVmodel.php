<?php
class CSVmodel extends CI_Model
{
  public function select()
 {
  $this->db->order_by('id', 'DESC');
  $query = $this->db->get('users');
  return $query;
 }

  public function insert($data)
 {
  $this->db->insert_batch('users', $data);
 }
}
?>