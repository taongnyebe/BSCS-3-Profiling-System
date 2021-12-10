<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/cardcss.css">'."\n";
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

      <section class="cardscss my-5">
            <div class="d-grid b-5 w-100">
                  <div id="app" class="container-fluid text-center">
                        <?php 
                              $cardName = array("Year &<br> Section", "Subject", "Research", "Activities");
                              $cardSite = array("./section_page.php", "./subject_page.php", "./research_page.php", "./activities_page.php");
                              $cardIcon = array("https://thumbs.dreamstime.com/b/pastel-orange-yellow-blurred-gradient-minimal-background-pastel-orange-yellow-blurred-blurred-gradient-minimal-background-abstract-133270470.jpg",
                                                'https://static.vecteezy.com/system/resources/previews/002/201/938/non_2x/pastel-yellow-blue-green-watercolor-background-free-vector.jpg',
                                                'https://wallpapercave.com/wp/wp3204056.jpg',
                                                'https://w0.peakpx.com/wallpaper/46/414/HD-wallpaper-watercolor-fade.jpg');
                              $content = array("Collection of Friendly and Very Good Estudakes!",
                                                "Very Good Tool For Breaking Students Mind",
                                                "Student Knowledge From K1 To College",
                                                "A Place Where You Can Flex Your EGO");
                              for ($i=0; $i < count($cardName); $i++) { 
                        ?>
                              <a href="<?php echo $cardSite[$i] ?>" class="border btn text-center rounded m-3 p-0">
                                    <card data-image='<?php echo $cardIcon[$i] ?>' alt='profile image' class="m-0">
                                          <h2 slot="header" class="fs-1 text-dark cardshadow-h2"><?php echo $cardName[$i] ?></h2>
                                          <p slot="content" class="text-dark"><?php echo $content[$i] ?></p>
                                    </card>
                              </a>
                        <?php }?>
                  </div>
            </div>
      </section>

      <?php 
            include './SectionTemplate/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>