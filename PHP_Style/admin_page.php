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
            $_SESSION['MainMenu'] = null;
            $_SESSION['Class'] = null;
            $_SESSION['Student'] = null;
            $_SESSION['Subject'] = null;
            $_SESSION['Activities'] = null;

            include './SectionTemplate/header_1.php';

            $title = "Main Menu";
            $button = 1;
            include './MinorTemplate/back_tab.php'
      ?>

      <section class="choices">
            <div class="wrapper-grid mb-5">
                  <?php 
                        $cardName = array("Year & Section", "Subject", "Research", "Activities");
                        $cardSite = array("./section_page.php", "./subject_page.php", "./research_page.php", "./activities_page.php");
                        $cardIcon = array("./Assets/icons/YEAR_&_SECTION_ICON.png",'./Assets/icons/AWARDS_ICON.png','./Assets/icons/RESEARCH_REPOSITORY_ICON.png','./Assets/icons/SPORT_ICON.png');
                        for ($i=0; $i < count($cardName); $i++) { 
                  ?>
                        <div class="card m-3 btn btn-primary">
                              <br>
                              <a href="<?php echo $cardSite[$i] ?>" >
                                    <img src='<?php echo $cardIcon[$i] ?>' alt='profile image' class="bg-dark rounded">
                                    <div class="card-body">
                                          <h1 class="card-title"><?php echo $cardName[$i] ?></h1>
                                          <br>
                                          <br>
                                          <br>
                                    </div>
                              </a>
                        </div>
                  <?php }?>
            </div>
      </section>

      <?php 
            include './SectionTemplate/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>