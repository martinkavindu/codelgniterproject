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
    <title>export</title>
</head>
<body>
    <div class="container">

<div class="table-responsive">
        <table class="table table-bordered table-striped" id="user_data">

        <thead class="thead-light">
    <tr>
            <th>SN</th>
            <th>EMAIL</th>
            <th>NAME</th>
            <th>PASSWORD</th>
          
    </tr>
  </thead>
<tbody>

<?php
 foreach ($usersdata as $row) {

echo '
<tr>
<td> '.$row->id.'</td>
<td> '.$row->email.'</td>
<td> '.$row->name.'</td>
<td> '.$row->password.'</td>
</tr>
';
 }

?>
</tbody>

 
</table>

<div class="text-center">
    <form method = "post" action ="<?php echo base_url(); ?>excel_export/action">
        

    <input type ="submit" name = "export" class = "btn btn-success" value ="Export"/>
</form>
</div>
</div>
    </div>

</body>
</html>