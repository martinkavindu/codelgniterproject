<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap.min.css">
    <title>Update</title>
</head>
<body>
    <div class="container">
        <h1>CRUD APPLICATION USING AJAX IN CODEIGNITER</h1>
<div class="table-responsive">
        <table class="table table-bordered table-striped" id="user_data">

        <thead class="thead-light">
    <tr>
            <th>SN</th>
            <th>EMAIL</th>
            <th>NAME</th>
            <th>PASSWORD</th>
            <th>EDIT</th>
            <th>DELETE</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    
    </tr>
 
  </tbody>

</table>
</div>
   
    </div>

    <script>

        $(document).ready(function(){

            var dataTable = $('#user_data').DataTable({
                'processing':true,
                'serverSide':true,
                'order':[],
                'ajax':{
                    url:"<?php echo base_url().'crudcontroller/fetch_user';?>",
                    type:'POST'
                },

                "columnDefs":[
                    {
                        "targets":[0,3,4],
                        "orderable":false,
                    }
                ]

            })



        })

        </script>
</body>
</html>
