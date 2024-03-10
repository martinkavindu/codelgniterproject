<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Document</title>
</head>
<body>
    
<div>

<form method="post" action="<?php echo base_url(); ?>alertexample/validation">
<label> NAME </label>
<input type = "text"/>

<button type ="submit"> 
    submit
</button>
</form>
    <div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php if($this->session->flashdata('success')){?>
    var text = <?php echo json_encode($this->session->flashdata('success')) ?>;
    Swal.fire({
        icon: "success",
        title: "Success!",
        text: text,
        footer: '<a href="#">Why do I have this issue?</a>'
    });
    <?php } ?>

    <?php if($this->session->flashdata('error')){?>
    var text = <?php echo json_encode($this->session->flashdata('error')) ?>;
    Swal.fire({
        icon: "success",
        title: "Oops...",
        text: text,
        footer: '<a href="#">Why do I have this issue?</a>'
    });
    <?php } ?>
</script>

</body>
</html>