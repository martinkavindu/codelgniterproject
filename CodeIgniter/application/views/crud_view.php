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
<h3> <?php echo anchor('upload_images/upload_multiple', 'upload images'); ?>
</h3>
<h3> <?php echo anchor('shoppingcontroller/shoppingcart', 'shopping cart'); ?>
</h3>
        <h1>CRUD APPLICATION USING AJAX IN CODEIGNITER</h1>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#userModal">Add</button>
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

</body>
</html>


<div class="modal fade" id="userModal">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form id="user_form" method ="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add user</h4>
        </div>
       <div class="modal-body">   
  
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">User name</label>
    <input type="text" class="form-control" name = "name" id="name" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
  </div>
  </div>
<div class="modal_footer">
  <input type = "hidden" name ="user_id" id="user_id"/>
  <input type= "submit" id="action" name="action" value ="Add" class="btn btn-success" />
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>

  
  </div>
</form>

      
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

    });

    $(document).on('submit', '#user_form', function(event) {
    event.preventDefault();
    var email = $('#email').val();
    var name = $('#name').val();
    var password = $('#password').val();

    if (email != '' && password != '') {
        var formData = new FormData(this);
        formData.append('action', 'Add'); 

        $.ajax({
            url: "<?php echo base_url() . 'crudcontroller/user_action' ?>",
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,  
            success: function(data) {
                alert(data);
                $('#user_form')[0].reset();
                $('#userModal').modal('hide');  
                dataTable.ajax.reload();
            }
        });
    } else {
        alert('Email and password fields are required');
    }
});

$(document).on('click', '.update', function(){
    var user_id = $(this).attr("id");

    $.ajax({
        url: "<?php echo base_url(); ?>crudcontroller/fetch_single_user",
        method: "POST",
        data: {user_id: user_id},
        dataType: "json",
        success: function(data) {
            $('#userModal').modal('show');
            $("#email").val(data.email);
            $('#name').val(data.name);
            $('#password').val(data.password);
            $('.modal_title').text("Edit user");
            $('#user_id').val(user_id);
            $('#action').val("Edit"); 
        }
    });
});
//delete class

$(document).on('click', '.delete', function(){
    var user_id = $(this).attr('id');
    if(confirm("Are you sure you want to delete this?")) {
        $.ajax({
            url: "<?php echo base_url() ;?>crudcontroller/delete_single_user",
            method: "POST",
            data: {user_id: user_id},  
            success: function(data) {
                alert(data);
                dataTables.ajax.reload();
            }
        });
    } else {
        return false;
    }
});

});




</script>
