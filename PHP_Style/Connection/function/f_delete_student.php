<?php
      require '../caller.php';

      switch ($_GET["type"]) {
            case 'Student':
                  $d->deactivation($_SESSION['table1_delete'], $_SESSION['student_id'], $_SESSION['filename']);

                  unset($_SESSION['student_id'], $_SESSION['student_Sid'], 
                        $_SESSION['table1_delete'], $_SESSION['table2_delete'],
                        $_SESSION['filename']);
                  
                  header("location:http://localhost/PHP-Codes/BSCS-3-Profiling-System/PHP_Style/p_admin/a_s_class_page.php");
                  break;
                  
            case 'Section':
                  $data = $ssd->countStudentSectionYear($_SESSION['section_id']);
                  
                  if ($data['count'] == 0) {
                        echo $_SESSION['section_delete_warning'] = "<h1> Can't Delete Section <br> Must Move or Delete Student Data First</h1>";
                        header("location:http://localhost/PHP-Codes/BSCS-3-Profiling-System/PHP_Style/p_admin/a_s_class_page.php");
                  } else {
                        $d->deactivation('yearsection_tb', $_SESSION['section_id']);
                        header("location:http://localhost/PHP-Codes/BSCS-3-Profiling-System/PHP_Style/p_admin/a_section_page.php");
                  }

                  break;
      }




      die();