<?php

class StudentSchoolData extends multi_functions
{
      protected $db;
      protected $table = "studentschool_tb";

      protected $sql_t = "CREATE TABLE `studentschool_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `studentbasic_id` int(11) NOT NULL,
                                    `regular` binary(1) DEFAULT NULL,
                                    `student_status` varchar(255) DEFAULT NULL,
                                    `current` int(11) DEFAULT NULL,
                                    `active` int(11) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`),
                                    KEY `studentbasic_id` (`studentbasic_id`),
                                    KEY `yearsection_id` (`yearsection_id`),
                                    KEY `schyearsemester_id` (`schyearsemester_id`),
                                    CONSTRAINT `studentschool_tb_ibfk_1` FOREIGN KEY (`studentbasic_id`) REFERENCES `studentbasic_tb` (`id`),
                                    CONSTRAINT `studentschool_tb_ibfk_2` FOREIGN KEY (`yearsection_id`) REFERENCES `yearsection_tb` (`id`),
                                    CONSTRAINT `studentschool_tb_ibfk_3` FOREIGN KEY (`schyearsemester_id`) REFERENCES `schyearsemester_tb` (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }

      public function getStudentSchoolDataCurrent($student_id)
      {
            $sql_c =  "SELECT * FROM $this->table 
                                    WHERE studentbasic_id=$student_id AND current=1";
            return $this->singlechecker($sql_c);
      }

      public function getStudentSchoolDataHistory($student_id)
      {
            $sql_c =  "SELECT * FROM $this->table 
                                    WHERE studentbasic_id=$student_id AND current=0";
            return $this->checker($sql_c);
      }

      public function countStudentSectionYear($yearsection_id)
      {
            $sql_c = "SELECT COUNT(id) AS student_count FROM $this->table
                                          WHERE active=1 AND yearsection_id=$yearsection_id";
            return $this->singlechecker($sql_c);
      }

      public function setStudentSchoolData($yearsection, $standing, $status, $studentbasic_id, $id)
      {
            if ($id != "") {
                  $sql_c = "UPDATE $this->table 
                              SET yearsection_id='$yearsection', regular='$standing', 
                              student_status='$status'
                              WHERE id=$id";
                  return mysqli_query($this->db->con, $sql_c);
            } else {
                  $sql_c = "INSERT INTO $this->table 
                              SET yearsection_id='$yearsection', regular='$standing', 
                              student_status='$status', studentbasic_id='$studentbasic_id'";
                  return mysqli_query($this->db->con, $sql_c);
            }
      }
      
      
}