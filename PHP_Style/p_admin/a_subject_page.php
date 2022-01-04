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
            
            $add = "";
            $edit = "";
            $add_btn = $edit_btn = $search_input = $delete_btn = false;
            include './templates/back_tab.php';
      ?>

      <section class="cardscss">
            <div class="pb-5 mb-5">
                  <div id="app" class="container-fluid text-center">
                        <?php
                              $sql="SELECT * FROM subject_tb"; 

                              if ($res=mysqli_query($db->con, $sql)) :
                                    if (mysqli_num_rows($res)>0) {
                                          $i = 0;
                                          while ($rows=mysqli_fetch_assoc($res)) :
                                                ++$i;
                                                ?>
                                                      <a href="./subjectInfo_page.php?id=<?php echo $rows['id']?>" class="border btn text-center rounded m-3 p-0">
                                                            <card data-image="https://thumbs.dreamstime.com/z/data-mining-concept-round-colorful-linear-vector-illustration-technology-modern-dark-background-198634754.jpg" class="mx-auto">
                                                                  <h2 slot="header" class="fs-1 pop"><?php echo $rows['code']?></h2>
                                                                  <p slot="content"><?php echo $rows['name']?></p>
                                                            </card>
                                                      </a>
                                                <?php
                                          endwhile;
                                    }
                                    // Change this into card that display notification for no available yet
                                    else { 
                                    ?>

                                    <?php
                                    }
                              endif;
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