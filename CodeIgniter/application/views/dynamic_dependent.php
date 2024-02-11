<html>
<head>
    <title>Codeigniter Dynamic Dependent Select Box using Ajax</title>
    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <style>
 .box
 {
  width:100%;
  max-width: 650px;
  margin:0 auto;
 }
 </style>
</head>
<body>
 <div class="container box">
  <br />
  <br />
  <h3 class ="text-center">Codeigniter Dynamic Dependent Select Box using Ajax</h3>
  <br />
  <div class="form-group">
   <select name="phone" id="phone" class="form-control input-lg">
    <option value="">Select Phone</option>
    <?php
    foreach($phone as $row)
    {
     echo '<option value="'.$row->phone.'">'.$row->phone.'</option>';
    }
    ?>
   </select>
  </div>
  <br />
  <div class="form-group">
   <select name="email" id="email" class="form-control input-lg">
    <option value="">Select Email</option>
   </select>
  </div>
  <br />
  <div class="form-group">
   <select name="name" id="name" class="form-control input-lg">
    <option value="">Select name</option>
   </select>
  </div>
 </div>
</body>
</html>

<script>

    $(document).ready(function(){

        $('#phone').change(function(){

            var phone = $('#phone').val();

            if(phone !=''){

                $.ajax({
                    url:"<?php echo base_url() ;?>dynamic_dependent/fetch_email",
                    method:"POST",
                    data:{phone:phone},
                    success:function(data){
                         $('#email').html(data);
                    }
                })
            }

            else{
                $('#email').html('<option  value = "">Select email</option>');
                $('#name').html('<option  value = "">Select name</option>');


            }

        });

        $('#name').change(function(){

var name = $('#name').val();

if(name != ''){

    $.ajax({
        url:"<?php echo base_url();?>dynamic_dependent/fetchname",
        method:"POST",
        data:{name:name},

        success:function(data){

            $('#name').html(data);
        }

    })
}else{
    $('#name').html('<option value="">Select name</option>');
}

        });
    })
    </script>