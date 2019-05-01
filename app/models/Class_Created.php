<?php 
    class Class_Created
    {
        public function __construct() {
            $this->db = new Database();

        }
        public function Class_Created($teach_id,$subject_name,$year,$semester,$sec)
        {
            $this->db->query('SELECT id FROM subjects WHERE name = :subject_name');
            $this->db->bind(':subject_name',$subject_name);
            $subject_id=$this->db->fetchAll();
            $this->db->query('SELECT * FROM semasters WHERE academic_year = :year and semaster = :semester');
            $this->db->bind(':academic_year',$year);
            $this->db->bind(':semester',$semester);
            $nrow = $db->execute();
            if ($nrow<1) {
                $this->db->query('INSERT INTO semasters (academic_year,semaster)
                VALUES (:academic_year,:semester)');
                $this->db->bind(':academic_year',$year);
                $this->db->bind(':semester',$semester);
                $this->db->execute();
            }
                $this->db->query('SELECT id FROM semasters WHERE academic_year = :year and semaster = :semester');
                $this->db->bind(':academic_year',$year);
                $this->db->bind(':semester',$semester);
                $semaster_id = $db->fetchAll();
            
            $this->db->query('INSERT INTO classes (subject_id,semaster_id,section,secret)
            VALUES (:subject_id,:semester_id,:sec,:key)');
            $this->db->bind(':subject_id',$subject_id);
            $this->db->bind(':semester_id',$semaster_id);
            $this->db->bind(':sec',$sec);
            $this->db->bind(':key',keygenerate());
            $this->db->execute();
        }

        public function keygenerate()
        {
            $key;
            do{
                $key = md5(microtime().rand());
                $this->db->query('SELECT * FROM classes WHERE secret = :key');
                $this->db->bind(':key',$key);
                $nrow = $db->execute();
            }while ($nrow=>1);
            return $key;
        }
    }