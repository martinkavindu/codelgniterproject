<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CrudController extends CI_Controller{

    public function index(){

        $this->load->view('crud_view');
    }


    public function fetch_user(){
        $this->load->model('CrudModel');
        $fetch_data= $this->CrudModel->make_datatables();
       $data = array();

       foreach($fetch_data as $row){

        $sub_array = array();
        $sub_array[] = $row->id;
        $sub_array[] = $row->email;
        $sub_array[] = $row->name;
        $sub_array[] = $row->password;
        $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" 
        class="btn btn-warning btn-xs update">update</button>';
        $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" 
        class="btn btn-danger btn-xs delete">delete</button>';

        $data[]= $sub_array;
       }

       $output = array(
        "draw"         => intval($_POST['draw']),
        'recordsTotal' =>$this->CrudModel->get_all_data(),
        'recordsFiltered' =>$this->CrudModel->get_filtered_data(),
        'data'          =>$data

       );

       echo json_encode($output);

    }

    public function user_action(){
        if($_POST['action'] == 'Add'){

        $insert_data = array(
            'email'  => $this->input->post("email"),
            'name'   => $this->input->post('name'),
            'password' =>$this->input->post('password') 
        );

        $this->load->model('CrudModel');
        $this->CrudModel->insert_crud($insert_data);

        echo 'data inserted successfully';
        }

        if($_POST["action"] == "Edit"){
            $updated_data = array(

                'email' => $this->input->post('email'),
                'name'  =>$this->input->post('name'),
                'password' =>$this->input->post('password')

            );
             $this->load->model('CrudModel');
             $this->CrudModel->update_crud($this->input->post('user_id'),$updated_data,);
             echo "Data updated";
        
        }
    }

    //update

    public function fetch_single_user(){

        $output = array();
        $this->load->model('CrudModel');
        $data = $this->CrudModel->fetch_single_user($_POST["user_id"]);

        foreach($data as  $row){
            $output['email'] = $row->email;
            $output['name']   =$row->name;
            $output['password'] =$row->password;

            echo json_encode($output);
        }
    }

   
}



?>