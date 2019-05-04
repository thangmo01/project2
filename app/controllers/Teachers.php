<?php
    class Teachers extends Controller {
        public function __construct() {
            checkLoggedIn('teacher');
            $this->teacher_model = $this->model('Teacher');
        }
        
        public function index() {
            $data = $this->teacher_model->getClassList($_SESSION[user_id]);
            $this->view('teacher/index', $data);
        }

        public function classDetail($class_id) {
            $data = [
                'class_id' => $class_id, 
              //  'subject_name' => $subject_name, 
           //     'student_count' => $student_count,
            //    'class_key' => $class_key
            ];
            $this->view('teacher/class_detail', $data);
        }

        public function classCheck($class_id) {
            $this->view('teacher/class_check');
        }

        public function faceIdentify() {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $res = face_api_face_identify($_POST['class_id'], $_POST['image_blob']);
                echo $res;
            } else {
                redirect('teacher/index');
            }
        }
    }