<?php

class ResearchStudent extends multi_functions
{
      protected $db;
      protected $table = "research_tb";

      protected $sql_t = "CREATE TABLE `research_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `title` varchar(255) NOT NULL,
                                    `abstract` longtext DEFAULT NULL,
                                    `word_filename` varchar(255) DEFAULT NULL,
                                    `profile_filename` varchar(255) DEFAULT NULL,
                                    `publish_date` date NOT NULL,
                                    `active` int(11) NOT NULL DEFAULT 1,
                                    PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }
}