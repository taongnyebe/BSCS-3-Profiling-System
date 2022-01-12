<?php

class StudentSchoolData
{
      protected $db;
      private $table = "studentschool_tb";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;
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

      private function checker($sql_c)
      {
            if ($connection = mysqli_query($this->db->con, $sql_c)) {
                  if (mysqli_num_rows($connection)>0) {
                        $studentData = array();

                        while ($item = mysqli_fetch_array($connection, MYSQLI_ASSOC)) {
                              $studentData[]=$item;
                        }

                        return $studentData;
                  } else
                        return 1;
            } else
                  return 2;
      }

      private function singlechecker($sql_c)
      {
            if ($connection = mysqli_query($this->db->con, $sql_c)) {
                  if (mysqli_num_rows($connection)>0) {
                        while ($item = mysqli_fetch_assoc($connection)) {
                              return $item;
                        }

                  } else
                        return 1;
            } else
                  return 2;
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