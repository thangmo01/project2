<?php
    require_once '../vendor/autoload.php';
    
    require_once 'configs/config.php';
    
    require_once 'helpers/google_auth.php';

    spl_autoload_register(function ($classname) {
        require_once 'libs/' . $classname . '.php';
    });
    //https://www.php.net/manual/en/intro.spl.php
    //https://www.php.net/manual/en/function.spl-autoload-register.php
