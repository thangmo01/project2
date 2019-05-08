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
                $this->db->query('SELECT subject_id, section, semaster_id, num_checks FROM classes WHERE id = :class_id');
                $this->db->bind(':class_id', $class->class_id);
                $class_info = $this->db->fetchOne(); 
                $subject_id = $class_info->subject_id;
                $semester_id = $class_info->semaster_id;
                $classes[$key]->class_id = $class->class_id;
                $classes[$key]->section = $class_info->section;
                $classes[$key]->num_checks = $class_info->num_checks;

                $this->db->query('SELECT academic_year, semaster FROM semasters WHERE id = :semester_id');
                $this->db->bind(':semester_id', $semester_id);
                $classes[$key]->academic_year = $this->db->fetchOne()->academic_year;
                $classes[$key]->semester = $this->db->fetchOne()->semaster;

                $this->db->query('SELECT subject_name FROM subjects WHERE id = :subject_id');
                $this->db->bind(':subject_id', $subject_id);
                $classes[$key]->subject_name = $this->db->fetchOne()->subject_name;

                $this->db->query('SELECT user_student_id FROM class_checkes WHERE user_student_id = :user_id AND status = "TRUE" AND class_id = :class_id');
                $this->db->bind(':class_id', $class->class_id);
                $this->db->bind(':user_id', $user_id);
                $this->db->execute();
                $classes[$key]->check = $this->db->rowCount();
            }
            return $classes;
        }

        public function getCheckList($class_id, $user_student_id) {
            $this->db->query('SELECT status, num, checked_at
                FROM class_checkes
                WHERE class_id = :class_id AND user_student_id = :user_student_id
                GROUP BY num
            ');
            $this->db->bind(':class_id', $class_id);
            $this->db->bind(':user_student_id', $user_student_id);
            return $this->db->fetchAll();
        }

        public function getStudentList($class_id) {
            $this->db->query('SELECT user_students.student_id, users.first_name, users.last_name
            FROM class_students 
                JOIN users
                    ON users.id = class_students.user_student_id
                JOIN user_students
                    ON user_students.user_id = class_students.user_student_id
            WHERE class_id = :class_id');
            $this->db->bind(':class_id', $class_id);
            return $this->db->fetchAll();
        }

        public function getClassInfo($class_id) {
            $this->db->query('SELECT subjects.subject_name, semasters.semaster, classes.section, num_checks
                FROM classes
                    JOIN subjects
                        ON subjects.id = classes.subject_id
                    JOIN semasters
                        ON semasters.id = classes.semaster_id
                WHERE classes.id = :class_id
            ');
            $this->db->bind(':class_id', $class_id);
            return $this->db->fetchOne();
        }
    }