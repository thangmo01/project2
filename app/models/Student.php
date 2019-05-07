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

        public function getClassList($user_id)
        {
            $this->db->query('SELECT class_id FROM class_students WHERE user_student_id = :user_id');
            $this->db->bind(':user_id', $user_id);
            $classes = $this->db->fetchAll();
            foreach ($classes as $key => $class) {
                $this->db->query('SELECT section FROM classes WHERE id = :class_id');
                $this->db->bind(':class_id', $class->class_id);
                $classes[$key]->section = $this->db->fetchOne()->section;
                $this->db->query('SELECT semaster_id FROM classes WHERE id = :class_id');
                $this->db->bind(':class_id', $class->class_id);
                $semester_id = $this->db->fetchOne()->semaster_id;
                $this->db->query('SELECT academic_year FROM semasters WHERE id = :semester_id');
                $this->db->bind(':semester_id', $semester_id);
                $classes[$key]->academic_year = $this->db->fetchOne()->academic_year;
                $this->db->query('SELECT semaster FROM semasters WHERE id = :semester_id');
                $this->db->bind(':semester_id', $semester_id);
                $classes[$key]->semester = $this->db->fetchOne()->semaster;
                $this->db->query('SELECT subject_id FROM classes WHERE id = :class_id');
                $this->db->bind(':class_id', $class->class_id);
                $subject_id = $this->db->fetchOne()->subject_id;
                $this->db->query('SELECT subject_name FROM subjects WHERE id = :subject_id');
                $this->db->bind(':subject_id', $subject_id);
                $classes[$key]->subject_name = $this->db->fetchOne()->subject_name;
                $this->db->query('SELECT user_student_id FROM class_checkes WHERE user_student_id = :user_id AND status = "TRUE" AND class_id = :class_id');
                $this->db->bind(':class_id', $class->class_id);
                $this->db->bind(':user_id', $user_id);
                $this->db->execute();
                $classes[$key]->Check = $this->db->rowCount();
            }
            return $classes;
        }
    }