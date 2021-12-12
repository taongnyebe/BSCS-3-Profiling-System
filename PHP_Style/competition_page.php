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

            $edit = '';
            $title = "Competitions";
            $button = 2;
            include './MinorTemplate/back_tab.php';
      ?>

      <section class="cardscss"> &emsp;
            <div class="mb-5 text-center">
                  <div id="app" class="container-fluid">
                        <?php
                              $sql="SELECT * FROM contest_tb"; 

                              if ($res=mysqli_query($db->con, $sql)) :
                                    if (mysqli_num_rows($res)>0) {
                                          $i = 0;
                                          while ($rows=mysqli_fetch_assoc($res)) :
                                                ++$i;
                                                ?>
                                                      <a href="" class="border btn rounded m-3 p-0">
                                                            <card data-image="" class="m-0">
                                                                  <h4 slot="header" class="fw-bold pop pb-2 cardshadow-h2"><?php echo $rows['title']?></h4><br>
                                                                  <p slot="content" class="cardblack">
                                                                        <small>Event Name </small><br>
                                                                        <small><?php echo $rows['date_start']?></small>
                                                                  </p>
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
            include './SectionTemplate/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>   