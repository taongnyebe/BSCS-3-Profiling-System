<?php
      include_once '../php-constant/MainHandler.php';

      $username = $_POST["username"];
      $password = $_POST["password"];
      $admin = $_POST["admin"];

      $namecheck = mysqli_query($db->con, "SELECT username FROM user_tb WHERE username='$username'") or die ("");

      if(mysqli_num_rows($namecheck) > 0)
      {
            // name already exist
            echo "1";
            exit();
      }

      $sql_q = "INSERT INTO user_tb (username, password, admin) VALUES ($username, $password, $admin);";
      if (!mysqli_query($db->con, $sql_q))
      {
            // failed query
            echo "2";
      }

      echo "0";
?>