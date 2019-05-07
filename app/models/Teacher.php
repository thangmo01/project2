<?php
    class Teacher {
        public function __construct() {
            $this->db = new Database();
        }

        public function getStudentProfile($user_id) {
            $db = new Database();
            $db->query('SELECT user_students.student_id, users.first_name, users.last_name
                FROM users
                    JOIN user_students
                        ON users.id = user_students.user_id
                WHERE users.id = :user_id
            ');
            $db->bind(':user_id', $user_id);
            return $db->fetchOne();
        }

        public function finishCheck($class_id) {
            $db = new Database();
            $db->query('SELECT num_checks FROM classes WHERE id = :class_id');
            $db->bind(':class_id', $class_id);
            $num_checks = $db->fetchOne()->num_checks + 1;

            $db->query('SELECT user_student_id FROM class_students WHERE class_id = :class_id'); 
            $db->bind(':class_id', $class_id);
            $students = $db->fetchAll();

            $db->query('SELECT user_student_id FROM class_checkes WHERE class_id = :class_id AND num = :num_checks'); 
            $db->bind(':class_id', $class_id);
            $db->bind(':num_checks', $num_checks);
            $checked_students = $db->fetchAll();

            foreach ($students as $student) {
                foreach ($checked_students as $c_student) {
                    if($student->user_student_id == $c_student->user_student_id) {
                        continue 2;
                    }
                }
                $db->query('INSERT INTO class_checkes (class_id, user_student_id, status, num)
                    VALUES (:class_id, :user_student_id, :status, :num)
                ');
                $db->bind(':class_id', $class_id);
                $db->bind(':user_student_id', $student->user_student_id);
                $db->bind(':status', 'FALSE');
                $db->bind(':num', $num_checks);
                $db->execute();
            }
            $db->query('UPDATE classes SET num_checks = :num_checks WHERE id = :class_id');
            $db->bind(':class_id', $class_id);
            $db->bind(':num_checks', $num_checks);
            $db->execute();
        }

        public function classCheck($class_id, $user_student_id, $status) {
            $db = new Database();
            $db->query('SELECT * FROM class_students WHERE class_id = :class_id AND user_student_id = :user_student_id');
            $db->bind(':class_id', $class_id);
            $db->bind(':user_student_id', $user_student_id);
            $db->execute();
            if($db->rowCount() < 1) {
                return 'Nope.';
            }

            $db->query('SELECT num_checks FROM classes WHERE id = :class_id');
            $db->bind(':class_id', $class_id);
            $num = $db->fetchOne()->num_checks + 1;

            $db->query('SELECT id FROM class_checkes WHERE num = :num AND user_student_id = :user_student_id AND class_id = :class_id');
            $db->bind(':num', $num);
            $db->bind(':user_student_id', $user_student_id);
            $db->bind(':class_id', $class_id);
            $db->execute();
            if($db->rowCount() > 0) {
                return 'Dup.';
            }

            $db->query('INSERT INTO class_checkes (class_id, user_student_id, status, num)
                VALUES (:class_id, :user_student_id, :status, :num)
            ');
            $db->bind(':class_id', $class_id);
            $db->bind(':user_student_id', $user_student_id);
            $db->bind(':status', $status);
            $db->bind(':num', $num);
            $db->execute();
            return 'Good.';
        }

        public function hasStudent($class_id) {
            $db = new Database();
            $db->query('SELECT user_student_id FROM class_students WHERE class_id = :class_id');
            $db->bind(':class_id', $class_id);
            $db->execute();
            return $db->rowCount() > 0;
        }
        
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
            $classes = $db->fetchAll();
            foreach ($classes as $key => $class) {
                $db->query('SELECT user_student_id FROM class_students WHERE class_id = :class_id');
                $db->bind(':class_id', $class->id);
                $db->execute();
                $classes[$key]->students = $db->rowCount();;
            }
            return $classes;
        }

        public function createClassDetail() {
            $db = new Database();
            $db->query('SELECT id, subject_name, subject_code FROM subjects');
            $subject_list = $db->fetchAll();
                        
            $db->query('SELECT id, academic_year, semaster FROM semasters');
            $semaster_list = $db->fetchAll();

            return [
                'subject_list' => $subject_list,
                'semaster_list' => $semaster_list
            ];
        }

        public function createClass($teach_id, $subject_id, $semaster_id, $section) {
            $secret = $this->keygenerate();
            $this->db->query('INSERT INTO classes (subject_id, semaster_id, section, secret)
                VALUES (:subject_id, :semaster_id, :section, :secret)
            ');
            $this->db->bind(':subject_id', $subject_id);
            $this->db->bind(':semaster_id', $semaster_id);
            $this->db->bind(':section',$section);
            $this->db->bind(':secret', $secret);
            $this->db->execute();
            $class_id = $this->db->lastInsertId();

            $this->db->query('INSERT INTO class_teachers (class_id, user_teacher_id)
                VALUES (:class_id, :teach_id)');
            $this->db->bind(':class_id',$class_id);
            $this->db->bind(':teach_id',$teach_id);
            $this->db->execute();
        }

        public function createSubject($subject_name, $subject_code) {
            $this->db->query('INSERT INTO subjects (subject_name, subject_code)
                VALUES (:subject_name, :subject_code)');
            $this->db->bind(':subject_name',$subject_name);
            $this->db->bind(':subject_code',$subject_code);
            $this->db->execute();
        }

        public function hasSection($subject_id, $section) {
            $this->db->query('SELECT id FROM classes WHERE subject_id = :subject_id AND section = :section');
            $this->db->bind(':subject_id',$subject_id);
            $this->db->bind(':section', $section);
            $this->db->execute();
            return $this->db->rowCount() > 0;
        } 

        public function hasSubjectName($subject_name) {
            $this->db->query('SELECT id FROM subjects WHERE subject_name = :subject_name');
            $this->db->bind(':subject_name', $subject_name);
            $this->db->execute();
            return $this->db->rowCount() > 0;
        }

        public function hasSubjectCode($subject_code) {
            $this->db->query('SELECT id FROM subjects WHERE subject_code = :subject_code');
            $this->db->bind(':subject_code', $subject_code);
            $this->db->execute();
            return $this->db->rowCount() > 0;
        }

        public function ClassDetails($class_id)
        {
            $this->db->query('SELECT class_checkes.user_student_id, class_checkes.status, class_checkes.num,
            class_checkes.class_id, user_students.student_id, class_checkes.checked_at
            FROM class_checkes
                JOIN user_students
                ON class_checkes.user_student_id = user_students.user_id
            WHERE class_id = :class_id
            ORDER BY num
            ');
            $this->db->bind(':class_id', $class_id);
            $table = $this->db->fetchAll();

            $this->db->query('SELECT subjects.subject_name, classes.semaster_id, classes.section
                FROM classes
                JOIN subjects
                ON subjects.id = classes.subject_id
                WHERE classes.id = :class_id
            ');
            $this->db->bind(':class_id', $class_id);
            $detail = [
                'table' => $table, 'name' => $this->db->fetchOne()->subject_name, 'semester' => $this->db->fetchOne()->semaster_id, 'section' => $this->db->fetchOne()->section
            ];
            return $detail;
        }

        public function keygenerate() {
            $key;
            do{
                $key = md5(microtime().rand());
                $this->db->query('SELECT * FROM classes WHERE secret = :key');
                $this->db->bind(':key',$key);
                $this->db->execute();
            }while ($this->db->rowCount() >= 1 );
            return $key;
        }
    }