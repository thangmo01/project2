<?php

class Login
{
    public function __construct() {
        $this->db = new Database();

    }
    public function Student_Add($id,$name,$surname,$type,$student_code)
    {
        $this->db->query('SELECT * FROM users WHERE outh_uid = :id');
        $this->db->bind(':id',$id);
        $nrow=$db->execute();
        if ($nrow<1) {
            $this->db->query('INSERT INTO users(first_name,last_name,user_type_id,outh_uid)VALUES(:name,:surname,:type,:id)');
            $this->db->bind(':name',$name);
            $this->db->bind(':surname',$surname);
            $this->db->bind(':type',$type);
            $this->db->bind(':id',$id);
            $this->db->execute();
            $last_id = $db->lastInsertId();
            $this->db->query('INSERT INTO user_students(user_id,user_type_id,student_id)VALUES(:last_id,:type,:student_code)');
            $this->db->bind(':last_id',$last_id);
            $this->db->bind(':type',$type);
            $this->db->bind(':student_code',$student_code);
            $this->db->execute();
        }else {
            die('F U');
        }

    
    }

    public function Teach_Add($id,$name,$surname,$type)
    {
        $this->db->query('SELECT * FROM users WHERE outh_uid = :id');
        $this->db->bind(':id',$id);
        $nrow=$db->execute();
        if ($nrow<1) {
            $this->db->query('INSERT INTO users(first_name,last_name,user_type_id,outh_uid)VALUES(:name,:surname,:type,:id)');
            $this->db->bind(':name',$name);
            $this->db->bind(':surname',$surname);
            $this->db->bind(':type',$type);
            $this->db->bind(':id',$id);
            $this->db->execute();
            $last_id = $db->lastInsertId();
            $this->db->query('INSERT INTO user_teachers(user_id,user_type_id)VALUES(:last_id,:type)');
            $this->db->bind(':last_id',$last_id);
            $this->db->bind(':type',$type);
            $this->db->execute();
        }else {
            die('F U');
        }
    }
}
