<?php
    function isKmitlEmail($email) {
        return preg_match("/^\S+@kmitl.ac.th$/", $email);
    }

    function type($email) {
        if(preg_match("/^[0-9]{8}@kmitl.ac.th$/", $email)) {
            return 'student';
        }
        elseif(preg_match("/^.+@kmitl.ac.th$/", $email)) {
            return 'teacher';
        }
        else {
            return 'none';
        }
    }