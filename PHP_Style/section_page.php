<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/cardcss.css">'."\n";
      $titleName = "SIMS CS-Org - Section";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['MainMenu'] = "Class";

            $_SESSION['Class'] = null;
            $_SESSION['Student'] = null;

            include './SectionTemplate/header_2.php';

            $title = "Class List";
            $button = 2;
            include './MinorTemplate/back_tab.php'
      ?>

      <section class="cardscss">
            <div class="d-grid b-5 w-100">
                  <div id="app" class="container-fluid text-center">
                        <?php
                              $sql="SELECT * FROM yearsection_tb"; 

                              if ($res=mysqli_query($db->con, $sql)) :
                                    if (mysqli_num_rows($res)>0) {
                                          $i = 0;
                                          while ($rows=mysqli_fetch_assoc($res)) :
                                                ++$i;
                                                ?>
                                                      <a href="./class_page.php?title=BS Computer Science <?php echo $rows['year'].' - '.$rows['section']?>" class="border btn text-center rounded m-3 p-0">
                                                            <card data-image="./Assets/logo/CSOrg.ico" class="m-0">
                                                                  <h2 slot="header" class="fs-1 text-dark">BSCS <br><?php echo $rows['year'].' - '.$rows['section']?></h2>
                                                                  <p slot="content"></p>
                                                            </card>
                                                      </a>
                                                            
                                                <?php
                                    endwhile;
                              }
                              // Change this into card that display notification for no available yet
                              else { echo "No available";}
                        endif;
                        ?>
                  </div>
            </div>

      </section>

      <?php 
            include './SectionTemplate/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>