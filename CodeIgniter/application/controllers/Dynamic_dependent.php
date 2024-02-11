<?php


defined('BASEPATH') OR exit('NO direct access allowed');

class Dynamic_dependent extends CI_Controller{

    public function __construct(){
        parent::__construct(); 

        $this->load->model('dynamic_model');

    }

    public function dynamic (){

        $data['phone'] = $this->dynamic_model->fetchphone();

        $this->load->view('dynamic_dependent',$data);
    }
 
    public function fetch_email(){

        if($this->input->post('phone'))
        {
echo $this->dynamic_model->fetch_email($this->input->post('phone'));



        }
    }

    public function fetchname(){
         
        if($this->input->post('email')){

            echo $this->dynamic_model->fetchname($this->input->post('email'));



        }
    }
}


?>