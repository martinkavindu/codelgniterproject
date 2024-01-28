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
    <title><?php echo $title ?></title>
</head>
<body>

<div class="container"> 
    <br/> <br/> <br/>
    <h2><?php echo $title ?></h2>

    <div class="col-md-6 align-right">
        <label>Select multiple images</label>
    </div>

    <div class="col-md-6">
        <input type="file" name="files" id="files" multiple />
    </div>

    <div style="clear:both"></div>

    <br/>
    <br/>

    <div id="uploaded_images"></div>
</div>

<script>
$(document).ready(function(){
    $('#files').change(function(){
        var files = $('#files')[0].files;
        var error = '';
        var form_data = new FormData();

        for(var count = 0; count < files.length; count++) {
            var name = files[count].name;
            var extension = name.split('.').pop().toLowerCase();

            if(jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg', 'webp']) == -1) {
                error += 'Invalid ' + count + ' Image File\n';
            } else {
                form_data.append('files[]', files[count]);
            }
        }

        if(error == "") {
            $.ajax({
                url: '<?php echo base_url(); ?>upload_images/upload',
                method: 'POST',
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $('#uploaded_images').html('<label class="text-success">Uploading ...</label>');
                },
                success: function(data){
                    $('#uploaded_images').html(data);
                    $('#files').val('');
                }
            });
        } else {
            alert(error);
        }
    });
});
</script>

</body>
</html>
