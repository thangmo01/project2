<?php

    class Class_Register
    {
        public function __construct() {
            $this->db = new Database();

        }

        public function Class_Register($user_id,$key)
        {
            $this->db->query('SELECT id FROM classes WHERE secret = :key');
            $this->db->bind(':key',$key);
            $class_id = $this->db->fetchOne();
            $this->db->query('INSERT INTO class_students(class_id, user_student_id) VALUES (:class_id, :key)');
            $this->db->bind(':class_id',$class_id);
            $this->db->bind(':key',$key);
            $this->db->execute();
        }
    }
    