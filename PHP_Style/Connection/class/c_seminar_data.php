<?php

class Seminar extends multi_functions
{
      protected $db;
      protected $table = "seminar_tb";

      protected $sql_t = "CREATE TABLE `seminar_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `title` varchar(255) NOT NULL,
                                    `host` varchar(255) DEFAULT NULL,
                                    `description` varchar(255) DEFAULT NULL,
                                    `active` int(11) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }
}