<?php
    function redirect($path = '') {
        header('Location:' . URLROOT . '/' . $path);
    }