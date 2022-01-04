<?php

class YearSection
{
      protected $db;

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;
      }

      public function getSchYear()
      {
            if ($connection = mysqli_query($this->db->con, "SELECT DISTINCT sch_year, semester FROM yearsection_tb ORDER BY sch_year DESC, semester DESC "))
            {
                  if (mysqli_num_rows($connection)>0)
                  {
                        $sch_year = array();

                        while($item = mysqli_fetch_array($connection, MYSQLI_ASSOC))
                        {
                              $sch_year[] = $item;
                        }

                        return $sch_year;
                        
                  }else
                        return 1;
            }else
                  return 2;
      }

      public function getSectionData($sch_year, $semester)
      {
            if ($connection = mysqli_query($this->db->con, "SELECT * FROM yearsection_tb WHERE sch_year='{$sch_year}' && semester='$semester'"))
            {
                  if (mysqli_num_rows($connection)>0)
                  {
                        $section_data = array();

                        while($item = mysqli_fetch_array($connection, MYSQLI_ASSOC))
                        {
                              $section_data[] = $item;
                        }
                        return $section_data;
                  }else
                        return 1;
            }else
                  return 2;
      }

      public function getSectionlist()
      {
            if ($connection = mysqli_query($this->db->con, "SELECT * FROM yearsection_tb"))
            {
                  if (mysqli_num_rows($connection)>0)
                  {
                        $section_data = array();

                        while($item = mysqli_fetch_array($connection, MYSQLI_ASSOC))
                        {
                              $section_data[] = $item;
                        }
                        return $section_data;
                  }else
                        return 1;
            }else
                  return 2;
      }
}