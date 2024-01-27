<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo public_url('app.css')?>">
    <link rel="stylesheet" href="<?php echo public_url('bs5/css/bootstrap.min.css')?>">
</head>
<body>
    <h2>This is header</h2>
    <hr>    
    <?php echo $view_content;?>
    <h3>This is footer</h3>
</body>
</html>