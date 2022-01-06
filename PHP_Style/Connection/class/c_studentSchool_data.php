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
            return $this->checker("SELECT * FROM $this->table 
                                    WHERE student_id=$student_id AND current=0");
      }

      public function countStudentSectionYear($yearsection_id)
      {
            return $this->singlechecker("SELECT COUNT(id) AS student_count FROM $this->table
                                    WHERE yearsection_id=$yearsection_id");
      }

      private function checker($sql_c)
      {
            if($connection = mysqli_query($this->db->con, $sql_c))
            {
                  if(mysqli_num_rows($connection)>0)
                  {
                        $studentData = array();

                        while ($item = mysqli_fetch_array($connection, MYSQLI_ASSOC)) {
                              $studentData[]=$item;
                        }

                        return $studentData;
                  }else
                        return 1;
            }else
                  return 2;
      }
      private function singlechecker($sql_c)
      {
            if($connection = mysqli_query($this->db->con, $sql_c))
            {
                  if(mysqli_num_rows($connection)>0)
                  {
                        while ($item = mysqli_fetch_assoc($connection)) {
                              return $item;
                        }

                  }else
                        return 1;
            }else
                  return 2;
      }
      
      
}