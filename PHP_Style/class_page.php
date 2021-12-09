<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/a.css">'."\n";
      $titleName = "SIMS CS-Org - Class";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['Class'] = $_GET['title'];

            $_SESSION['Student'] = null;
            
            include './SectionTemplate/header_1.php';

            include './MinorTemplate/search_tab.php';

            $title = $_GET['title'];
            $button = 3;
            include './MinorTemplate/back_tab.php'
      ?>

      <section>
            <div class="wrapper-grid pb-5 mb-5">
                  <?php for ($i=0; $i < 50; $i++) { ?>
                        <div class="card m-3">
                              <a href="./studentInfo_page.php" class="btn btn-primary">
                                    <div class="card-body">
                                          <h4 class="card-title">Aspiras, Carlo</h4>
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