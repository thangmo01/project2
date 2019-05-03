<?php

class Class_Regis extends Controller
{
    public function __construct()
    {
        $this->create_model = $this->model('Class_Register');
    }

    public function Class_Regis()
    {
        $key = $_POST['key'];
        $student_id = $_SESSION['user_id'];
        $this->create_model->Class_Register($user_id,$key);
    }
}
