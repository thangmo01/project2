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
                    'class_id' => 1,
                    'section' => 2,
                    'class_key' => 'asdfkjdsa11fjklds'
                ],
                '2' => [
                    'subject_name' => 'Data com',
                    'subject_code' => '2',
                    'student_count' => 39,
                    'class_id' => 2,
                    'section' => 1,
                    'class_key' => 'asdfkjdsaf5664jklds'
                ],
                '3' => [
                    'subject_name' => 'Telecom',
                    'subject_code' => '1',
                    'student_count' => 41,
                    'class_id' => 3,
                    'section' => 1,
                    'class_key' => 'asdfkjdsafsadfjklds'
                ]
            ];
            $this->view('teacher/index', $data);
        }

        public function classDetail($class_id) {
            $data = [
                'class_id' => $class_id
            ];
            $this->view('teacher/class_detail', $data);
        }
    }