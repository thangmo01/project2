<?php
	class Student extends Controller {
		public function check() {
			$this->view('students/check');
		}

		public function main() {
			$this->view('students/main');
		}
		public function room(){
			$this->view('students/room');
		}
	}