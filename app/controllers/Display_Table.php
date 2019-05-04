<?php

class Display_Table extends Controller
{
    public function __construct()
    {
        $this->create_model = $this->model('Display_Tables');
    }
    
    public function Student_Table()
    {
        $student_id = $_SESSION['user_id'];
        $subject_count = $this->create_model->Count_Subject($student_id);
        echo $subject_count;
    }

}
