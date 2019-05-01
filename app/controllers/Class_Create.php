<?php

class Class_Create extends Controllers
{
    public function _Create()
    {
        $this->create_model = $this->model('Class_Created');
    }

    public function Class_Create() {
        $class_id = $_POST['class_id'];
        $semester = $_POST['semester'];
        $sec = $_POST['sec'];
        $this->create_model->Class_Create($class_id,$semester,$sec);
    }
}
