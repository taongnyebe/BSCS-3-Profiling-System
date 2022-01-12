<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="../CSS/header_template1.css">'."\n"
            .'<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />'."\n"
            .'<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>'."\n"
            .'<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>';
      $titleName = "SIMS CS-Org - Admin";

      include_once './MetaScript/meta.php';
?>

<body>

      <?php 
            $_SESSION['Edit'] = ($_GET['use'] == "Add")? null : "1";
            $_SESSION['Student'] = "1";

            include './templates/header_2.php';

            $title = $_GET['use']." Student";

            $add = "";
            $edit = "";
            $add_btn = $edit_btn = $search_input = $delete_btn = false;
            
            $id = $student_data = null;
            
            if ($_GET['use'] == "Update"){
                  $id = $_SESSION['student_id'];
                  $student_data = $sd->getStudentData($id);

                  if($student_data != 1 && $student_data != 2)
                  {
                        foreach ($student_data as $student_data) {
                              include './templates/back_tab.php';
                              include './templates/profile_card_form_update.php';
                        }
                  }
            }else{
                  include './templates/back_tab.php';
                  include './templates/profile_card_form_update.php';
            }


            include './templates/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>