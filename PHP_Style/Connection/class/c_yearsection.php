<?php

class YearSectionData
{
      protected $db;
      private $table = "yearsection_tb";

      public function __construct(Connection $db)
      {
            if (!isset($db->con)) return null;
            $this->db = $db;
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

      private function checker($sql_c)
      {
            if ($connection = mysqli_query($this->db->con, $sql_c)) {
                  if(mysqli_num_rows($connection)>0) {
                        $studentData = array();

                        while ($item = mysqli_fetch_array($connection, MYSQLI_ASSOC)) {
                              $studentData[]=$item;
                        }

                        return $studentData;
                  } else
                        return 1;
            } else
                  return 2;
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