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
<style>
    .header{
        width: 100%;
        height: 54px;
    }
</style>
<body>
<div class="header">
    <?php if(isLoggedIn()) : ?>
    <ul>
        <li><a href="<?php echo URLROOT;?>" class="buttonblue" >Home</a></li>
        <li><a href="<?php echo URLROOT . '/pages/logout';?>" class="buttonblue" >Logout</a></li>
    
    <?php else : 
        $authUrl = getGClient()->createAuthUrl();
        echo '<ul>';
        echo    '<li><a href="' . URLROOT . '" class="buttonblue">Home</a></li>';
        echo    '<li><a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '" class="buttonblue">Login</a></li>';
        echo '<ul>';
        echo'</div>';
    ?>
    <?php endif; ?>

