<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_api extends CI_Controller{


    public function index()
    {
        $this->load->view('api_view');
    }

    public function action(){
        if ($this->input->post('data_action')) {

            $data_action = $this->input->post('data_action');

            if($data_action == "fetch_all")
            {
                $api_url="http://localhost/introduction_codelgniter/codelgniterproject/CodeIgniter/api";

                $client = curl_init($api_url);

                curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
                
                $response = curl_exec($client);

                curl_close($client);
$result = json_decode($response);


$output = '';
if(count($result) >0 )
{

    foreach($result as $row);
{
    $output .='
    <tr>
    <td>'.$row->name.'</td>
    <td>'.$row->skills.'</td>
    <td>'.$row->address.'</td>
    <td> '.$row->designation.'</td>

    <td><button type= "button" name = "edit" class = "btn btn-warning btn-xs edit" id = "'.$row->id.'" >
    edit 
    
    </button> </td>
    <td><button type= "button" name = "delete" class = "btn btn-danger btn-xs delete" id = "'.$row->id.'">
    delete
    
    </button> </td>

    </tr>';
}

}else{

}

            }
           
        }

    }
}
?>