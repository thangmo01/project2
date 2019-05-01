<?php 
    class Subject_Created
    {
        public function __construct() {
            $this->db = new Database();

        }
        
        public function Subject_Created($subject_name,$subject_code)
        {
            $this->db->query('INSERT INTO subjects(subject_code,name)
                VALUES (:subject_code,:name)');
                $this->db->bind(':subject_code',$subject_code);
                $this->db->bind(':name',$subject_name);
                $this->db->execute();
        }
    }