<?php

class StudentData
{
      protected $db;
      private $table = "studentbasic_tb";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;
      }

      public function getDisplayCardData($idsection)
      {
            return $this->checker("SELECT studentbasic_tb.id, studentbasic_tb.family_name, studentbasic_tb.middle_name, studentbasic_tb.first_name, studentbasic_tb.suffix, studentschool_tb.studentid_no, studentbasic_tb.profile_filename, studentbasic_tb.gender 
                        FROM $this->table 
                        INNER JOIN studentschool_tb 
                        ON studentbasic_tb.id=studentschool_tb.student_id 
                        WHERE studentschool_tb.yearsection_id='$idsection' 
                        ORDER BY studentbasic_tb.family_name");
      }

      public function getStudentData($id)
      {
            return $this->checker("SELECT * FROM $this->table 
                                    WHERE id=$id AND active=1");
      }

      public function getGuardianData($student_id)
      {
            return $this->checker("SELECT * FROM guardian_tb 
                                    WHERE student_id=$student_id");
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
}