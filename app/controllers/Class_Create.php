<?php

class Class_Create extends Controllers
{
    public function __construct()
    {
        $this->create_model = $this->model('Class_Created');
    }

    public function Class_Create() {
        $subject_name = $_POST['subject_name'];
        $year = $_POST['year'];
        $semester = $_POST['semester'];
        $teach_id = $_SESSION['teacher_id'];
        $sec = $_POST['sec'];
        $this->create_model->Class_Created($teach_id,$subject_name,$year,$semester,$sec);
    }
}
