<?php
    function isKmitlEmail($email) {
        $x = preg_match("/^\S+@kmitl.ac.th$/", $email)
            || preg_match("/^woradorn.laon@gmail.com$/", $email)
            || preg_match("/^bigguulnw5555@gmail.com$/", $email)
            || preg_match("/^mos43699@gmail.com$/", $email)
            || preg_match("/^shuirotsukihoshi@gmail.com$/", $email)
            || preg_match("/^Kaew.ite@gmail.com$/", $email)
        ;
        return $x;
    }

    function type($email) {
        if(
            preg_match("/^[0-9]{8}@kmitl.ac.th$/", $email)
            && !preg_match("/^woradorn.laon@gmail.com$/", $email)
            && !preg_match("/^bigguulnw5555@gmail.com$/", $email)
            && !preg_match("/^mos43699@gmail.com$/", $email)
            && !preg_match("/^shuirotsukihoshi@gmail.com$/", $email)
            || preg_match("/^Kaew.ite@gmail.com$/", $email)
        ) {
            return 'student';
        }
        elseif(
            preg_match("/^.+@kmitl.ac.th$/", $email) 
            || preg_match("/^woradorn.laon@gmail.com$/", $email)
            || preg_match("/^bigguulnw5555@gmail.com$/", $email)
            || preg_match("/^mos43699@gmail.com$/", $email)
            || preg_match("/^shuirotsukihoshi@gmail.com$/", $email)
            ) {
            return 'teacher';
        }
        else {
            return 'none';
        }
    }