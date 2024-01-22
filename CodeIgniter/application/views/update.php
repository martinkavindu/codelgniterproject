<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<body>

<div class="container">

<h1> UPDATE DETAILS </h1>

<form action="<?php echo base_url()?>main/form_validation" autocomplete="off" method ="post">

<?php
if(isset($user_data)){
    foreach($user_data as $row){
?>
  <div class="form-group">
    <label for="name">Email address:</label>
    <input type="email" name="email" value = "<?php echo $row->email;?>" class="form-control" id="email">
    <span class="text-danger"> <?php echo form_error('email');?></span> 
  </div>
  <div class="form-group">
    <label for="name">User name:</label>
    <input type="text" name="name" value = "<?php echo $row->email; ?>" class="form-control" id="name"  autocomplete="username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="password" value ="<?php echo $row->password; ?>" class="form-control" id="pwd" autocomplete="current-password">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>

  <input type="hidden" name ="hidden_id" value = "<?php echo $row->id ; ?>"/>

  <button type="submit" name="update" class="btn btn-default">Submit</button>
</form>

</div>
<?php
   }
}

?>
</body>
</html>