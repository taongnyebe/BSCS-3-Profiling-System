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
            $sql_c = "UPDATE $table SET active=0 
                        WHERE id=$id";
            $result = array();
      
            $result[0] = mysqli_query($this->db->con, $sql_c);
            $result[1] = $this->fileUnlink($filename);
      
            return $result;

      }

      private function fileUnlink($image_name)
      {
            return unlink("../../Assets/profiles/".$image_name);
      }
}