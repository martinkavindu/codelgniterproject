
<html>
<head>
    <title>CURD REST API in Codeigniter</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class="container">
        <br />
        <h3 align="center">Create CRUD REST API in Codeigniter - 4</h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">CRUD REST API in Codeigniter</h3>
                    </div>
                    <div class="col-md-6" align="right">
                        <button type="button" id="add_button" class="btn btn-info btn-xs">Add</button>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <span id="success_message"></span>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Skills</th>
                            <th>Address</th>
                            <th>Designation</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body">
                    <label>Enter First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" />
                    <span id="first_name_error" class="text-danger"></span>
                    <br />
                    <label>Enter Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" />
                    <span id="last_name_error" class="text-danger"></span>
                    <br />
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="user_id" id="user_id" />
                    <input type="hidden" name="data_action" id="data_action" value="Insert" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        function fetch_data() {
            $.ajax({
                url: "<?php echo base_url();?>test_api/action",
                method: "POST",
                data: { data_action: 'fetch_all' },
                success: function(data) { // Corrected 'success' spelling
                    $('tbody').html(data);
                }
            });
        }

        fetch_data();
        $('#add_button').click(function(){

            $('#user_form')[0].reset();
            $('.modal-title').text('Add User');
            $('#action').val('Add');
            $('#data_action').val('Insert'); 
            $('userModal').modal('show');

        });

        $(document).on('submit','#user_form',function(event){

        event.preventDefault();

        $.ajax({

            url:"<?php echo base_url().'test_api/action' ?>",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
                if(data.success)
                {
                    $(#user_form)[0].reset();
                    $('#userModal').modal('show');
                    fetch_data();

                  if($('#data_action').val()=="Insert")
                  {
                    $('#success_message').html('<div class = "alert alert-success"> Data Inserted</div>');
                  }  

                }

                if(data.error)
                {
                    $('#name_error').html(data.name_error);
                    $('#skills_error').html(data.skills_error);


                }
            }

        })

        })
    });
</script>
