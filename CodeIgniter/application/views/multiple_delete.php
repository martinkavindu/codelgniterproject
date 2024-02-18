<html>
<head>
    <title>Delete Multiple Data using Checkboxs in Codeigniter 3 with Ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
<div class="container">
 <br /><br /><br />
 <h3 align="center">Delete Multiple Data using Checkboxs in Codeigniter 3 with Ajax</h3><br />
 
 <div class="table-responsive">
  <table class="table table-bordered">
   <thead>
    <tr>
     <th width="5%"><button type="button" name="delete_all" id="delete_all" class="btn btn-danger btn-xs">Delete</button></th>
     <th width="20%">Name</th>
     <th width="38%">Address</th>
     <th width="7%">Skills</th>
     <th width="25%">Designation</th>
     <th width="5%">Age</th>
    </tr>
   </thead>
   <tbody>
   <?php
   foreach($employee_data->result() as $row)
   {
    echo '
    <tr>
     <td><input type="checkbox" class="delete_checkbox" value="'.$row->id.'" /></td>
     <td>'.$row->name.'</td>
     <td>'.$row->address.'</td>
     <td>'.$row->skills.'</td>
     <td>'.$row->designation.'</td>
     <td>'.$row->age.'</td>
    </tr>
    ';
   }
   ?>
   </tbody>
  </table>
    </div>
</body>
</html>
<style>
.removeRow
{
 background-color: #FF0000;
    color:#FFFFFF;
}
</style>
<script>
$(document).ready(function(){
 
 $('.delete_checkbox').click(function(){
  if($(this).is(':checked'))
  {
   $(this).closest('tr').addClass('removeRow');
  }
  else
  {
   $(this).closest('tr').removeClass('removeRow');
  }
 });

 $('#delete_all').click(function(){
  var checkbox = $('.delete_checkbox:checked');
  if(checkbox.length > 0)
  {
   var checkbox_value = [];
   $(checkbox).each(function(){
    checkbox_value.push($(this).val());
   });
   $.ajax({
    url:"<?php echo base_url(); ?>multiple_delete/delete_all",
    method:"POST",
    data:{checkbox_value:checkbox_value},
    success:function()
    {
     $('.removeRow').fadeOut(1500);
    }
   })
  }
  else
  {
   alert('Select atleast one records');
  }
 });

});
</script>
