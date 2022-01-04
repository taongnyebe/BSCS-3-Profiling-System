<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/a.css">'."\n";
      $titleName = "SIMS CS-Org - Webinars";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $id = $_GET["id"];
            $userdata=mysqli_fetch_assoc(mysqli_query($db->con,"SELECT * FROM subject_tb WHERE id='$id'"));
            
            $_SESSION['Subject'] = $userdata['code'].' - '.$userdata['name'] ;
            include './SectionTemplate/header_2.php';

            $title = $_SESSION['Subject'];
            $button = 1;
            include './MinorTemplate/back_tab.php';
      ?>

      
      <?php
            include './SectionTemplate/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>     