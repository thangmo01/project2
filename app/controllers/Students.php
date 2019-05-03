<?php
	class Students extends Controller {
		public function __construct() {
			// checkLoggedIn('student');
			$this->student_model = $this->model('Student');
			$this->data = [];
		}

		public function index() {
			$this->view('student/index');
		}

		public function profile() {
			$profile = $this->student_model->getProfile($_SESSION[user_id]);
			$this->data = [
				'name' => $_SESSION[user_name],
				'student_id' => $_SESSION[student_id],
				'image_link' => $profile->image_link
			];
			$this->view('student/profile', $this->data);
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
						$tmp_file_path = "img/{$tmp_file_name}";

						// s3UploadImage($tmp_file_name, $tmp_file_path);
						move_uploaded_file($tmp_name, $tmp_file_path);

						$result = s3UploadStudentImage($tmp_file_path, $tmp_file_name);
						if($result) {
							$this->student_model->updateImage($_SESSION[user_id], $result['image_link'], $result['image_key']);
							$this->data['message'] = 'done';
						}
						else {
							$this->data['error'] ='try agian!';
						}

						unlink($tmp_file_path);
					}
					else {
						$this->data['error'] = 'size > 1MB!';
					}
				}
				else {
					$this->data['error'] = 'jpeg, gif, png!';
				}
			}
			else {
				$this->data['error'] = 'upload image!';
			}
			redirect('students/profile');
		}
	}