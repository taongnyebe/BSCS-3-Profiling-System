<?php

class GuardianData
{
      protected $db;
      private $table = "guardian_tb";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;
      }

      public function getGuardianData($student_id)
      {
            return $this->checker("SELECT * FROM $this->table 
                                    WHERE student_id=$student_id");
      }

      private function checker($sql_c)
      {
            if($connection = mysqli_query($this->db->con, $sql_c)) {
                  if(mysqli_num_rows($connection)>0) {
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

      public function setGuardianData($family_name, $middle_name, $first_name, $suffix, $connection, $contact, $studentbasic_id, $id)
      {
            $sql_c = "";
            if ($id != "") {
                  $sql_c = "UPDATE $this->table
                              SET family_name='$family_name', middle_name='$middle_name', first_name='$first_name',
                              suffix='$suffix', connection='$connection', contact='$contact'
                              WHERE id=$id";
            } else {
                  $sql_c = "INSERT INTO $this->table
                              SET family_name='$family_name', middle_name='$middle_name', first_name='$first_name',
                              suffix='$suffix', connection='$connection', contact='$contact', student_id='$studentbasic_id'";
            }
            return mysqli_query($this->db->con, $sql_c);
      }
}