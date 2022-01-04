<?php 
      include_once '../Connection/caller.php';
      include_once '../MetaScript/_url.php';

      if (isset($_POST['submit'])){
            switch ($login->getUserPassword($_POST['username'],$_POST['password']))
            {
            case 0:
                  $_SESSION['login']= "<p class='success'>Login Successfully</p>";
                  $_SESSION['user'] = $_POST['username'];

                  header("Location:".$adminurl."admin_page.php");
                  break;
            case 1:
                  $_SESSION['error'] = "<p class='error'>Wrong Password</p>";
                  header("Location:".$homeurl."/login_page.php");
                  break;
            case 2:
                  $_SESSION['error'] = "<p class='error'>User Not Registered</p>";
                  header("Location:".$homeurl."/login_page.php");
                  break;
                  case 502:
                  $_SESSION['error'] = "<p class='error'>Connection Error</p>";
                  header("Location:".$homeurl."/login_page.php");
                  break;
            default:
                  error_log(print_r("Error", TRUE)); 
                  break;
            }
      }