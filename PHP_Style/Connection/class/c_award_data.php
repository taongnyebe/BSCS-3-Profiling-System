<?php

class Award extends multi_functions
{
      protected $db;
      protected $table = "awardstudent_tb";

      protected $sql_t = "CREATE TABLE `award_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `competition_id` int(11) NOT NULL,
                                    `title` varchar(255) DEFAULT NULL,
                                    `description` text DEFAULT NULL,
                                    `active` binary(1) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`),
                                    KEY `competition_id` (`competition_id`),
                                    CONSTRAINT `award_tb_ibfk_1` FOREIGN KEY (`competition_id`) REFERENCES `competition_tb` (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }
}