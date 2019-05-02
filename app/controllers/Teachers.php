<?php
    class Teachers extends Controller {
        public function __construct() {
            // checkLoggedIn('teacher');
        }
        
        public function index() {
            $data = [
                '1' => [
                    'subject_name' => 'OS',
                    'subject_code' => '1',
                    'student_count' => 40,
                    'section' => 2,
                    'class_key' => 'asdfkjdsa11fjklds'
                ],
                '2' => [
                    'subject_name' => 'Data com',
                    'subject_code' => '2',
                    'student_count' => 39,
                    'section' => 1,
                    'class_key' => 'asdfkjdsaf5664jklds'
                ],
                '3' => [
                    'subject_name' => 'Telecom',
                    'subject_code' => '1',
                    'student_count' => 41,
                    'section' => 1,
                    'class_key' => 'asdfkjdsafsadfjklds'
                ]
            ];
            $this->view('teacher/index', $data);
        }
    }