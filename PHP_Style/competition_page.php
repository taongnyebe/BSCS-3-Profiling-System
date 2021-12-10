<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/cardcss.css">'."\n";
      $titleName = "SIMS CS-Org - Competition";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['Activities'] = "Competition";
      
            include './SectionTemplate/header_2.php';

            include './MinorTemplate/search_tab.php';

            $title = "Competitions";
            $button = 2;
            include './MinorTemplate/back_tab.php';
      ?>

      <section class="cardscss"> &emsp;
            <div class="mb-5 text-center">
                  <div id="app" class="container-fluid">
                        <?php for ($i=0; $i < 50; $i++) { ?>
                              <a href="" class="border btn rounded m-3 p-0">
                                    <card data-image="" class="m-0">
                                          <h2 slot="header" class="fw-bold pop float-start pb-2 fs-2 cardshadow-h2">Tikol Sensation</h2><br>
                                          <p slot="content" class="cardblack">
                                                "Trick or Codes": <br>
                                                Night of the Crackling Beds <br>
                                                <small>November 3, 2021</small>
                                          </p>
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