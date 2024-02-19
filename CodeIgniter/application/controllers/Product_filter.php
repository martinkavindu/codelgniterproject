<?php
if(!defined('BASEPATH'))  exit('no undefined script allowed');

class Product_filter extends CI_Controller{

public function __construct(){

    parent::__construct();
    $this->load->model('product_filter_model');


}

public function index(){
    $data['brand_data']=$this->product_filter_model->fetch_filter_type('product_brand');
    $data['ram_data'] = $this->product_filter_model->fetch_filter_type('product_ram');
    $data['product_storage'] = $this->product_filter_model->fetch_filter_type('product_storage');

    $this->load->view('product_filter',$data);
}

public function fetch_data(){

    $minimum_price = $this->input->post('minimum_price');
    $maximum_price = $this->input->post('maximum_price');
    $brand = $this->input->post('brand');
    $ram = $this->input->post('ram');
    $storage = $this->input->post('storage');

    $this->load->library('pagination');

    $config = array();
    $config['base_url'] = '#';
    $config['total_rows'] = $this->product_filter_model->count_all($minimum_price,$maximum_price,$brand,$ram,$storage);


}

}


?>