<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="../CSS/header_template1.css">';
      $titleName = "SIMS CS-Org - Admin";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['Student'] = "1";

            $_SESSION['Edit'] = null;
            $_SESSION['image'] = null;
            $_SESSION['image_name'] = null;
            $_SESSION['return'] = null;

            include './templates/header_2.php';
            
            $id = $_GET['id'];

            $title = "Student Informations";
            
            $add = "";
            $edit = "./a_s_c_studentInfo_page_update_add.php?use=Update";
            $datatypeDelete = 'Student';
            $add_btn = $search_input = false; $edit_btn = $delete_btn = true;
            include './templates/back_tab.php';

            include './templates/profile_card.php';

            include './templates/footer.php';

            include_once './MetaScript/script.php';
      ?>

</body>
</html>