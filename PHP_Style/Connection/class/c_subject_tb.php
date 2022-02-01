<?php

class YearSectionData extends multi_functions
{
      protected $db;
      protected $table = "subject_tb";

      protected $sql_t = "CREATE TABLE `subject_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `schyearsemester_id` int(11) NOT NULL,
                                    `title` varchar(255) NOT NULL,
                                    `code` varchar(255) NOT NULL,
                                    `description` text DEFAULT NULL,
                                    `active` int(11) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;";

}
