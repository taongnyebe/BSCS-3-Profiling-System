<?php

class Subject extends multi_functions
{
      protected $table = 'subject_tb';
      protected $db;

      protected $sql_t = "CREATE TABLE `subject_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `schyearsemester_id` int(11) NOT NULL,
                                    `title` varchar(255) NOT NULL,
                                    `code` varchar(255) NOT NULL,
                                    `description` text DEFAULT NULL,
                                    `active` binary(1) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`),
                                    KEY `schyearsemester_id` (`schyearsemester_id`),
                                    CONSTRAINT `subject_tb_ibfk_1` FOREIGN KEY (`schyearsemester_id`) REFERENCES `schyearsemester_tb` (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if (!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }

      public function getSubjectCardData()
      {
            $sql_c="SELECT * FROM subject_tb";
            return $this->checker($sql_c);
      }

      public function getSubjectCardDataSpecific($id)
      {
            $sql_c="SELECT * FROM subject_tb WHERE id=$id";
            return $this->singlechecker($sql_c);
      }

      public function getSubjectTitles()
      {
            $sql_c="SELECT title, code, id FROM subject_tb";
            return $this->checker($sql_c);
      }
}