<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Autocoplete extends CI_Controller{

    public  function autocomplete(){
        $this->load->view('autocomplete');

    }
    public function fetch(){
        $this->load->model('Autocomplete_model');
        echo $this->Autocomplete_model->fetch_data($this->uri->segment(3));

    }

}

?>