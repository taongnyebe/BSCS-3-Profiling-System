<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/cardcss.css">'."\n";
      $titleName = "SIMS CS-Org - Subjects";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['MainMenu'] = "Subject";

            $_SESSION['Subject'] = null;

            include './SectionTemplate/header_2.php';

            include './MinorTemplate/search_tab.php';

            $title = "Subject List";
            $button = 2;
            include './MinorTemplate/back_tab.php';
      ?>

      <section class="cardscss">
            <div class=" pb-5 mb-5">
                  <div id="app" class="container-fluid text-center">
                        <?php for ($i=0; $i < 20; $i++) { ?>
                              <a href="./subjectInfo_page.php?title=Assurance and information Security - CS 313A" class="border btn text-center rounded m-3 p-0">
                                    <card data-image="https://thumbs.dreamstime.com/z/data-mining-concept-round-colorful-linear-vector-illustration-technology-modern-dark-background-198634754.jpg" class="mx-auto">
                                          <h2 slot="header" class="fs-1 pop">CS 313A</h2>
                                          <p slot="content">Assurance and information Security</p>
                                    </card>
                              </a>
                              <a href="./subjectInfo_page.php?title=Theory and Automata - CS 311A" class="border btn text-center rounded m-3 p-0">
                                    <card data-image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHNgU-Q5i1o3wltPBd8BK7gU2PGT6Z0NQvnA&usqp=CAU" class="m-0">
                                          <h2 slot="header" class="fs-1 pop">CS 311A</h2>
                                          <p slot="content" class="mx-auto">Theory and Automata</p>
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