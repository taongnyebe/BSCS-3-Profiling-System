<?php

class StudentData extends multi_functions
{
      protected $db;
      protected $table = "studentbasic_tb";

      protected $sql_t = "CREATE TABLE `studentbasic_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `family_name` varchar(255) NOT NULL,
                                    `middle_name` varchar(255) DEFAULT NULL,
                                    `first_name` varchar(255) NOT NULL,
                                    `suffix` varchar(255) DEFAULT NULL,
                                    `sex` binary(1) NOT NULL,
                                    `date_of_birth` date NOT NULL,
                                    `contact_number` int(11) DEFAULT NULL,
                                    `email` varchar(255) DEFAULT NULL,
                                    `fb_name` varchar(255) DEFAULT NULL,
                                    `student_id_no` int(10) unsigned NOT NULL,
                                    `permanent_address` varchar(255) DEFAULT NULL,
                                    `current_address` varchar(255) DEFAULT NULL,
                                    `profile_filename` varchar(255) DEFAULT NULL,
                                    `active` binary(1) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }

      public function getDisplayCardData($idsection)
      {
            $sql_c = "SELECT studentbasic_tb.id, studentbasic_tb.family_name, 
                              studentbasic_tb.middle_name, studentbasic_tb.first_name, 
                              studentbasic_tb.suffix, studentbasic_tb.student_id, 
                              studentbasic_tb.profile_filename, studentbasic_tb.gender
                              FROM $this->table 
                              INNER JOIN studentschool_tb 
                              ON studentbasic_tb.id=studentschool_tb.student_id 
                              WHERE studentschool_tb.yearsection_id='$idsection' AND studentbasic_tb.active=1
                              ORDER BY studentbasic_tb.family_name";
            return $this->checker($sql_c);
      }

      public function getStudentData($id)
      {
            return $this->checker("SELECT * FROM $this->table 
                                    WHERE id=$id AND active=1");
      }

      public function getFullStudentList($limit=null)
      {
            return $this->checker("SELECT $this->table.*, studentschool_tb.id AS school_id FROM $this->table
                                    INNER JOIN studentschool_tb 
                                    ON studentbasic_tb.id=studentschool_tb.student_id
                                    GROUP BY $this->table.id
                                    ORDER BY studentbasic_tb.family_name");
      }

      public function getNewStudentDataID($family_name, $middle_name, $first_name, $suffix, $gender, $birthdate, $contact, $email)
      {
            return $this->singlechecker("SELECT id FROM $this->table 
                                          WHERE family_name='$family_name' && middle_name='$middle_name' && 
                                          first_name='$first_name' && suffix='$suffix' && gender='$gender' 
                                          && date_of_birth='$birthdate' && contact_number='$contact' && email='$email'");
      }

      public function setStudentData($family_name, $middle_name, $first_name, $suffix, $gender, $birthdate, $contact, $email, $student_id, $fb_name, $home, $boarding, $studentbasic_id)
      {

            if ($studentbasic_id != "") {
                  $sql_c = "UPDATE $this->table 
                              SET family_name='$family_name', middle_name='$middle_name', first_name='$first_name', suffix='$suffix', 
                              gender='$gender', date_of_birth='$birthdate', contact_number='$contact', email='$email', student_id='$student_id',
                              fb_name='$fb_name', home='$home', boarding='$boarding '
                              WHERE id='$studentbasic_id'";
                  return mysqli_query($this->db->con, $sql_c);
            } else {
                  $sql_c = "INSERT INTO $this->table 
                              SET family_name='$family_name', middle_name='$middle_name', first_name='$first_name', suffix='$suffix', 
                              gender='$gender', date_of_birth='$birthdate', contact_number='$contact', email='$email', student_id='$student_id',
                              fb_name='$fb_name', home='$home', boarding='$boarding'";
                  return mysqli_query($this->db->con, $sql_c);
            }
            
      }

      public function setProfileImage($profile_img, $studentbasic_id){
            $sql_c = "UPDATE $this->table
                        SET profile_filename='$profile_img'
                        WHERE id='$studentbasic_id'";
            return mysqli_query($this->db->con, $sql_c);
            

      }
      
}