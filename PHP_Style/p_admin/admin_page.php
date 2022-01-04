<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="../CSS/header_template1.css">'."\n"
            .'<link rel="stylesheet" href="../CSS/cardcss.css">'."\n";
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

            include './templates/header_1.php';

            $title = "Main Menu";
            $add = "";
            $edit = "";
            $add_btn = $edit_btn = $search_input = $delete_btn = false;
            include './templates/back_tab.php'
      ?>

      <section class="cardscss my-5">
            <div class="d-grid b-5 w-100">
                  <div id="app" class="container-fluid text-center">
                        <?php 
                              $cardName = array("Year &<br> Section", "Subject", "Research", "Activities");
                              $cardSite = array("./a_section_page.php", "./a_subject_page.php", "./research_page.php", "./activities_page.php");
                              $cardIcon = array("../Assets/icons/section_icon.png",
                                                '../Assets/icons/subject_icon.png',
                                                '../Assets/icons/research_icon.png',
                                                '../Assets/icons/activities_icon.png');
                              $content = array("Collection of Friendly and Very Good Estudakes!",
                                                "Very Good Tool For Breaking Students Mind",
                                                "Student Knowledge From K1 To College",
                                                "A Place Where You Can Flex Your EGO");
                              for ($i=0; $i < count($cardName); $i++) { 
                        ?>
                              <a href="<?php echo $cardSite[$i] ?>" class="border btn text-center rounded m-3 p-0">
                                    <card data-image='<?php echo $cardIcon[$i] ?>' alt='profile image' class="m-0">
                                          <h2 slot="header" class="fs-1 cardshadow-h2"><?php echo $cardName[$i] ?></h2>
                                          <p slot="content"><?php echo $content[$i] ?></p>
                                    </card>
                              </a>
                        <?php }?>
                  </div>
            </div>
      </section>

      <?php 
            include './templates/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>