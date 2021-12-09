<?php
      include_once '../php-constant/MainHandler.php';

      $username = $_POST["username"];
      $password = $_POST["password"];

      $namecheck = mysqli_fetch_assoc(mysqli_query($db->con, "SELECT * FROM user_tb WHERE username='$username';")) or die ("0");

      if ($namecheck == 0) {
            echo '1';
      }

      if ($namecheck["password"] != $password)
      {
            echo '2';
      }
      else
      {
            echo '0'."\t";
            echo $namecheck['admin'];
      }
?>
