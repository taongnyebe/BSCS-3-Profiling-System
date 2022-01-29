<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="../CSS/header_template1.css">'."\n"
            .'<link rel="stylesheet" href="../CSS/cardcss.css">'."\n";
      $titleName = "SIMS CS-Org - Awards";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['Activities'] = "Awards";

            include './templates/header_2.php';

            $title = "Awards";

            $add = "";
            $edit = "";
            $add_btn = $edit_btn = $search_input = $delete_btn = false;
            include './templates/back_tab.php';
      ?>

      <section class="cardscss"> &emsp;
            <div class="mb-5">
                  <div id="app" class="container-fluid text-center">
                        <?php
                              $sql="SELECT * FROM award_tb;"; 

                              if ($res=mysqli_query($db->con, $sql)) :
                                    if (mysqli_num_rows($res)>0) {
                                          $i = 0;
                                          while ($rows=mysqli_fetch_assoc($res)) :
                                                ++$i;
                                                ?>
                                                      <a href="" class="border btn rounded m-3 p-0">
                                                            <card data-image="" class="m-0">
                                                                  <h4 slot="header" class="fw-bold pop pb-2 cardshadow-h2"><?php echo $rows['award_name']?></h4><br>
                                                                  <p slot="content" class="cardblack">
                                                                        <?php echo $rows['contest_name']?><br>
                                                                        <small>event name : <?php echo $rows['date']?></small>
                                                                        <small></small>
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
            include './templates/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>   