<?php

class StudentSchoolData extends multi_functions
{
      protected $db;
      protected $table = "studentschool_tb";

      protected $sql_t = "CREATE TABLE `studentschool_tb` (
                                    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                                    `yearsection_id` int(11) NOT NULL,
                                    `regular` varchar(255) NOT NULL,
                                    `student_status` varchar(255) NOT NULL,
                                    `student_id` int(11) NOT NULL,
                                    `current` binary(1) NOT NULL,
                                    `active` binary(1) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }

      public function getStudentSchoolDataCurrent($student_id)
      {
            return $this->checker("SELECT * FROM $this->table 
                                    WHERE student_id=$student_id AND current=1");
      }
      public function getStudentSchoolDataHistory($student_id)
      {
            return $this->checker("SELECT $this->table.* FROM $this->table 
                                    INNER JOIN yearsection_tb
                                    ON yearsection_tb.id=$this->table.yearsection_id
                                    WHERE student_id=$student_id AND current=0
                                    ORDER BY yearsection_tb.year DESC, yearsection_tb.semester ASC");
      }

      public function countStudentSectionYear($yearsection_id)
      {
            return $this->singlechecker("SELECT COUNT($this->table.id) AS student_count FROM $this->table
                                          INNER JOIN studentbasic_tb
                                          ON studentbasic_tb.id=$this->table.student_id
                                          WHERE $this->table.yearsection_id=$yearsection_id AND studentbasic_tb.active=1");
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
                              student_status='$status', student_id='$studentbasic_id'";
                  return mysqli_query($this->db->con, $sql_c);
            }
      }
      
      
}