<?php
	class Student extends Controller {
		public function check() {
			$this->view('students/check');
		}

		public function main() {
			$this->view('students/main');
		}

		public function editProfile() {
			$this->view('students/edit_profile');
		}

		public function uploadImage() {
			$profile_image = $_FILES['profile_image'];			
			if($profile_image['error'] == 0) {
				$bucket_name = 'project2-face-recognition.bucket02';
	
				// Connect to AWS
				try {
					$s3 = new Aws\S3\S3Client(
						array(
							'region'  => S3_REGION,
							'version' => 'latest',
							'credentials' => [
								'key'    => AWS_ACCESS_KEY_ID,
								'secret' => AWS_SECRET_ACCESS_KEY,
							]
						)
					);
				} catch (Exception $e) {
					die("Error: " . $e->getMessage());
				}
				$key_name = 'image/student/' . $profile_image['name'];

				// Add it to S3
				try {
					// Uploaded:
					$file = $profile_image['tmp_name'];
					$result = $s3->putObject(
						array(
							'Bucket'=>$bucket_name,
							'Key' =>  $key_name,
							'SourceFile' => $file,
							'StorageClass' => 'REDUCED_REDUNDANCY'
							// https://docs.aws.amazon.com/AmazonS3/latest/dev/storage-class-intro.html
						)
					);
					print_r($result);
					echo '<br>Done';

				}
				catch (Exception $e) {
					die('Error:' . $e->getMessage());
				}
			}
			else {
				echo 'Upload image';
			}

		}
	}