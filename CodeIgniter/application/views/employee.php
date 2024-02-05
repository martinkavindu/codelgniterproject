<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>export</title>
</head>
<body>
<div class = "container"> 

<table class="table table-hover tablesorter">
<thead>
	<tr>
		<th class="header">Id.</th>
		<th class="header">Name</th> 
		<th class="header">Skills</th>
		<th class="header">Address</th>  
		<th class="header">Age</th>
		<th class="header">Designation</th>                 
	</tr>
</thead>
<a class="pull-right btn btn-warning btn-large" style="margin-right:40px" href="<?php echo site_url(); ?>/employee/createexcel"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
<tbody>
	<?php
	if (isset($employeeData) && !empty($employeeData)) {
		foreach ($employeeData as $key => $emp) {
			?>
			<tr>
				<td><?php echo $emp['id']; ?></td>   
				<td><?php echo $emp['name']; ?></td> 
				<td><?php echo $emp['skills']; ?></td>
				<td><?php echo $emp['address']; ?></td> 
				<td><?php echo $emp['age']; ?></td>
				<td><?php echo $emp['designation']; ?></td>                       
			</tr>
			<?php
		}
	} else {
		?>
		<tr>
			<td colspan="5" class="alert alert-danger">No Records founds</td>    
		</tr>
	<?php } ?>			 
</tbody>
</table>   
</div>
</body>
</html>
