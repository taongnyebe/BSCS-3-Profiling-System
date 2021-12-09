<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/a.css">'."\n";
      $titleName = "SIMS CS-Org - Activities";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['MainMenu'] = "activities";

            $_SESSION['Activities'] = null;

            include './SectionTemplate/header_1.php';

            $title = "Activities";
            $button = 2;
            include './MinorTemplate/back_tab.php';
      ?>
      <section class="choices">
            <div class="wrapper-grid mb-5">
                  <?php 
                        $cardName = array("Awards", "Webinars", "Competition");
                        $cardSite = array("./awards_page.php", "./webinar_page.php", "./competition_page.php");
                        $cardIcon = array("./Assets/icons/AWARDS_ICON.png",'./Assets/icons/CERTIFICATE_ICON.png','./Assets/icons/TROPHY_ICON.png','');
                        for ($i=0; $i < count($cardName); $i++) { 
                  ?>
                        <div class="card m-3 btn btn-primary">
                              <br>
                              <a href="<?php echo $cardSite[$i] ?>" >
                                    <div class='banner-img'></div>
                                    <img src='<?php echo $cardIcon[$i]?>' alt='profile image' class="bg-dark rounded">
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