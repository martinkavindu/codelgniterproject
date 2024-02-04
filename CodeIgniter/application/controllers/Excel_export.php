<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_export extends CI_Controller{

    public function exportusers(){
        $this->load->model("Excel_export_model");
        $data['usersdata'] = $this->Excel_export_model->fetch_users();

        $this->load->view('excelexport',$data);
    }

   public  function action()
 {
  $this->load->model("Excel_export_model");
  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);

  $table_columns = array("id", "email", "name", "password");

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $usersdata= $this->Excel_export_model->fetch_users();

  $excel_row = 2;

  foreach($employee_data as $row)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->id);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->email);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->password);
   $excel_row++;
  }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="users Data.xls"');
  $object_writer->save('php://output');
 }

}

?>