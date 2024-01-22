<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

public function index (){

  $this->load->model("Main_Model");

	$data['fetch_data'] = $this->Main_Model->fetch_data();
	$this->load->view('main_view',$data);


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

        if($this->input->post("update")){

            $this->Main_Model->update_data($data,$this->input->post("hidden_id"));
            redirect(base_url()."main/updated");
        }

        if($this->input->post('insert')){
 
        $this->Main_Model->insert_data($data);

        redirect(base_url() . 'main/inserted');
        }

    } else {
        $this->index();
    }
}

public function inserted(){
	$this->index();
}

 public function delete_data(){
    $id = $this->uri->segment(3);
    var_dump($id); //  debugging
    $this->load->model('Main_Model');
    $this->Main_Model->delete_data($id);
    redirect(base_url() ."main/deleted");
}


    public function deleted(){
        $this->index();
    }
    
    public function update_data(){
        $user_id = $this->uri->segment(3);
        $this->load->model('Main_Model');
    
        // Fetch data for the specified user
        $data['user_data'] = $this->Main_Model->fetch_single_data($user_id);
    
        // Load the view with the user data
        $this->load->view('update', $data);
    }
    public function updated(){
        $this->index();
    }

//user login

public function login (){
    $data['title'] = "sample of login session";
    $this->load->view('login',$data);
}
//form validation
public function login_validation(){

    $this->load->library('form_validation');
    $this->form_validation->set_rules('email','email','required');
    $this->form_validation->set_rules('password','password','required');

    if($this->form_validation->run())
    {
$email = $this->input->post('email');
$password = $this->input->post('password');

$this->load->model('Main_Model');
if($this->Main_Model->can_login($email,$password)){

    $session_data = array(
'email' => $email
    );
$this->session->set_userdata($session_data);

redirect(base_url(). 'main/enter');
}else
{
    $this->session->set_flashdata('error','incorrect email or password');
    redirect(base_url(). 'main/login');
}

    }
    
    else{

        $this->login();

    }
}

public function enter(){
    if($this->session->userdata('email')!=''){

        $this->load->view('admindashboard');

    }else{

        redirect(base_url() . 'main/login');
    }
}
public function logout(){
    $this->session->unset_userdata('email');
    redirect(base_url() . "main/login");
}

}
?>