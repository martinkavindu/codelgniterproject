<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Update</title>
</head>
<body>
    <div class="container">
        <h1>UPDATE DETAILS</h1>
        <?php
if(isset($user_data)){

    ?>
<form action="<?php echo base_url()?>main/form_validation" autocomplete="off" method ="post">
<div class="form-group">
    <label for="name">Email address:</label>
    <input type="email" name="email" value= "<?php echo $user_data->email;?>" class="form-control" id="email">
    <span class="text-danger"> <?php echo form_error('email');?></span> 
  </div>
  <div class="form-group">
    <label for="name">User name:</label>
    <input type="text" name="name" value = "<?php echo $user_data->name;?>" class="form-control" id="name"  autocomplete="username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="password" value = "<?php echo $user_data->password;?>" class="form-control" id="pwd" autocomplete="current-password">

    <input type="hidden" name="hidden_id" value = "<?php echo $user_data->id; ?>" />

  </div>

  <input type="submit" name="update"  value = "update" class="btn btn-default"/>
</form>

<div>
    <?php

}
else{
    ?>
<p> error </p>
    
<?php
}
?>
    
    </div>
</body>
</html>
