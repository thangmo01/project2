<?php
    class Teachers extends Controller {
        public function __construct() {
            // checkLoggedIn('teacher');
        }
        
        public function index() {
            $nbsp = "&nbsp";
            $data = [
                '1' => [
                    'subject_name' => 'Operating'.$nbsp.'Systems',
                    'subject_id' => '129',
                    'student_count' => 40,
                    'class_id' => 1,
                    'section' => 2,
                    'class_key' => 'keyOS'
                ],
                '2' => [
                    'subject_name' => 'Data'.$nbsp.'Communication'.$nbsp.'And'.$nbsp.'Computer'.$nbsp.'networks',
                    'subject_id' => '127',
                    'student_count' => 39,
                    'class_id' => 2,
                    'section' => 1,
                    'class_key' => 'keyData Com'
                ],
                '3' => [
                    'subject_name' => 'Telecommunication'.$nbsp.'Systems',
                    'subject_id' => '128',
                    'student_count' => 41,
                    'class_id' => 3,
                    'section' => 1,
                    'class_key' => 'KeyTelecom'
                ]
            ];
            $this->view('teacher/index', $data);
        }

        public function classDetail($class_id) {
            $data = [
                'class_id'=> $class_id];
            $this->view('teacher/class_detail', $data);
        }
    }