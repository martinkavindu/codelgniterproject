<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
</head>
<body>
    
    <h2>Admin dashboard</h2>

    <p>Welcome <?php echo $this->session->userdata('email'); ?></p>

    <a href="<?php echo base_url() . 'main/logout'; ?>">Logout</a>
</body>
</html>
