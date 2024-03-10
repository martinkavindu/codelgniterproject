<?php

defined('BASEPATH') OR exit("no direct script allowed");

class Alertexample extends CI_Controller
{

    public function index(){
    
        $this->load->view('alert');

    }
    public function validation(){
        $this->form_validation->set_rules('name','name','required');

        if($this->form_validation->run() == TRUE){
            $this->session->set_flashdata('success','good work');
        }else
        {
            $this->session->set_flashdata('error','something wrong');
        }
        redirect('alertexample');
    }
}


?>