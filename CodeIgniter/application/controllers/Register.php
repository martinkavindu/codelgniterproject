<?php
 defined('BASEPATH') OR exit('no direct script access allowed');


 class Register extends CI_Controller{

 public function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    // $this->load->library('encrypt');
    $this->load->model('register_model');

 }

    public function registeruser(){

        $this->load->view('userregistration');


    }

    public function validation(){

$this->form_validation->set_rules('user_name','name','required|trim');

$this->form_validation->set_rules('user_email','email','required|trim|valid_email|is_unique[register.email]');
$this->form_validation->set_rules('password','passwoord','required');

if($this->form_validation->run()){
 $verification_key = md5(rand());
 $user_password = $this->input->post('user_password');
 $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
 

 $data = array(

    'name' => $this->input->post('user_name'),
    'email' => $this->input->post('user_email'),
    'password' => $hashed_password,
    'verification_key'=>$verification_key,


 );

 $id = $this->register_model->insert($data);

if($id >0){

   $subject = "Please verify  your email";
   $message = "
    <p>Hi ".$this->input->post('user_name')."</p>
    <p>This is email verification mail from Codeigniter Login Register system. For complete registration process and login into system. First you want to verify you email by click this <a href='".base_url()."register/verify_email/".$verification_key."'>link</a>.</p>
    <p>Once you click this link your email will be verified and you can login into system.</p>
    <p>Thanks,</p>
    ";

    $config = array(
'protocol'  => 'smtp',
'smtp_host' => 'smtpout.secureserver.net',
'smtp_port' => 80,
'smtp_user' =>'martin@gmail.com',
'smtp_pass' =>'12345678',
'mailtype'  =>'html',
'charset'   => 'iso-8859-1',
'wordwrap'  => TRUE,

    );

    $this->load->library('email','$config');
    $this->email->set_newline("\r\n");
    $this->email->from('info@martin');
    $this->email->to($this->input->post('user_name'));
    $this->email->subject($subject);
    $this->email->message($message);

    if($this->email->send()){
  $this->session->set_flashdata('message','check in your email for email verification link');
  redirect('register');
  

    }



}


}else{
$this->registeruser();

}

    }
 }


?>