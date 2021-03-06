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
    
    define('teacher_create_class', 'teacher_create_class');
    define('teacher_create_subject', 'teacher_create_subject');
    define('teacher_class_check', 'teacher_class_check');

    function sessionSetMessage($var, $messge = '', $type = 'success') {
        $_SESSION[$var]['message'] = $messge;
        $_SESSION[$var]['type'] = $type;
    }

    function sessionShowMessage($var) {
        if(isset($_SESSION[$var])) {
            echo '<div class="message-box message-' . $_SESSION[$var]['type'] . '">';
            echo "<h4>{$_SESSION[$var]['message']}</h4>";
            echo '</div>';
        }
    }

    function sessionUnsetMessage($var) {
        unset($_SESSION[$var]);
    }