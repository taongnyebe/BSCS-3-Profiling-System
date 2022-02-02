<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/header_template1.css">'."\n";
      $titleName = "SIMS CS-Org Database";

      include_once './MetaScript/meta.php';

      unset($_SESSION['MainMenu'], $_SESSION['research'], $_SESSION['Class'],
      $_SESSION['Student'], $_SESSION['Subject'], $_SESSION['Activities'],
      $_SESSION['awards'], $_SESSION['seminar'], $_SESSION['competition']);
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