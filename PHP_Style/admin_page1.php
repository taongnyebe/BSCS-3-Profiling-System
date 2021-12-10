<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/cardcss.css">'."\n";
      $titleName = "SIMS CS-Org - Class";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['Class'] = "test";

            $_SESSION['Student'] = null;
            
            include './SectionTemplate/header_1.php';

            include './MinorTemplate/search_tab.php';

            $title = "test";
            $button = 3;
            include './MinorTemplate/back_tab.php'
      ?>

      <section class="cardscss">
            <div class=" pb-5 mb-5">
                  <div id="app" class="container-fluid text-center">
                        <?php for ($i=0; $i < 50; $i++) { ?>
                                    <a href="./studentInfo_page.php" class="border btn text-center rounded m-3 p-0">
                                          <card data-image="./Assets/news/news3.jpg" class="m-0">
                                                <h2 slot="header" class="fs-1 text-dark">Carlo Aspiras</h2>
                                                <p slot="content">19-2100</p>
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