<?php
    function isLoggedIn(){
        return isset($_SESSION[user_id]);
    }

    function checkLoggedIn() {
        if(isLoggedIn()) {
            switch ($_SESSION[user_type]) {
                case 'student':
                    redirect('student/index');
                    break;
                case 'teacher':
                    redirect('teacher/index');
                    break;
            }
        }
    }

    function createUserSession($data = []) {
        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }