<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n";
      $titleName = "SIMS CS-Org Database";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            include './SectionTemplate/header_1.php';

            include './MinorTemplate/search_tab.php';

            include './MinorTemplate/welcome_menu.php';

            include './SectionTemplate/news_section.php';

            include './SectionTemplate/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>