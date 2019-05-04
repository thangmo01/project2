<?php
    require_once '../vendor/autoload.php';
    
    require_once 'configs/config.php';
    
    require_once 'helpers/session_helper.php';
    require_once 'helpers/google_auth_helper.php';
    require_once 'helpers/url_helper.php';
    require_once 'helpers/check_email_helper.php';
    require_once 'helpers/user_helper.php';
    require_once 'helpers/s3_helper.php';
    require_once 'helpers/face_api_helper.php';

    spl_autoload_register(function ($classname) {
        require_once 'libs/' . $classname . '.php';
    });
    //https://www.php.net/manual/en/intro.spl.php
    //https://www.php.net/manual/en/function.spl-autoload-register.php
