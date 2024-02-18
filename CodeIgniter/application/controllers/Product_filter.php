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
    $data['product_storange'] = $this->product_filter_model->fetch_filter_type('product_storange');

    $this->load->view('product_filter',$data);
}

}


?>