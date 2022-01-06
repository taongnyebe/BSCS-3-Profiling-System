<?php
      require '../caller.php';

      $a = $d->delete($_SESSION['table1_delete'], $_SESSION['student_id'], $_SESSION['filename']);
      echo ($a[0])? "true":"false"." ".(($a[1])? "true":"false");
      echo "<br>";
      $a = $d->delete($_SESSION['table2_delete'], $_SESSION['student_Sid']);
      echo ($a[0])? "true":"false"." ".(($a[1])? "true":"false");

      unset($_SESSION['student_id'], $_SESSION['student_Sid'], 
            $_SESSION['table1_delete'], $_SESSION['table2_delete'],
            $_SESSION['filename']);

      header("location:http://localhost/PHP-Codes/BSCS-3-Profiling-System/PHP_Style/".$returnTo);

      die();