<?php

class Class_Created
{
    public function __construct() {
        $this->db = new Database();
    }
    public function Class_Create($semester,$sec,$teach_id)
    {
        $this->db->query('INSERT INTO classes (subject_id, semester_id, section, secret) 
                                    VALUES (:class_id, :semester, :sec, :secret)');
                        $this->db->bind(':semester', $semester);
                        $this->db->bind(':sec', $sec);
                        $keyg = keygenerate();
                        $this->db->bind(':secret', $keyg);
                        $this->db->execute();
                        $last_id = $this->db->lastInsertId();
        $this->db->query('INSERT INTO class_teachers (class_id, user_teacher_id) 
                        VALUES (:last_id, :teach_id)');    
                        $this->db->bind(':last_id', $last_id);
                        $this->db->bind(':teach_id', $teach_id);
                        $this->db->execute();
    }


    public function keygenerate()
    {
        $key;
        $nrow = 1;
        while ($nrow>=1) {
            $key = md5(microtime().rand());
            $this->db->query('SELECT * FROM classes WHERE secret=:key');
            $this->db->bind(':key', $key);
            $nrow = $this->db->execute();
        }
        return $key;
    }
    
}
