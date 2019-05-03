<?php

class Login
{
    public function __construct() {
        $this->db = new Database();

    }
    public function Student_Add($outh_uid, $first_name, $last_name, $user_type_id, $student_id)
    {
        $this->db->query('SELECT * FROM users WHERE outh_uid = :outh_uid');
        $this->db->bind(':outh_uid', $outh_uid);
        $this->db->execute();
        $nrow = $this->db->rowCount();

        if ($nrow < 1) {
            $last_id = $this->createUser($outh_uid, $first_name, $last_name, $user_type_id);
            $this->db->query('INSERT INTO user_students(user_id, user_type_id, student_id)
                VALUES(:user_id, :user_type_id, :student_id)'
            );
            $this->db->bind(':user_id', $last_id);
            $this->db->bind(':user_type_id', $user_type_id);
            $this->db->bind(':student_id', $student_id);
            $this->db->execute();

            return $last_id;
        }else {
            return $this->updateUser($first_name, $last_name, $outh_uid);
        }

    
    }

    public function Teach_Add($outh_uid, $first_name, $last_name, $user_type_id)
    {
        $this->db->query('SELECT * FROM users WHERE outh_uid = :outh_uid');
        $this->db->bind(':outh_uid', $outh_uid);
        $this->db->execute();
        $nrow = $this->db->rowCount();

        if ($nrow < 1) {
            $last_id = $this->createUser($outh_uid, $first_name, $last_name, $user_type_id);
            $this->db->query('INSERT INTO user_teachers(user_id, user_type_id)
                VALUES( :user_id, :user_type_id)
            ');
            $this->db->bind(':user_id', $last_id);
            $this->db->bind(':user_type_id', $user_type_id);
            $this->db->execute();

            return $last_id;
        }else {
            return $this->updateUser($first_name, $last_name, $outh_uid);
        }
    }

    private function createUser($outh_uid, $first_name, $last_name, $user_type_id) {
        $this->db->query('INSERT INTO users(first_name, last_name, user_type_id, outh_uid)
            VALUES(:first_name, :last_name, :user_type_id, :outh_uid)
        ');
        $this->db->bind(':first_name', $first_name);
        $this->db->bind(':last_name', $last_name);
        $this->db->bind(':user_type_id', $user_type_id);
        $this->db->bind(':outh_uid', $outh_uid);
        $this->db->execute();

        return $this->db->lastInsertId();
    }

    private function updateUser($first_name, $last_name, $outh_uid) {
        $this->db->query('UPDATE users 
            SET first_name = :first_name, last_name = :last_name
            WHERE outh_uid = :outh_uid
        ');
        $this->db->bind(':first_name', $first_name);
        $this->db->bind(':last_name', $last_name);
        $this->db->bind(':outh_uid', $outh_uid);
        $this->db->execute();

        $this->db->query('SELECT id FROM users WHERE outh_uid = :outh_uid');
        $this->db->bind(':outh_uid', $outh_uid);
        $row = $this->db->fetchOne();

        return $row->id;
    }
}
