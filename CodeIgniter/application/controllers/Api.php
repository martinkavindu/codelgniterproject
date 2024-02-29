<?php
defined('BASEPATH') OR exit('no direct script access allowed');


class Api extends CI_Controller{
    
    public function  __construct(){

        parent::__construct();

        $this->load->model('Api_model');
     


    }

    public function index(){
     $data = $this->Api_model->fetch_all();
     echo json_encode($data->result_array());
    }
    public function insert(){

        $this->form_validation->set_rules('name','name','required');
        $this->form_validation->set_rules('skills','skills','required');

        if($this->form_validation->run())
        {


        }else
        {
            
        }
    }

}




?>