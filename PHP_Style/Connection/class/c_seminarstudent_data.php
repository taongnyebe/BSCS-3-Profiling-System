<?php

class SeminarStudent extends multi_functions
{
      protected $db;
      protected $table = "seminarstudent_tb";

      protected $sql_t = "CREATE TABLE `seminarstudent_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `studentschool_id` int(11) NOT NULL,
                                    `seminar_id` int(11) NOT NULL,
                                    `active` binary(1) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`),
                                    KEY `studentschool_id` (`studentschool_id`),
                                    KEY `seminar_id` (`seminar_id`),
                                    CONSTRAINT `seminarstudent_tb_ibfk_1` FOREIGN KEY (`studentschool_id`) REFERENCES `studentschool_tb` (`id`),
                                    CONSTRAINT `seminarstudent_tb_ibfk_2` FOREIGN KEY (`seminar_id`) REFERENCES `seminar_tb` (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }
}