<?php

class SchYearSem extends multi_functions
{
      protected $db;
      protected $table = "schyearsemester_tb";

      protected $sql_t = "CREATE TABLE `schyearsemester_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `semester` varchar(255) DEFAULT NULL,
                                    `sch_year` varchar(255) DEFAULT NULL,
                                    `active` binary(1) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }

      public function getSelectedSchYear($page)
      {
            $sql_c = "SELECT DISTINCT sch_year FROM $this->table 
                        WHERE active=1 
                        ORDER BY sch_year DESC LIMIT $page,1";
            return $this->singlechecker($sql_c);
      }

      public function getDesignatedSchYear($id)
      {
            $sql_c = "SELECT * FROM $this->table 
                        WHERE id='$id'";
            return $this->singlechecker($sql_c);
      }

      public function getAllSemeter_Schyear($year)
      {
            $sql_c = "SELECT * FROM $this->table 
                        WHERE sch_year='$year' 
                        ORDER BY semester DESC";
            return $this->checker($sql_c);
      }
}