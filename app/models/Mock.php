<?php 
    class Mock
    {
        public function __construct() {
            $this->db = new Database();

        }

        public function mockStudents() {
            $count = 0;
            for($student_id = 59010010; $student_id <= 59010367; $student_id++) {
                // https://stackoverflow.com/questions/7991425/php-how-to-check-if-image-file-exists
                $img_link = URLROOT . '/public/img/' . $student_id . '.jpg';
                if(getimagesize($img_link)) {
                    $count++;
                    $first_name = "stu$count";
                    $last_name = "last";
                    $user_type_id = 2;
                    $outh_uid = "outh_uid$student_id";
                    
                    $this->db->query('SELECT * FROM users WHERE outh_uid = :outh_uid');
                    $this->db->bind(':outh_uid', $outh_uid);
                    $nrow = $this->db->execute();
                    if($nrow < 1) {
                        $this->db->query('INSERT INTO users (first_name, last_name, user_type_id, outh_uid) 
                                    VALUES (:first_name, :last_name, :user_type_id, :outh_uid)
                        ');
                        $this->db->bind(':first_name', $first_name);
                        $this->db->bind(':last_name', $last_name);
                        $this->db->bind(':user_type_id', $user_type_id);
                        $this->db->bind(':outh_uid', $outh_uid);
                        $nrow = $db->execute();

                        $this->db->query('SELECT img_link FROM user_students WHERE user_id = :user_id');
                        $this->db->bind(':user_id', $value->id);
                        $student = $this->db->fetchAll();
                        print_r($student);
                        echo '<br>';
                    }
                    else {
                        $this->db->query('SELECT id FROM users WHERE outh_uid = :outh_uid');
                        $this->db->bind(':outh_uid', $outh_uid);
                        $user_id = $this->db->fetchOne()->id;

                        $this->db->query('SELECT * FROM user_students WHERE user_id = :user_id');
                        $this->db->bind(':user_id', $user_id);
                        $student = $this->db->fetchOne();

                        if($student) {
                            $this->db->query('UPDATE user_students SET img_link = :img_link WHERE user_id = :user_id');
                            $this->db->bind(':img_link', $img_link);
                            $this->db->bind(':user_id', $user_id);
                            $nrow = $this->db->execute();
                        }
                        else {
                            $this->db->query('INSERT INTO user_students (user_id, student_id, img_link) VALUES (:user_id, :student_id, :img_link)');
                            $this->db->bind(':user_id', $user_id);
                            $this->db->bind(':student_id', $student_id);
                            $this->db->bind(':img_link', $img_link);
                            $nrow = $this->db->execute();
                        }
                    }
                }
            }
            echo "$count rows effected";
        }

        public function mockClassStudets() {
            $this->db->query('SELECT user_id FROM user_students');
            $students = $this->db->fetchAll();
            $count = 0;
            foreach ($students as $student) {
                $user_student_id = $student->user_id;
                $this->db->query('SELECT user_student_id FROM class_students WHERE class_id = :class_id AND user_student_id = :user_student_id');
                $this->db->bind(':class_id', 1);
                $this->db->bind(':user_student_id', $user_student_id);
                $row = $this->db->fetchOne();
                
                if(!$row) {
                    $count++;
                    $this->db->query('INSERT INTO class_students (class_id, user_student_id) 
                                    VALUES (:class_id, :user_student_id)'
                    );
                    $this->db->bind(':class_id', 1);
                    $this->db->bind(':user_student_id', $user_student_id);
                    $this->db->execute();
                }
            }
            echo "$count rows effected";
        } 

        public function updateImage() {
            $db = new Database();
            $db->query('SELECT user_id, student_id FROM user_students');
            $students = $db->fetchAll();
            // print_r($students);
            ini_set('max_execution_time', 300);
            foreach ($students as $stu) {
                $key = md5(uniqid());
                $tmp_file_name = "{$key}.jpg"; 
                $tmp_file_path = "img/{$stu->student_id}.jpg";
                $result = s3UploadStudentImage($tmp_file_path, $tmp_file_name);
                $db->query('UPDATE user_students 
                    SET image_link = :image_link, image_key = :image_key
                    WHERE user_id = :user_id
                ');
                $db->bind(':user_id', $stu->user_id);
                $db->bind(':image_link', $result['image_link']);
                $db->bind(':image_key', $result['image_key']);
                $db->execute();
                echo $result['image_link'] . '<br>';
            }
        }
    }
    