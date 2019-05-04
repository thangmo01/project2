<?php

class Display_Tables
{
    public function __construct() {
        $this->db = new Database();

    }

    public function Subject_Count($student_id)
    {
        $this->db->query('SELECT class_id FROM class_student WHERE user_student_id = :student_id');
        $this->db->bind(':student_id',$student_id);
        $subject_list = $this->db->FetchAll();
        return $subject_list;
    }
}
