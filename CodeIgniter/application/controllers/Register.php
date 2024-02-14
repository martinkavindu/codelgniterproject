<?php
 defined('BASEPATH') OR exit('no direct script access allowed');


 class Register extends CI_Controller{

 public function _construct(){
    parent::_construct();
    $this->load->library('form_validation');
    $this->load->library('encrypt');
    $this->load->model('register_model');

 }

    public function registeruser(){

        $this->load->view('userregistration');


    }
 }


?>