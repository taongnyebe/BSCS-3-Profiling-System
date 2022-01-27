<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="../CSS/header_template1.css">'."\n"
            .'<link rel="stylesheet" href="../CSS/cardcss.css">'."\n";
      $titleName = "SIMS CS-Org - Subjects";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['MainMenu'] = "Subject";

            $_SESSION['Subject'] = null;

            include './templates/header_2.php';

            $title = "Subject List";
            
            $add = "./a_su_subjectInfo_page_update.php?use=Add";
            $edit = "";
            $add_btn = true; $edit_btn = $search_input = $delete_btn = false;
            include './templates/back_tab.php';
      ?>

      <section class="cardscss">
            <div class="pb-5 mb-5">
                  <div id="app" class="container-fluid text-center">
                        <?php
                              $subject = $subj->getSubjectCardData(); 

                              if ($subject != 1 && $subject != 2) {
                                    $i = 0;
                                    foreach ($subject as $subject) :
                                          ++$i;
                                          ?>
                                                <a href="./a_su_subjectInfo_page.php?id=<?php echo $subject['id']?>" class="border btn text-center rounded m-3 p-0">
                                                      <card data-image="https://thumbs.dreamstime.com/z/data-mining-concept-round-colorful-linear-vector-illustration-technology-modern-dark-background-198634754.jpg" class="m-auto">
                                                            <h2 slot="header" class="fs-1 pop"><?php echo $subject['code']?></h2>
                                                            <p slot="content"><?php echo $subject['title']?></p>
                                                      </card>
                                                </a>
                                          <?php
                                    endforeach;
                              }
                              // Change this into card that display notification for no available yet
                              else { 
                              ?>
                                    <div class="border btn text-center rounded m-3  p-0">
                                          <card data-image="../Assets/placeholders/no_available_file.png" class="m-0">
                                                <h2 slot="header" class="fs-3 pop">No Available Subject!</h2>
                                                <p slot="content"></p>
                                          </card>
                                    </div>
                              <?php
                              }
                        ?>
                  </div>
            </div>
      </section>
      
      <?php 
            include './templates/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>     