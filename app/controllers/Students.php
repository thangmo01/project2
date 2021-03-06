<?php
	class Students extends Controller {
		public function __construct() {
			checkLoggedIn('student');
			$this->student_model = $this->model('Student');
		}

		public function index() {
			sessionUnsetMessage(student_upload_image);
			sessionUnsetMessage(student_join_class);
			$data = $this->student_model->getClassList($_SESSION[user_id]);
			$this->view('student/index', $data);
		}

		public function profile() {
			sessionUnsetMessage(student_join_class);
			$profile = $this->student_model->getProfile($_SESSION[user_id]);
			$data = [
				'name' => $_SESSION[user_name],
				'student_id' => $_SESSION[student_id],
				'image_link' => empty($profile->image_link) ? URLROOT . '/img/profile.jpg' : $profile->image_link
			];
			$this->view('student/profile', $data);
		}

		public function joinclass() {
			sessionUnsetMessage(student_upload_image);
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
				$data =[
				  'secret' => trim($_POST['secret'])
				];

				if(empty($data['secret'])){
					sessionSetMessage(student_join_class, 'Pleae enter key', 'danger');
				}
				else if(!$this->student_model->hasImageProfile($_SESSION[user_id])) {
					sessionSetMessage(student_join_class, 'Upload image profile.', 'danger');
				}
				else if(!$this->student_model->checkKey($_POST['secret'])) {
					sessionSetMessage(student_join_class, 'KEY', 'danger');
				}
				else {
					$result = $this->student_model->classRegis($_SESSION['user_id'], $_POST['secret']);
					if(!$result) {
						sessionSetMessage(student_join_class, 'Duplicate', 'danger');
					}
					else {
						sessionSetMessage(student_join_class, 'Done');
					}
				}

				$this->view('student/joinclass', $data);
			}
			else {
				$this->view('student/joinclass');
			}
		}

		public function class($class_id = false) {
			$class_id = filter_var($class_id, FILTER_SANITIZE_NUMBER_INT);
			if($class_id) {
				$data = [
					'class' => $this->student_model->getClassInfo($class_id),
					'students' => $this->student_model->getStudentList($class_id),
					'checks' => $this->student_model->getCheckList($class_id, $_SESSION['user_id'])
				];
				$this->view('student/class', $data);
			}
			else {
				redirect('students/index');
			}
		}

		public function uploadImage() {
			if(isset($_FILES['profile_image'])) {
				$profile_image = $_FILES['profile_image'];
				if($profile_image['error'] == 0) {
					$extension = explode('.', $profile_image['name']);
					$extension = strtolower(end($extension));
					// check file extension
					if(preg_match('/^jpg$|^png$/', $extension)) {
						// check size < 1MB
						if($profile_image['size'] < 2000000) {
							$res = face_api_upload_student_image($profile_image, $_SESSION[user_outh_id], $_SESSION[user_id]);
							if($res['code'] == 200) {
								$result = $res['result'];
								$this->student_model->updateImage($_SESSION[user_id], $result['image_link'], $result['image_key']);
								sessionSetMessage(student_upload_image, 'Upload done.');
							}
							else {
								sessionSetMessage(student_upload_image, $res['messages'] , 'danger');
							}
						}
						else {
							sessionSetMessage(student_upload_image, 'The image must be less than 2MB in size.', 'danger');
						}
					}
					else {
						sessionSetMessage(student_upload_image, 'The image must be of JPEG or PNG format.', 'danger');
					}
				}
				else {
					sessionSetMessage(student_upload_image, 'Select image.', 'danger');
				}
			}
			else {
				sessionSetMessage(student_upload_image, 'Select image.', 'danger');
			}
			redirect('students/profile');
		}
	}