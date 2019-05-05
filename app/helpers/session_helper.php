<?php
    if(!session_id()){
        session_start();
    }

    define('google_access_token', 'google_access_token');
    define('user_id', 'user_id');
    define('user_outh_id', 'user_outh_id');
    define('user_email', 'user_email');
    define('user_name', 'user_name');
    define('user_type', 'user_type');

    define('student_id', 'student_id');
    define('student_upload_image', 'student_upload_image');
    define('student_join_class', 'student_join_class');


    function sessionSetMessage($var, $messge = '', $type = 'success') {
        $_SESSION[$var]['message'] = $messge;
        $_SESSION[$var]['type'] = $type;
    }

    function sessionShowMessage($var) {
        if(isset($_SESSION[$var])) {
            $color = '';
            switch ($_SESSION[$var]['type']) {
                case 'success':
                    $color = 'message-success';
                    break;
                case 'danger':
                    $color = 'message-danger';
                    break;
            }
            echo '<div class="message-box ' . $color . '">';
            echo "<h4>{$_SESSION[$var]['message']}</h4>";
            echo '</div>';
        }
    }

    function sessionUnsetMession($var) {
        unset($_SESSION[$var]);
    }