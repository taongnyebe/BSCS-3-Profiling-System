<?php

class Seminar extends multi_functions
{
      protected $db;
      protected $table = "awardstudent_tb";

      protected $sql_t = "CREATE TABLE `awardstudent_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `award_id` int(11) NOT NULL,
                                    `studentschool_id` int(11) NOT NULL,
                                    `active` binary(1) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`),
                                    KEY `award_id` (`award_id`),
                                    KEY `studentschool_id` (`studentschool_id`),
                                    CONSTRAINT `awardstudent_tb_ibfk_1` FOREIGN KEY (`award_id`) REFERENCES `award_tb` (`id`),
                                    CONSTRAINT `awardstudent_tb_ibfk_2` FOREIGN KEY (`studentschool_id`) REFERENCES `studentschool_tb` (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }
}