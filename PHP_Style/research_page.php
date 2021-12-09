<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/a.css">'."\n";
      $titleName = "SIMS CS-Org - Research";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['MainMenu'] = "research";

            include './SectionTemplate/header_1.php';

            $title = "Researches";
            $button = 2;
            include './MinorTemplate/back_tab.php';
      ?>

      <section>
            <div class="wrapper-grid-research container-fluid pb-5 mb-5">
                  <?php for ($i=0; $i < 50; $i++) { ?>
                        <div class="card m-3">
                              <a href="" class="btn btn-primary">
                                    <div class="card-body">
                                          <p>
                                                <h3 class="card-title fw-bold" rows="4">Equity Risk Premium Puzzle and Investors' Behavioral Analysis: A Theoretical and Empirical Explanation from the Stock Markets in the U.S. & China</h3>
                                                <h4 class="card-title">March 3, 2021</h4>
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