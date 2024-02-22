<?php

defined('BASEPATH') OR exit('No direct script allowed');

class ExportRecord extends CI_Controller{

    public function __construct(){

parent::__construct();

$this->load->model('exportrecordmodel');

    }
 public function index(){
    $data['emp_data'] = $this->exportrecordmodel->fetch_data();

    $this->load->view('exportrecord',$data);

 } 

 public function export()
 {
     $file_name = 'employee_details_on_' . date('d-M-Y') . '.csv';
     header("Content-Description: File Transfer");
     header("Content-Disposition: attachment; filename=$file_name");
     header("Content-Type: application/csv;");
 
     $emp_data = $this->exportrecordmodel->fetch_data();
 
     $file = fopen('php://output', 'w');
 
     $header = array("Name", "Skills", "Address", "Designation", "Age");
     fputcsv($file, $header);
 
     foreach ($emp_data as $employee) {
         fputcsv($file, array($employee->name, $employee->skills, $employee->address, $employee->designation, $employee->age));
     }
 
     fclose($file);
     exit;
 }
 

}


?>