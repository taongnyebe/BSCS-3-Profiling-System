<?php

class Research extends multi_functions
{
      protected $db;
      protected $table = "research_tb";

      protected $sql_t = "CREATE TABLE `researchstudent_tb` (
                                    `id` int(11) NOT NULL,
                                    `research_id` int(11) DEFAULT NULL,
                                    `studentschool_id` int(11) DEFAULT NULL,
                                    `active` int(11) NOT NULL DEFAULT 1,
                                    PRIMARY KEY (`id`),
                                    KEY `studentschool_id` (`studentschool_id`),
                                    KEY `research_id` (`research_id`),
                                    CONSTRAINT `researchstudent_tb_ibfk_2` FOREIGN KEY (`studentschool_id`) REFERENCES `studentschool_tb` (`id`),
                                    CONSTRAINT `researchstudent_tb_ibfk_3` FOREIGN KEY (`research_id`) REFERENCES `research_tb` (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }

      public function getSpecificResearch($id)
      {
            $sql_c = "SELECT * FROM $this->table WHERE id='$id'";
            return $this->singlechecker($sql_c);
      }
}