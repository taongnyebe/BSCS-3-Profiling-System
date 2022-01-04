<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/header_template1.css">'."\n";
      $titleName = "SIMS CS-Org Database";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            include './templates/header_1.php';

            include './templates/welcome_menu.php';

            include './templates/news_section.php';

            include './templates/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>