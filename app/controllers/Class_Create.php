<?php

class Class_Create extends Controllers
{
    public function __construct()
    {
        $this->create_model = $this->model('Class_Created');
    }

    public function Class_Create() {
        $class_id = $_POST['class_id'];
        $semester = $_POST['semester'];
        $teach_id = $_SESSION['user_id'];
        $sec = $_POST['sec'];
        $this->create_model->Class_Create($class_id,$semester,$sec,$teach_id);
    }
}