<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CrudController extends CI_Controller{

    public function index(){

        $this->load->view('crud_view');
    }


    public function fetch_user(){
        $this->load->model('CrudModel');
        $fetch_data= $this->CrudModel->make_datatables();
       $data = array();

       foreach($fetch_data as $row){

        $sub_array = array();

        $sub_array[] = $row->email;
        $sub_array[] = $row->name;
        $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" 
        class="btn btn-warning btn-xs">update</button>';
        $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" 
        class="btn btn-danger btn-xs">delete</button>';

        $data[]= $sub_array;
       }

       $output = array(
        "draw"         => intval($_POST['draw']),
        'recordsTotal' =>$this->CrudModel->get_all_data(),
        'recordsFiltered' =>$this->CrudModel->get_filtered_data(),
        'data'          =>$data

       );

       echo json_encode($output);

    }
}



?>