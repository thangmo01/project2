<?php
	class Students extends Controller {
		public function __construct() {
			checkLoggedIn('student');
			$this->student_model = $this->model('Student');
		}

		public function index() {
			$this->view('student/index');
			sessionUnsetMession(student_upload_image);
		}

		public function profile() {
			$profile = $this->student_model->getProfile($_SESSION[user_id]);
			$data = [
				'name' => $_SESSION[user_name],
				'student_id' => $_SESSION[student_id],
				'image_link' => $profile->image_link
			];
			$this->view('student/profile', $data);
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
						if($profile_image['size'] < 1000000) {
							$res = face_api_upload_student_image($profile_image, $_SESSION[user_outh_id]);
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
							sessionSetMessage(student_upload_image, 'The image must be less than 1MB in size.', 'danger');
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