<?php

class YearSectionData extends multi_functions
{
      protected $db;
      protected $table = "yearsection_tb";

      protected $sql_t = "CREATE TABLE `yearsection_tb` (
                                    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                                    `year` int(11) NOT NULL,
                                    `section` int(11) NOT NULL,
                                    `semester` varchar(255) NOT NULL,
                                    `sch_year` varchar(255) NOT NULL,
                                    `active` binary(1) NOT NULL DEFAULT '1',
                                    PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      public function __construct(Connection $db)
      {
            if (!isset($db->con)) return null;
            $this->db = $db;

            $this->tablechecker();
      }

      public function getSchYear()
      {
            return $this->checker("SELECT DISTINCT sch_year, semester FROM $this->table 
                                    WHERE active=1
                                    ORDER BY sch_year DESC, semester DESC ");
      }

      public function getSectionData($sch_year, $semester)
      {
            return $this->checker("SELECT * FROM $this->table 
                                    WHERE sch_year='$sch_year' AND semester='$semester' AND active=1
                                    ORDER BY year, section");
      }

      public function getSectionlist()
      {
            return $this->checker("SELECT * FROM $this->table");
      }
      
      public function getSectionlistYear($sch_year, $sem, $year)
      {
            return $this->checker("SELECT * FROM $this->table WHERE sch_year='$sch_year' AND semester='$sem' AND year=$year");
      }
      
      public function getYearSectionlist($sch_year)
      {
            return $this->checker("SELECT * FROM $this->table WHERE sch_year='$sch_year' ORDER BY semester, section");
      }

      public function getSchoolYearlist()
      {
            return $this->checker("SELECT DISTINCT(sch_year) FROM $this->table ORDER BY semester, section");
      }

      public function getStudentYearSection($yearsection_id)
      {
            return $this->checker("SELECT * FROM $this->table 
                                    WHERE id='$yearsection_id'");
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