<?php

class Subject extends multi_functions
{
      protected $table = 'subject_tb';
      protected $db;

      protected $sql_t = "CREATE TABLE `subject_tb` (
                                    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                                    `title` varchar(255) NOT NULL,
                                    `code` varchar(255) NOT NULL,
                                    `description` text DEFAULT NULL,
                                    PRIMARY KEY (`id`)
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