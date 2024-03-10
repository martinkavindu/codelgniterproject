<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title> <?php echo $title ;?> </title>
</head>
<body>
 <div class="container">   
<form action="<?php echo base_url();?>main/login_validation" method = "post">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name = "email" class="form-control" id="email">
    <span class="text-danger"> <?php echo form_error('email'); ?> </span>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="password" class="form-control" id="pwd">
    <span class="text-danger"> <?php echo form_error('password'); ?> </span>
  </div>
 
  <button type="submit" name = "insert" class="btn btn-default">Submit</button>

  <?php
echo $this->session->flashdata('error');

  ?>
</form>

</div>
</body>
</html> -->


<!DOCTYPE html>
<html>
<head>
    <title>Complete User Registration and Login System in Codeigniter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <br />
        <h3 align="center">Complete User Registration and Login System in Codeigniter</h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
                <?php
                if($this->session->flashdata('message'))
                {
                    echo '
                    <div class="alert alert-success">
                        '.$this->session->flashdata("message").'
                    </div>
                    ';
                }
                ?>
                <form method="post" action="<?php echo base_url(); ?>login/validation">
                    <div class="form-group">
                        <label>Enter Email Address</label>
                        <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" />
                        <span class="text-danger"><?php echo form_error('user_email'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
                        <span class="text-danger"><?php echo form_error('user_password'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" value="Login" class="btn btn-info" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>register">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php if($this->session->flashdata('success')){?>
    var text = <?php echo json_encode($this->session->flashdata('success')) ?>;
    Swal.fire({
        icon: "success",
        title: "Success!",
        text: text,
        footer: '<a href="#">Why do I have this issue?</a>'
    });
    <?php } ?>

    <?php if($this->session->flashdata('error')){?>
    var text = <?php echo json_encode($this->session->flashdata('error')) ?>;
    Swal.fire({
        icon: "success",
        title: "Oops...",
        text: text,
        footer: '<a href="#">Why do I have this issue?</a>'
    });
    <?php } ?>
</script>
</body>
</html>
