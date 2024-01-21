<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h1 Class="text-danger">INSERTING DATA  INTO DB</h1>
  <form action="<?php echo base_url()?>main/form_validation" autocomplete="off" method ="post">
<?php

if($this->uri->segment(2) == 'inserted'){


    echo '<p class="text-success"> Data inserted successfully </p>';
}
?>

  <div class="form-group">
    <label for="name">Email address:</label>
    <input type="email" name="email" class="form-control" id="email">
    <span class="text-danger"> <?php echo form_error('email');?></span> 
  </div>
  <div class="form-group">
    <label for="name">User name:</label>
    <input type="text" name="name" class="form-control" id="name"  autocomplete="username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="password" class="form-control" id="pwd" autocomplete="current-password">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" name="insert" class="btn btn-default">Submit</button>
</form>
</div>

</body>
</html