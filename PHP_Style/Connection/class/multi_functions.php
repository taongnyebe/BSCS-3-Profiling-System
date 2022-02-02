<?php 

class multi_functions
{
      protected function tablechecker()
      {
            if ($result = mysqli_query($this->db->con, "SHOW TABLES LIKE '".$this->table."'")) 
            {
                  if($result->num_rows == 1) 
                  {
                        return true;
                  }
                  else 
                  {
                        mysqli_query($this->db->con, $this->sql_t);
                        if (isset($this->sql_i)) mysqli_query($this->db->con, $this->sql_i);
      
                        if ($result = mysqli_query($this->db->con, "SHOW TABLES LIKE '".$this->table."'")) 
                        {
                              if($result->num_rows == 1) 
                              {
                                    return true;
                              }
                        }
                        else
                        {
                              return false;
                        }
                  }
            }
      }

      protected function checker($sql_c)
      {
            if ($connection = mysqli_query($this->db->con, $sql_c)) {
                  if (mysqli_num_rows($connection)>0) {
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

      protected function singlechecker($sql_c)
      {
            if ($connection = mysqli_query($this->db->con, $sql_c)) {
                  if (mysqli_num_rows($connection)>0) {
                        while ($item = mysqli_fetch_assoc($connection)) {
                              return $item;
                        }

                  } else
                        return 1;
            } else
                  return 2;
      }
}