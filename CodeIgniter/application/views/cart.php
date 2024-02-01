

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <title>Document</title>

    
    <style>
      body {
	margin-top: 20px;
}
    </style>
</head>
<body>
    

<div class="container">


<br/> <br/>

<div class = "col-lg-6 col-md-6">
	<div class="table-responsive">

	<h2 class="text-center"> shopping cart </h2>
	<br/>

	<?php
	foreach ($product as $row)
	{

		echo '

		<div class="col-md-4" style="padding:16px";background-color:#f1f1f1; border:1px solid #ccc;
		margin-bottom:16px; height:"400px" align="center">
		<img src = " '.base_url().'upload/'.$row->product_image.'"
		class="img-thumbnail" /> <br/>


		<h4>'.$row->product_name.' </h4>

		<h3 class="text-danger">'.$row->product_price.'</h3>

	<input type = "text" name = "quantity" class= "quantity" id="'.$row->product_id.'"/>


	<button type ="button" name="add_cart" class="btn btn-success add_cart" data-productname = "'.$row->product_name.'"
	data-price = "'.$row->product_price.'" data-productid = "'.$row->product_id.'"> Add to cart
	
	</button>
		</div>
		';

	}


?>
</div>
</div>
<div class = "col-lg-6 col-md-6">

<div id="cart_details">
	<h3 class ="text-centre"> cart is empty </h3>

</div>
</div>

</div>
</body>
</html>

<script>
$(document).ready(function() {

	$('.add_cart').click(function() {


		var product_id = $(this).data('productid');
		var product_name = $(this).data('productname');
		var product_price = $(this).data('price');
		var quantity = $('#' + product_id).val();
		  if(quantity != '' &&  quantity >0){
$.ajax({
	url:"<?php echo base_url(); ?>shoppingcontroller/add",
	method:"POST",
	data:{product_id:product_id,product_name:product_name,
	product_price:product_price,quantity:quantity},

	success:function(data){
		alert("product added to cart");
		$('#cart_details').html(data);
		$('#' + product_id).val('');

	}
});


		  }else{

			alert('Enter quantity')
		  }
		
	});

	$('#cart_details').load("<?php echo base_url(); ?>shoppingcontroller/load");

	$(document).on('click','.remove_inventory',function(){
		var row_id = $(this).attr("id");
		if(confirm('Are you sure you want to remove this item')){

			$.ajax({
				url:"<?php echo base_url();?>shoppingcontroller/remove",
				method:"POST",
				data:{row_id:row_id},
				success:function(data){
					alert('Product removed from cart');
					$('#cart_details').html(data);
				}
			})


		}else
		{
			return false;
		}
	});

	$(document).on('click','#clear_cart',function(){

if(confirm("Are you sure you want to clear cart")){
 $.ajax({
	url: "<?php echo base_url(); ?>shoppingcontroller/clear",
	method:"POST",
	success:function(data){
		alert('You have cleared your cart success');
		$("#cart_details").html(data);
	}
 })

}else{
	return false;
}
	});

	
});

</script>