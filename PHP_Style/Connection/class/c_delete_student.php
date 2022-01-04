<?php
      
class delete
{
      protected $db;

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;
      }
}
      session_start();

      require './connection.php';

      $db = new Connection();

      $id1 = $_SESSION['id1_delete'];
      $id2 = $_SESSION['id2_delete'];
      $table1 = $_SESSION['table1_delete'];
      $table2 = $_SESSION['table2_delete'];
      $returnTo = $_SESSION['return'];

      // Need to create UI for delet confirmation

      $sql1="DELETE FROM $table1 WHERE id=$id1";
      $sql2="DELETE FROM $table2 WHERE id=$id2";

      if(($image_name = $_SESSION['image_name']) != '')
      {
            $remove_img = unlink("../Assets/profiles/".$image_name);
            if(!$remove_img)
            {
                  $_SESSION['profile_upload']="<div class='error'>Fail to delete</div>";
                  
            }
      }

      (mysqli_query($db->con, $sql1));
      (mysqli_query($db->con, $sql2));


      header("location:http://localhost/PHP-Codes/BSCS-3-Profiling-System/PHP_Style/".$returnTo);

      die();
?>