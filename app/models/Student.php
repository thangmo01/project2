<?php
    class Student {
        public function __construct() {
            $this->db = new Database();
        }

        public function updateImage($user_id, $image_link, $image_key) {
            $db = new Database();
            $db->query('UPDATE user_students 
                SET image_link = :image_link, image_key = :image_key
                WHERE user_id = :user_id
            ');
            $db->bind(':image_link', $image_link);
            $db->bind(':image_key', $image_key);
            $db->bind(':user_id', $user_id);
            $db->execute();
        }

        public function getProfile($user_id) {
            $db = new Database();
            $db->query('SELECT image_link, image_key FROM user_students WHERE user_id = :user_id');
            $db->bind(':user_id', $user_id);

            return $db->fetchOne();
        }

        public function hasImageProfile($user_id) {
            $db = new Database();
            $db->query('SELECT image_link FROM user_students WHERE user_id = :user_id');
            $db->bind(':user_id', $user_id);
            return !empty($db->fetchOne()->image_link);
        }

        public function checkKey($secret) {
            $db = new Database();
            $db->query('SELECT secret FROM classes WHERE secret = :secret');
            $db->bind(':secret', $secret);
            return !empty($db->fetchOne()->secret);
        }

        public function classRegis($user_id, $key) {
            $this->db->query('SELECT id FROM classes WHERE secret = :key');
            $this->db->bind(':key',$key);
            $class_id = $this->db->fetchOne()->id;

            $this->db->query("SELECT * FROM class_students WHERE class_id = :class_id AND user_student_id = :user_id");
            $this->db->bind(':class_id',$class_id);
            $this->db->bind(':user_id',$user_id);
            $this->db->execute();
            if($this->db->rowCount() > 0) {
                return false;
            }

            $this->db->query('INSERT INTO class_students(class_id, user_student_id) VALUES (:class_id, :user_id)');
            $this->db->bind(':class_id',$class_id);
            $this->db->bind(':user_id',$user_id);
            $this->db->execute();
            return true;
        }
    }