<?php

class StudentData
{
      protected $db;

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;
      }

      public function getDisplayCardData($idsection)
      {
            if($connection = mysqli_query($this->db->con, "SELECT studentbasic_tb.id, studentbasic_tb.family_name, studentbasic_tb.middle_name, studentbasic_tb.first_name, studentbasic_tb.suffix, studentschool_tb.studentid_no, studentbasic_tb.profile_filename, studentbasic_tb.gender 
                                                            FROM studentbasic_tb 
                                                            INNER JOIN studentschool_tb 
                                                            ON studentbasic_tb.id=studentschool_tb.student_id 
                                                            WHERE studentschool_tb.yearsection_id='$idsection' 
                                                            ORDER BY studentbasic_tb.family_name"))
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

      public function getFullStudentData($id)
      {
            if($connection = mysqli_query($this->db->con, "SELECT studentbasic_tb.*, studentschool_tb.id AS studentschool_id, studentschool_tb.yearsection_id, studentschool_tb.studentid_no, studentschool_tb.regular, studentschool_tb.student_status, yearsection_tb.year, yearsection_tb.section
                                                            FROM ((studentbasic_tb 
                                                            INNER JOIN studentschool_tb 
                                                            ON studentbasic_tb.id=studentschool_tb.student_id)
                                                            INNER JOIN yearsection_tb
                                                            ON yearsection_tb.id=studentschool_tb.yearsection_id)
                                                            WHERE studentbasic_tb.id='$id'"))
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