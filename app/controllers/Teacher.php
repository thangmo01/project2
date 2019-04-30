<?php
	class Teacher extends Controller {
		public function check() {
			$this->view('teachers/check');
		}

		public function main() {
			$this->view('teachers/main');
		}
		public function setting() {
			$this->view('teachers/setting');
		}
		public function room() {
			$this->view('teachers/room');
		}
	}