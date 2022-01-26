<?php

class GuardianData extends multi_functions
{
      protected $db;
      protected $table = "guardian_tb";

      protected $sql_t = "CREATE TABLE `guardian_tb` (
                              `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                              `family_name` varchar(255) NOT NULL,
                              `middle_name` varchar(255) DEFAULT NULL,
                              `first_name` varchar(255) NOT NULL,
                              `suffix` varchar(255) DEFAULT NULL,
                              `connection` varchar(255) NOT NULL,
                              `contact` varchar(255) DEFAULT NULL,
                              `student_id` int(11) NOT NULL,
                              `active` binary(1) NOT NULL DEFAULT '1',
                              PRIMARY KEY (`id`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }

      public function getGuardianData($student_id)
      {
            return $this->checker("SELECT * FROM $this->table 
                                    WHERE student_id=$student_id");
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