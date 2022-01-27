<?php
      require '../caller.php';

      switch ($_GET["type"]) {
            case 'Student':
                  $d->deactivation($_SESSION['table1_delete'], $_SESSION['student_id'], $_SESSION['filename']);

                  unset($_SESSION['student_id'], $_SESSION['student_Sid'], 
                        $_SESSION['table1_delete'], $_SESSION['table2_delete'],
                        $_SESSION['filename']);
                  
                  echo $address = $homeurl."/p_admin/a_s_class_page.php";
                  echo "<script type='text/javascript'>document.location.href='{$address}';</script>";
                  echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $address . '">';
                  break;
                  
            case 'Section':
                  $data = $ssd->countStudentSectionYear($_SESSION['section_id']);
                  
                  if ($data['student_count'] != 0) {
                        echo $_SESSION['section_delete_warning'] = "<h1> Can't Delete Section <br> Must Move or Delete Student Data First</h1>";

                        echo $address = $homeurl."/p_admin/a_s_class_page.php";
                        echo "<script type='text/javascript'>document.location.href='{$address}';</script>";
                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $address . '">';
                  } else {
                        $d->deactivation('yearsection_tb', $_SESSION['section_id']);

                        echo $address = $homeurl."/p_admin/a_section_page.php";
                        echo "<script type='text/javascript'>document.location.href='{$address}';</script>";
                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $address . '">';
                  }

                  break;
      }




      die();