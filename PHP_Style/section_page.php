<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/a.css">'."\n";
      $titleName = "SIMS CS-Org - Section";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['MainMenu'] = "Class";

            $_SESSION['Class'] = null;
            $_SESSION['Student'] = null;

            include './SectionTemplate/header_1.php';

            $title = "Class List";
            $button = 2;
            include './MinorTemplate/back_tab.php'
      ?>

      <section>
            <div class="d-grid gap-2 col-6 mx-auto mb-5">
                  <a href=""></a>
                  <?php
                        $sql="SELECT * FROM yearsection_tb"; 

                        if ($res=mysqli_query($db->con, $sql)) :
                              if (mysqli_num_rows($res)>0) {
                                    $i = 0;
                                    while ($rows=mysqli_fetch_assoc($res)) :
                                          ++$i;
                                          ?>
                                                <a href="./class_page.php?title=BS Computer Science <?php echo $rows['year'].' - '.$rows['section']?>" class="container border btn btn-class text-center rounded my-1">
                                                      <div class="py-4 mx-2"> 
                                                            <h2 class="fw-bold">BS Computer Science <?php echo $rows['year'].' - '.$rows['section']?></h2>
                                                      </div>
                                                </a>
                                          <?php
                                    endwhile;
                              }
                              // Change this into card that display notification for no available yet
                              else { echo "No available";}
                        endif;
                  ?>
            </div>
      </section>

      <?php 
            include './SectionTemplate/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>