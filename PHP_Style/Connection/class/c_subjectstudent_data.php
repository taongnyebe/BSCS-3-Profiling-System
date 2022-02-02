<?php

class SubjectStudent extends multi_functions
{
      protected $table = 'subjectstudent_tb';
      protected $db;

      protected $sql_t = "CREATE TABLE `subjectstudent_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `studentschool_id` int(11) NOT NULL,
                                    `subject_id` int(11) NOT NULL,
                                    `active` int(11) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`),
                                    KEY `studentschool_id` (`studentschool_id`),
                                    KEY `subject_id` (`subject_id`),
                                    CONSTRAINT `subjectstudent_tb_ibfk_1` FOREIGN KEY (`studentschool_id`) REFERENCES `studentschool_tb` (`id`),
                                    CONSTRAINT `subjectstudent_tb_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject_tb` (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if (!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }

}