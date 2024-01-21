<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

public function index (){

  $this->load->model("Main_Model");

	$data['fetch_data'] = $this->Main_Model->fetch_data();
	$this->laod->view('main_view',$data);


}

// form validation library

public function form_validation() {
    $this->load->library('form_validation');

    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run()) {
        $this->load->model('Main_Model');

        $data = array(
            'email' => $this->input->post('email'),
            'name' => $this->input->post('name'),
            'password' => $this->input->post('password')
        );

        $this->Main_Model->insert_data($data);

        redirect(base_url() . 'main/inserted');
    } else {
        $this->index();
    }
}

public function inserted(){
	$this->index();
}



}
