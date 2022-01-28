<?php

class YearSectionData extends multi_functions
{
      protected $db;
      protected $table = "yearsection_tb";

      protected $sql_t = "CREATE TABLE `yearsection_tb` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `schyearsemester_id` int(11) NOT NULL,
                                    `year` int(11) NOT NULL,
                                    `section` int(11) NOT NULL,
                                    `filename` varchar(255) DEFAULT NULL,
                                    `active` binary(1) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`),
                                    KEY `schyearsemester_id` (`schyearsemester_id`),
                                    CONSTRAINT `yearsection_tb_ibfk_1` FOREIGN KEY (`schyearsemester_id`) REFERENCES `schyearsemester_tb` (`id`)
                              ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if (!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }
      
      public function getAllYearSectionData()
      {
            $sql_c = "SELECT * FROM $this->table";
            return $this->checker($sql_c);
      }

      public function getAllSchYear()
      {
            $sql_c = "SELECT DISTINCT sch_year, semester FROM $this->table 
                                    WHERE active=1
                                    ORDER BY sch_year DESC, semester DESC ";
            return $this->checker($sql_c);
      }

      public function getSpecificSchYearData($id)
      {
            $sql_c = "SELECT * FROM $this->table 
                        WHERE id=$id";
            return $this->singlechecker($sql_c);
      }

      public function getSectioninYearSemester($sch_year, $semester)
      {
            $sql_c = "SELECT * FROM $this->table 
                                    WHERE sch_year='$sch_year' AND semester='$semester' AND active=1
                                    ORDER BY year, section";
            return $this->checker($sql_c);
      }

      
      public function getSectionYearSenesterSchYear($sch_year, $sem, $year)
      {
            $sql_c = "SELECT * FROM $this->table 
                        WHERE sch_year='$sch_year' AND semester='$sem' AND year=$year AND active=1";
            return $this->checker($sql_c);
      }
      
      public function getYearSectionlist($sch_year)
      {
            $sql_c = "SELECT * FROM $this->table 
                        WHERE sch_year='$sch_year' 
                        ORDER BY semester, section";
            return $this->checker($sql_c);
      }

      public function getSchoolYearlist()
      {
            $sql_c = "SELECT DISTINCT(sch_year) FROM $this->table 
                        ORDER BY semester, section";
            return $this->checker($sql_c);
      }

      public function getStudentYearSection($yearsection_id)
      {
            $sql_c = "SELECT * FROM $this->table 
                        WHERE id='$yearsection_id'";
            return $this->checker($sql_c);
      }

      public function setYearSection($year, $section, $sch_year, $semester, $id)
      {
            if ($id != "") {
                  $sql_c = "UPDATE $this->table
                              SET year='$year', section='$section', sch_year='$sch_year',
                              semester='$semester'
                              WHERE id=$id";
                  return mysqli_query($this->db->con, $sql_c);
            } else {
                  $sql_c = "INSERT INTO $this->table
                              SET year='$year', section='$section', sch_year='$sch_year',
                              semester='$semester'";
                  return mysqli_query($this->db->con, $sql_c);
            }
      }
}