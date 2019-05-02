<?php

class Subject_Created
{

public function __construct() {
    $this->db = new Database();
}

public function Subject_Create($class_name,$subject_code)
{
    $this->db->query('INSERT INTO subjects (subject_code, name) 
                                VALUES (:subject_code, :class_name)
                    ');
                    $this->db->bind(':subject_code', $subject_code);
                    $this->db->bind(':class_name', $class_name);
                    $this->db->execute();
}
}