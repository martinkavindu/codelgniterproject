<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

public function index (){
	// // echo 'am new here men';
	// // $this->test();
	// $this->load->model('Main_Model');
	// // echo $this->Main_Model->main_test();

	// $data['title'] = 'controllers test';
	
	// $data['test1'] = 'new test for controlers';

	// $data['model_data'] = $this->Main_Model->main_test();
	
	// $this->load->view('main_view',$data);

	$this->load->view('main_view');


}

// form validation library

public function form_validation(){
$this->load->library('form_validation');

$this->form_validation->set_rules('email','email','required|alpha');

if($this->form_validation->run()){

	$this->load->model('Main_Model');

	$data = array(
		'email' =>$this->input->post('email'),
		'name' =>$this->input->post('name'),
		'password' =>$this->input->post('password')
	);
	$this->main_model->insert_data($data);

	redirect(base_url(). 'main/inserted');
}else{
	$this->index();
}



}
public function inserted(){
	$this->index();
}



}
