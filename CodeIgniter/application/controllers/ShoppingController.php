
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ShoppingController extends CI_Controller {

    public function shoppingCart (){

        $this->load->model('CartModel');
        $data['product'] = $this->CartModel->fetch_all();

        $this->load->view('cart',$data);
    }

    public function add (){

        $this->load->library('cart');
        $data = array(
            "id"  => $_POST['product_id'],
            "name" =>$_POST['product_name'],
            "qty" =>$_POST['quantity'],
            'price' =>$_POST['product_price']
        );
        $this->cart->insert();

        // var_dump($this->cart->contents());
        echo $this->view();
    }

    public  function load(){
        $this->load->library('cart');
        echo $this->view();

    }
    public function remove(){

        $this->load->library("cart");
        $row_id = $_POST['row_id'];

        $data = array(
            'rowid' => $row_id,
            'qty ' => 0
        );

       $this->cart->update($data); 
    echo $this->view();
    }
    

    public function clear(){
        $this->load->library('cart');
        $this->cart-destroy();
        echo $this->view();
    }
    public function view() {

        $output = '';
        $output .= '<h3> shopping cart </h3> <br/>
        <div class= "table-responsive">
        <div align="right">
        <button type="button" id="clear_cart" class="btn btn-warning">
        Clear cart
        </button>
        </div>
        <br/>
        <table class="table table-bordered">
        <tr>
        <th>Name </th>
        <th> Quantity </th>
        <th> Price </th>
        <th> Total </th>
        <th> Action </th>
        </tr>';
    
        $count = 0;
        foreach ($this->cart->contents() as $items) {
            $count++;
            $output .= '<tr>
            <td>' . $items['name'] . '</td>
            <td>' . $items['qty'] . '</td>
            <td>' . $items['price'] . '</td>
            <td>' . $items['subtotal'] . '</td>
            <td> <button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="' . $items["rowid"] . '">Remove </button> </td>
            </tr>';
        }
    
        $output .= '<tr>
        <td colspan="4" align="right">Total </td>
        <td>' . $this->cart->total() . '</td>
        </tr>
        </table>
        </div>';
    
        if ($count == 0) {
            $output = '<h3 class="text-center">  Cart is empty</h3>';
        }
        return $output;
    }    
  
}
    


?>