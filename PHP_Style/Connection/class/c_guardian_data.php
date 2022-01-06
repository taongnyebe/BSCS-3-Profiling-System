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