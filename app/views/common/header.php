<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- style -->
    <link rel="stylesheet" href="<?php echo URLROOT . '/public/css/main.css';?>">
    <!-- script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    
    <title><?php echo SITENAME;?></title>
</head>
<body>
<a href="<?php echo URLROOT;?>">home</a>
<?php if(isLoggedIn()) : ?>
    <a href="<?php echo URLROOT . '/pages/logout';?>">logout</a>
<?php else : ?>
    <?php
        $authUrl = getGClient()->createAuthUrl();
        echo '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'">login</a>';
    ?>
<?php endif; ?>
