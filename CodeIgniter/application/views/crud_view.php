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
        <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#myModal"> + ADD</button>
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
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">add user</h4>
        </div>
        <div class="modal-body">   
        <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">User name</label>
    <input type="text" class="form-control" name = "name" id="exampleInputPassword1" placeholder="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


        </div>
        <div class="modal-footer">
      
        </div>
      </div>
      
    </div>
  </div>
  