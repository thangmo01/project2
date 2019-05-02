<?php
    function isLoggedIn(){
        return isset($_SESSION[user_id]);
    }

    function checkLoggedIn($type = '') {
        if(!$type) {
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
        else {
            if(isLoggedIn()) {
                if($_SESSION[user_type] != $type) {
                    redirect('');
                }
            }
            else {
                redirect('');
            }
        }

    }

    function createUserSession($data = []) {
        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }