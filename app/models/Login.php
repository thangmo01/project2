<?php

class Login
{
    public function __construct() {
        $this->db = new Database();

    }
    public function Student_Add($id,$name,$surname,$type)
    {
        $this->db->query('SELECT * FROM users WHERE outh_uid = :id');
        $this->db->bind(':id',$id);
        $nrow=$db->execute();
        if ($nrow<1) {
            $this->db->query('INSERT INTO users(first_name,last_name,user_type_id,outh_uid)');
        }
    }
}
