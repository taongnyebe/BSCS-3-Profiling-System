<?php
      
class Delete
{
      protected $db;

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;
      }

      public function delete($table, $id, $filename = null)
      {
            $sql_c = "DELETE FROM $table 
                        WHERE id=$id";
            $result = array();

            $result[0] = mysqli_query($this->db->con, $sql_c);
            if(isset($filename)) $result[1] = $this->fileUnlink($filename);

            return $result;
            
      }
      
      public function deactivation($table, $id, $filename = null)
      {
            $result = null;
            if(isset($filename)) 
            {
                  $sql_c = "UPDATE $table SET active=0, profile_filename=''
                  WHERE id=$id";
                  $result = array();

                  $result = mysqli_query($this->db->con, $sql_c);
                  $this->fileUnlink($filename);
            } else {
                  $sql_c = "UPDATE $table SET active=0
                  WHERE id=$id";
                  $result = array();

                  $result = mysqli_query($this->db->con, $sql_c);

            }
            return $result;

      }

      private function fileUnlink($image_name)
      {
            return unlink("../../Assets/profiles/".$image_name);
      }
}