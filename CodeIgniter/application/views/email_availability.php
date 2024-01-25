<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Check Email</title>
</head>
<body>

<div class="container">
    <h2><?php echo $title; ?></h2>

    <form method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" id="email" class="form-control" autocomplete="off" placeholder="Enter email">
        <span id="email_result"></span>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Password">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
<script>
    $(document).ready(function(){
        $('#email').change(function(){
            var email = $('#email').val();
            if(email !== ''){
                $.ajax({
                    url: "<?php echo base_url(); ?>main/check_email_availability",
                    method: "POST",
                    data: {email: email},
                    success: function(data){
                        $('#email_result').html(data);
                    }
                });
            }
        });
    });
</script>
</body>
</html>
