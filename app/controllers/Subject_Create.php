<?php

class Subject_Create extends Controller
{
    public function __construct()
    {
        $this->mockdata_model = $this->model('Subject_Created');
    }

    public function Subject_Create()
    {
        $subject_name = $_POST['subject_name'];
        $subject_code = $_POST['subject_code'];
        $this->create_model->Subject_Created($subject_name,$subject_code);
    }
}
