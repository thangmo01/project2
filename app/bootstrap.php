<?php
    require_once 'configs/config.php';

    spl_autoload_register(function ($classname) {
        require_once 'libs/' . $classname . '.php';
    });
    //https://www.php.net/manual/en/intro.spl.php
    //https://www.php.net/manual/en/function.spl-autoload-register.php