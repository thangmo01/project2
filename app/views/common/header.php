<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- style -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?php echo URLROOT . '/public/css/main.css';?>">
    <!-- script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    <title><?php echo SITENAME;?></title>
</head>
<style>
    h2{
        font-size:0.7em;
    }
    h3{
        font-size:1.7rem;
    }
</style>
<body>
<div class="w3-bar w3-border w3-xlarge w3-dark-grey">
    <a href="<?php echo URLROOT;?>" class="w3-bar-item w3-button w3-hover-black"><h2>Home</h2></a>
    <?php if(isLoggedIn()) : ?>
        <?php if(userType() == 'student'):?>
            <a href="<?php echo URLROOT . '/students/profile';?>" class="w3-bar-item w3-button w3-hover-black" ><h2>Profile</h2></a>
            <a href="<?php echo URLROOT . '/students/joinclass';?>" class="w3-bar-item w3-button w3-hover-black" ><h2>Joinclass</h2></a>
        <?php elseif(userType() == 'teacher'):?>
            <a href="<?php echo URLROOT . '/teachers/createClass';?>" class="w3-bar-item w3-button w3-hover-black" ><h2>CreateClass</h2></a>
        <?php endif;?>
        <a href="<?php echo URLROOT . '/pages/logout';?>" class="w3-bar-item w3-button w3-right w3-hover-black" ><h2>Logout</h2></a>
    <?php else :
        $authUrl = getGClient()->createAuthUrl();
        echo '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '" class="w3-bar-item w3-button w3-right w3-hover-black" ><h2>Login</h2></a>';
    ?>
    <?php endif; ?>
    <h3><div id="clock" class="w3-bar-item w3-right"></div></h3>
</div>