<?php
    class Teacher {
        public function getClassList($user_id) {
            $db = new Database();
            $db->query('SELECT classes.id, subjects.subject_code, subjects.subject_name, 
                semasters.academic_year, semasters.semaster, classes.section, 
                classes.num_checks, classes.secret
                FROM classes 
                    JOIN class_teachers
                        ON classes.id = class_teachers.class_id
                    JOIN subjects
                        ON classes.subject_id = subjects.id
                    JOIN semasters
                        ON classes.semaster_id = semasters.id
                WHERE user_teacher_id = :user_id
            ');
            $db->bind(':user_id', $user_id);
            return $db->fetchAll();
        }
    }