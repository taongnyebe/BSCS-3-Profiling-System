<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/a.css">'."\n";
      $titleName = "SIMS CS-Org - Awards";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['Activities'] = "Awards";

            include './SectionTemplate/header_1.php';

            $title = "Awards";
            $button = 2;
            include './MinorTemplate/back_tab.php';
      ?>

      <section>
            <div class="wrapper-grid-awards container pb-5 mb-5">
                  <?php for ($i=0; $i < 50; $i++) { ?>
                        <div class="card m-3">
                              <a href="" class="btn btn-primary">
                                    <div class="card-body">
                                          <p>
                                                <h3 class="card-title fw-bold" rows="4">Top 10 of NNN</h3>
                                                <h5>"Trick or Codes": Night of the Crackling Beds</h5>
                                                <h4 class="card-title">November 3, 2021</h4>
                                          </p>
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