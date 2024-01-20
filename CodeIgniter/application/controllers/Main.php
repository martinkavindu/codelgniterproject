<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

public function index (){
	// echo 'am new here men';
	// $this->test();
	$this->load->model('Main_Model');
	// echo $this->Main_Model->main_test();

	$data['title'] = 'controllers test';
	
	$data['test1'] = 'new test for controlers';

	$data['model_data'] = $this->Main_Model->main_test();
	
	$this->load->view('main_view',$data);


}

public function test(){
	echo 'i like coding';
}

// gather information from model here
}
