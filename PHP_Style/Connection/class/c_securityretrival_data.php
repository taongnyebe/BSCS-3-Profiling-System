<?php

class SecurityRetrival extends multi_functions
{
      protected $db;
      protected $table = "securityretrival_tb";

      protected $sql_t = "CREATE TABLE `securityretrival_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `user_id` int(11) DEFAULT NULL,
                                    `question` varchar(255) DEFAULT NULL,
                                    `answer` varchar(255) DEFAULT NULL,
                                    `active` binary(1) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`),
                                    KEY `user_id` (`user_id`),
                                    CONSTRAINT `securityretrival_tb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_tb` (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }
}