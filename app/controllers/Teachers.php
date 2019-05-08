<?php
    class Teachers extends Controller {
        public function __construct() {
            checkLoggedIn('teacher');
            $this->teacher_model = $this->model('Teacher');
        }
        
        public function index() {
            sessionUnsetMessage(teacher_create_class);
            sessionUnsetMessage(teacher_create_subject);
            $data = $this->teacher_model->getClassList($_SESSION[user_id]);
            $this->view('teacher/index', $data);
        }

        public function class($class_id = false) {
            if($class_id) {
                $class_id = filter_var($class_id, FILTER_SANITIZE_NUMBER_INT);
                $data = $this->teacher_model->class($class_id);
                $data['class_id'] = $class_id;
                $this->view('teacher/class', $data);
            }
            else {
                redirect('teachers/index');
            }
        }

        public function classDetail($class_id = false, $num_checks = false) {
            sessionUnsetMessage(teacher_create_class);
            sessionUnsetMessage(teacher_create_subject);
            sessionUnsetMessage(teacher_class_check);
            if($class_id && $num_checks) {
                $class_id = filter_var($class_id, FILTER_SANITIZE_NUMBER_INT);
                $num_checks = filter_var($num_checks, FILTER_SANITIZE_NUMBER_INT);
                $data = [
                    'class_id' => $num_checks, 
                    'detail' => $this->teacher_model->classDetails($class_id, $num_checks)
                ];
                $this->view('teacher/class_detail', $data);
            }
            else {
                redirect('teachers/index');
            }
        }

        public function classCheck($class_id = false) {
            sessionUnsetMessage(teacher_create_class);
            sessionUnsetMessage(teacher_create_subject);
            sessionUnsetMessage(teacher_class_check);
            if($class_id) {
                $class_id = filter_var($class_id, FILTER_SANITIZE_NUMBER_INT);
                $data = [
                    'class_id' => $class_id
                ];
                if(!$this->teacher_model->hasStudent($class_id)) {
					sessionSetMessage(teacher_class_check, 'No student', 'warning');
                    redirect('teacher/index');
                }
                $this->view('teacher/class_check', $data);
            }
            else {
                redirect('teacher/index');
            }
        }

        public function faceIdentify() {
            sessionUnsetMessage(teacher_create_class);
            sessionUnsetMessage(teacher_create_subject);
            sessionUnsetMessage(teacher_class_check);
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $res = face_api_face_identify($_POST['class_id'], $_POST['image_blob']);
                $res_decode = json_decode($res);
                if($res_decode->code == 200) {
                    $user_student_id = $res_decode->result->user_id;//user_id
                    $check_res = $this->teacher_model->classCheck($_POST['class_id'], $user_student_id, 'TRUE');
                    $res_decode->result = $this->teacher_model->getStudentProfile($user_student_id);
                    $res_decode->messages = $check_res;
                    $res = json_encode($res_decode);
                }
                echo $res;
            } else {
                redirect('teacher/index');
            }
        }

        public function finishCheck() {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                sessionSetMessage(teacher_class_check, 'Finished');
                $this->teacher_model->finishCheck($_POST['class_id']);
                redirect('teacher/index');
            } else {
                redirect('teacher/index');
            }
        }

        public function createClass() {
            sessionUnsetMessage(teacher_create_class);
            sessionUnsetMessage(teacher_create_subject);
            sessionUnsetMessage(teacher_class_check);
            $data = $this->teacher_model->createClassDetail();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if(!isset($_POST['subject_id'])) {
					sessionSetMessage(teacher_create_class, 'Create subject', 'warning');
                }
			    else if(empty($_POST['section'])){
					sessionSetMessage(teacher_create_class, 'Pleae enter section', 'danger');
                }
				else if(strlen($_POST['section']) > 3 || !is_int((int)$_POST['section'])) {
					sessionSetMessage(teacher_create_class, 'Section must be integer and less then 3 charecters.', 'danger');
                } 
                else if($this->teacher_model->hasSection($_POST['subject_id'], $_POST['section'])) {
					sessionSetMessage(teacher_create_class, 'Duplicate.', 'danger');
                }
                else {
                    $this->teacher_model->createClass($_SESSION[user_id], $_POST['subject_id'], $_POST['semester_id'], $_POST['section']);
					sessionSetMessage(teacher_create_class, 'Done');
                }
                $this->view('teacher/class_create', $data);
			}
			else {
                $this->view('teacher/class_create', $data);
            }
        }

        public function createSubject() {
            sessionUnsetMessage(teacher_create_class);
            sessionUnsetMessage(teacher_class_check);
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				if(empty($_POST['subject_name']) || strlen($_POST['subject_name']) < 10){
					sessionSetMessage(teacher_create_subject, 'Name must be at least 10 charecters.', 'danger');
                }
                else if(empty($_POST['subject_code']) || strlen($_POST['subject_code']) != 8 || !is_int((int)$_POST['subject_code'])) {
					sessionSetMessage(teacher_create_subject, 'Code must be 8 digit.', 'danger');
                }
                else if($this->teacher_model->hasSubjectName($_POST['subject_name'])) {
					sessionSetMessage(teacher_create_subject, 'Name Duplicate.', 'danger');
                }
                else if($this->teacher_model->hasSubjectCode($_POST['subject_code'])) {
					sessionSetMessage(teacher_create_subject, 'Code Duplicate.', 'danger');
                }
                else {
                    $this->teacher_model->createSubject($_POST['subject_name'], $_POST['subject_code']);
					sessionSetMessage(teacher_create_subject, 'Done');
                }
                $this->view('teacher/subject_create');
			}
			else {
                $this->view('teacher/subject_create');
            }
        }
    }