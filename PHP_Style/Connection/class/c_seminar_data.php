<?php

class Seminar extends multi_functions
{
      protected $db;
      protected $table = "seminar_tb";

      protected $sql_t = "CREATE TABLE `seminar_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `schyearsemester_id` int(11) DEFAULT NULL,
                                    `title` varchar(255) NOT NULL,
                                    `host` varchar(255) DEFAULT NULL,
                                    `description` varchar(255) DEFAULT NULL,
                                    `initial_date` date DEFAULT NULL,
                                    `end_date` date DEFAULT NULL,
                                    `active` binary(1) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }
}