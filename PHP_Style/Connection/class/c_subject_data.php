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
                                    `active` int(11) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`),
                                    KEY `schyearsemester_id` (`schyearsemester_id`),
                                    CONSTRAINT `subject_tb_ibfk_1` FOREIGN KEY (`schyearsemester_id`) REFERENCES `schyearsemester_tb` (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if (!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }

      public function getSubjectCard_YearSemester($schsem_id)
      {
            $sql_c = "SELECT id, title, code FROM $this->table
                              WHERE schyearsemester_id='$schsem_id' AND active=1
                              ORDER BY code";
            return $this->checker($sql_c);
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