<?php

class Award extends multi_functions
{
      protected $db;
      protected $table = "awardstudent_tb";

      protected $sql_t = "CREATE TABLE `award_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `competition_id` int(11) NOT NULL,
                                    `schyearsemester_id` int(11) DEFAULT NULL,
                                    `title` varchar(255) DEFAULT NULL,
                                    `description` text DEFAULT NULL,
                                    `date_awarded` date DEFAULT NULL,
                                    `active` binary(1) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`),
                                    KEY `competition_id` (`competition_id`),
                                    KEY `schyearsemester_id` (`schyearsemester_id`),
                                    CONSTRAINT `award_tb_ibfk_1` FOREIGN KEY (`competition_id`) REFERENCES `competition_tb` (`id`),
                                    CONSTRAINT `award_tb_ibfk_2` FOREIGN KEY (`schyearsemester_id`) REFERENCES `schyearsemester_tb` (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }
}