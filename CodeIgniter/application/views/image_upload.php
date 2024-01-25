<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Upload Image</title>
</head>
<body>

<div class="container">
    <h2><?php echo $title; ?></h2>

    <form method="post" id="upload_form" enctype="multipart/form-data">

        <input type="file" class="form-control mb-5" name="image_file" id="image_file" />

        <input type="submit" value="Upload" id="upload" name="upload" class="btn btn-primary" />
    </form>

    <div id="uploaded_image">
        <?php 
        echo $image_data;
        ?>
    </div>
</div>

<script>
    $(document).ready(function () {

        $('#upload_form').on('submit', function (e) {
            e.preventDefault();

            if ($('#image_file').val() == '') {
                alert('Please select the file');
            } else {

                $.ajax({
                    url: "<?php echo base_url(); ?>main/ajax_upload",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        $('#uploaded_image').html(data);
                    }
                });
            }
        });

    });
</script>

</body>
</html>
