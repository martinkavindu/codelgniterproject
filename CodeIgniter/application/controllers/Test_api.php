<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_api extends CI_Controller{


    public function index()
    {
        $this->load->view('api_view');
    }

    public function action()

    {
        $api_url = '';

        if ($this->input->post('data_action')) {
            $data_action = $this->input->post('data_action');

            if($data_action == "Delete") {
                $api_url = "http://localhost/introduction_codelgniter/codelgniterproject/CodeIgniter/api/delete"; 
            
                $form_data = array(
                    'id' => $this->input->post('user_id')
                );
            
                $client = curl_init($api_url);
                curl_setopt($client, CURLOPT_POST, true); 
                curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
                curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
            
                $response = curl_exec($client);
                curl_close($client);
                
                echo $response;
            }
            

            if($data_action == "Edit")
            {
                $api_url = "http://localhost/introduction_codelgniter/codelgniterproject/CodeIgniter/api/update"; 
                $form_data = array(
                    'name' => $this->input->post('name'),
                    'skills' => $this->input->post('skills'),
                    'address' => $this->input->post('address'),
                    'designation' => $this->input->post('designation'),
                    'id' => $this->input->post('user_id'),
                );
   $client = curl_init($api_url);
   curl_setopt($client,CURLOPT_POST,true);
   curl_setopt($client,CURLOPT_POSTFIELDS,$form_data);
   curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
   $response = curl_exec($client);
   curl_close($client);

   echo $response;
   

            }

          if($data_action == "fetch_single")
          {

            $api_url = "http://localhost/introduction_codelgniter/codelgniterproject/CodeIgniter/api/fetch_single";
         $form_data = array(
            'id'     =>$this->input->post('user_id')
         );
         $client = curl_init($api_url);
         curl_setopt($client,CURLOPT_POST,true);

         curl_setopt($client,CURLOPT_POSTFIELDS,$form_data);

           curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
            $response = curl_exec($client);
            curl_close($client);

            echo $response;
    
          }

            if($data_action == "Insert"){

                $api_url= "http://localhost/introduction_codelgniter/codelgniterproject/CodeIgniter/api/insert";
            }
       $form_data =array(

        'name' =>$this->input->post('name'),
        'skills' =>$this->input->post('skills'),
        'address' =>$this->input->post('address'),
        'designation' =>$this->input->post('designation'),

       );
       $client = curl_init($api_url);
       curl_setopt($client,CURLOPT_POST,true);
       curl_setopt($client,CURLOPT_POSTFIELDS,$form_data);
       curl_setopt($client,CURLOPT_RETURNTRANSFER,true);

       $response = curl_exec($client);
       curl_close($client);
       echo $response;

    
            if ($data_action == "fetch_all") {
                $api_url = "http://localhost/introduction_codelgniter/codelgniterproject/CodeIgniter/api";
    
                $client = curl_init($api_url);
                curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($client);
                curl_close($client);
    
                $result = json_decode($response);
    
                $output = '';
                if (count($result) > 0) {
                    foreach ($result as $row) {
                        $output .= '
                            <tr>
                                <td>'.$row->name.'</td>
                                <td>'.$row->skills.'</td>
                                <td>'.$row->address.'</td>
                                <td>'.$row->designation.'</td>
                                <td>
                                    <button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Edit</button>
                                </td>
                                <td>
                                    <button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete</button>
                                </td>
                            </tr>';
                    }
                } else {
                    $output .= '
                        <tr>
                            <td colspan="6" align="center">No data found</td>
                        </tr>';
                }
                echo $output;
            }
        }
    }
    
}
?>