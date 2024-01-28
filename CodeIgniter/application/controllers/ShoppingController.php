
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ShoppingController extends CI_Controller {

    public function shoppingCart (){

        $this->load->model('CartModel');
        $data['product'] = $this->CartModel->fetch_all();

        $this->load->view('cart',$data);
    }

}


?>