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

      public function getAllSchYearSemester()
      {
            $sql_c = "";
            return $this->checker($sql_c);
      }
}