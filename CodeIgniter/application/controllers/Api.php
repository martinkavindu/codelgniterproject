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
        $this->form_validation->set_rules('address','address','required');
        $this->form_validation->set_rules('designation','designation','required');

        if($this->form_validation->run())
        {
 $data = array(
    'name'  => $this->input->post('name'),
    'skills' =>$this->input->post('skills'),
    'address' =>$this->input->post('address'),
    'designation' =>$this->input->post('designation'),

 );
 $this->Api_model->insert_api($data);
 $array = array(
'success'   =>true

 );

        }else
        {
           
            $array=array(
                'error'              =>true,
                'name'               =>form_error('name'),
                'skills'             =>form_error('skills'), 
                'address'           =>form_error('address'),
                'designation'       =>form_error('designation'),

            );
        }
        echo json_encode($array);
    }

}




?>