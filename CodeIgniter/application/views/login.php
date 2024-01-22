<!DOCTYPE html>
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
</html>