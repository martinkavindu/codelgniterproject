<html>
<head>
    <title>How to Export Mysql Data to CSV File in Codeigniter</title>
    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body>
 <div class="container box">
  <h3 align="center">How to Export Mysql Data to CSV File in Codeigniter</h3>
  <br />
  <form method="post" action="exportrecord/export">
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-6">  
       <h3 class="panel-title">Employee Data</h3>
      </div>
      <div class="col-md-6" align="right">
       <input type="submit" name="export" class="btn btn-success btn-xs" value="Export to CSV" />
      </div>
     </div>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-bordered table-striped">
       <tr>
        <th>Employee Name</th>
        <th> Skills</th>
        <th> Address </th>
        <th>Designation </th>
        <th> Age</th>
       </tr>

<?php foreach($emp_data as $data){ ?>
<tr>
    <td> <?php echo $data->name ;?> </td>
    <td> <?php echo $data->skills ;?> </td>
    <td> <?php echo $data->address ;?> </td>
    <td> <?php echo $data->designation ;?> </td>
    <td> <?php echo $data->age ;?> </td>
</tr>
<?php } ?>
      
      </table>
     </div>
    </div>
   </div>
  </form>
 </div>
</body>
</html>
