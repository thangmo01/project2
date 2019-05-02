<?php
	class Students extends Controller {
		public function __construct() {
			checkLoggedIn('student');
			$this->student_model = $this->model('Student');
		}

		public function index() {
			$this->view('student/index');
		}

		public function editProfile() {
			$this->view('student/edit_profile');
		}

		public function uploadImage() {
			$profile_image = $_FILES['profile_image'];			
			if($profile_image['error'] == 0) {
				// File details.
				$name = $profile_image['name']; 
				$tmp_name = $profile_image['tmp_name'];
				$size = $profile_image['size'];

				$extension = explode('.', $name);
				$extension = strtolower(end($extension));

				// check file extension
				if(preg_match('/^jpg$|^gif$|^png$/', $extension)) {
					// check size < 1MB
					if($size < 1000000) {
						// Temp details
						$key = md5(uniqid());
						$tmp_file_name = "{$key}.{$extension}"; 
						$tmp_file_path = "{$tmp_file_name}";

						// s3UploadImage($tmp_file_name, $tmp_file_path);
						move_uploaded_file($tmp_name, $tmp_file_path);

						$result = s3UploadStudentImage($tmp_file_name);
						if($result) {
							$this->student_model->updateImage($_SESSION[user_id], $result['image_link'], $result['image_key']);
							$data = ['message' => 'done'];
							$this->view('student/edit_profile', $data);
						}
						else {
							$data = ['error' => 'try agian!'];
							$this->view('student/edit_profile', $data);
						}
					}
					else {
						$data = ['error' => 'size > 1MB!'];
						$this->view('student/edit_profile', $data);
					}
					$this->view('student/edit_profile');
				}
				else {
					$data = ['error' => 'jpeg, gif, png!'];
					$this->view('student/edit_profile', $data);
				}
			}
			else {
				$data = ['error' => 'upload image!'];
				$this->view('student/edit_profile', $data);
			}

		}
	}