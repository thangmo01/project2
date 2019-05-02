<?php

class Subject_Create extends Controller
{
    public function __construct()
    {
        $this->create_model = $this->model('Subject_Created');
    }

    public function Subject_Create() {
        $class_id = $_POST['class_name'];
        $semester = $_POST['subject_code'];
        $this->create_model->Subject_Create($class_name,$subject_code);
    }
}
