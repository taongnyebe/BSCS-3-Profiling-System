<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/a.css">'."\n";
      $titleName = "SIMS CS-Org - Subjects";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['MainMenu'] = "Subject";

            $_SESSION['Subject'] = null;

            include './SectionTemplate/header_1.php';

            include './MinorTemplate/search_tab.php';

            $title = "Subject List";
            $button = 2;
            include './MinorTemplate/back_tab.php';
      ?>

      <section>
            <div class="wrapper-grid-subject container-fluid pb-5 mb-5">
                  <?php for ($i=0; $i < 20; $i++) { ?>
                        <div class="card m-3">
                              <a href="./subjectInfo_page.php?title=Assurance and information Security - CS 313A" class="btn btn-primary">
                                    <div class="card-body">
                                          <p>
                                                <h3 class="card-title">CS 313A</h3> &emsp;
                                                <h4 class="card-title">Assurance and information Security</h4>
                                          </p>
                                    </div>
                              </a>
                        </div>
                        <div class="card m-3">
                              <a href="./subjectInfo_page.php?title=Theory and Automata - CS 311A" class="btn btn-primary">
                                    <div class="card-body">
                                          <p>
                                                <h3 class="card-title">CS 311A</h3> &emsp;
                                                <h4 class="card-title">Theory and Automata</h4>
                                          </p>
                                    </div>
                              </a>
                        </div>
                        <div class="card m-3">
                              <a href="./subjectInfo_page.php?title=Diko Sure - CS 312A" class="btn btn-primary">
                                    <div class="card-body">
                                          <p>
                                                <h3 class="card-title">CS 312A</h3> &emsp;
                                                <h4 class="card-title">Diko Sure</h4>
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