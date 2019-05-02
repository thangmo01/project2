<?php
    class Teacher extends Controller {
        public function __construct() {
            checkLoggedIn('teacher');
        }
        
        public function index() {
            $this->view('teacher/index');
        }
    }