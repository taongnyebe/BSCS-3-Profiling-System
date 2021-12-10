<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/a.css">'."\n";
      $titleName = "SIMS CS-Org - Admin";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['Student'] = "1";

            include './SectionTemplate/header_2.php';

            $title = $_GET['name'];
            $subtitle = $_GET['id']." : ".$_GET['section'];
            $button = 4;
            include './MinorTemplate/back_tab.php'
      ?>

      
      <?php 
            include './SectionTemplate/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>