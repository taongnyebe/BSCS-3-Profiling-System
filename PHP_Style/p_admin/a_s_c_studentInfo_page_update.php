<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="../CSS/header_template1.css">';
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
            
            $id = null;
            $id = ($_GET['use'] == "Update")? $_GET['id'] : 0;
            
            $student_data = $sd->getFullStudentData($id);

            if($student_data != 1 && $student_data != 2)
                  {
                        foreach ($student_data as $student_data) {
                              include './templates/back_tab.php';
                              include './templates/profile_card.php';
                        }
                  }else{
                        include './templates/back_tab.php';
                        include './templates/profile_card.php';
                  }
            include './templates/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>