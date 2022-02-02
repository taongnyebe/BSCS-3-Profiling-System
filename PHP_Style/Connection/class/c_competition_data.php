<?php

class Competition extends multi_functions
{
      protected $db;
      protected $table = "competition_tb";

      protected $sql_t = "CREATE TABLE `competition_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `schyearsemester_id` int(11) DEFAULT NULL,
                                    `title` varchar(255) NOT NULL,
                                    `event_title` varchar(255) NOT NULL,
                                    `description` text DEFAULT NULL,
                                    `initial_date` date DEFAULT NULL,
                                    `end_date` date DEFAULT NULL,
                                    `active` binary(1) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`),
                                    KEY `schyearsemester_id` (`schyearsemester_id`),
                                    CONSTRAINT `competition_tb_ibfk_1` FOREIGN KEY (`schyearsemester_id`) REFERENCES `schyearsemester_tb` (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }
}