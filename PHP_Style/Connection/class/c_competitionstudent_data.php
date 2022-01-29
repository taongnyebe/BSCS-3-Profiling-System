<?php

class CompetitionStudent extends multi_functions
{
      protected $db;
      protected $table = "competitionstudent_tb";

      protected $sql_t = "CREATE TABLE `competitionstudent_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `studentschool_id` int(11) NOT NULL,
                                    `competition_id` int(11) NOT NULL,
                                    `active` binary(1) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`),
                                    KEY `studentschool_id` (`studentschool_id`),
                                    KEY `competition_id` (`competition_id`),
                                    CONSTRAINT `competitionstudent_tb_ibfk_1` FOREIGN KEY (`studentschool_id`) REFERENCES `studentschool_tb` (`id`),
                                    CONSTRAINT `competitionstudent_tb_ibfk_2` FOREIGN KEY (`competition_id`) REFERENCES `competition_tb` (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }
}