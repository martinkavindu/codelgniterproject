<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Searchajax extends CI_Controller {

 public function search()
 {
  $this->load->view('ajaxsearch');
 }

 public function fetch_emp()
 {
  $output = '';
  $query = '';
  $this->load->model('ajaxsearch_model');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data = $this->ajaxsearch_model->fetch_data($query);
  $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th>Employee Name</th>
       <th>Skills</th>
       <th>address</th>
       <th>designation</th>
       <th>age</th>
      </tr>
  ';
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
      <tr>
       <td>'.$row->name.'</td>
       <td>'.$row->skills.'</td>
       <td>'.$row->address.'</td>
       <td>'.$row->designation.'</td>
       <td>'.$row->age.'</td>
      </tr>
    ';
   }
  }
  else
  {
   $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
  }
  $output .= '</table>';
  echo $output;
 }
 
}