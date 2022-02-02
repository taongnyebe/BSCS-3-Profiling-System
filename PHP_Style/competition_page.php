<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/cardcss.css">'."\n";
      $titleName = "SIMS CS-Org - Competition";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['Activities'] = "Competition";
      
            include './templates/header_2.php';

            unset($_SESSION['competition']);

            $title = "Competitions";

            $search_input = true;
            include './templates/back_tab.php';
      ?>

      <section class="cardscss"> &emsp;
            <div class="mb-5 text-center">
                  <div id="app" class="container-fluid">
                        <?php
                              $sql="SELECT * FROM competition_tb"; 

                              if ($res=mysqli_query($db->con, $sql)) :
                                    if (mysqli_num_rows($res)>0) {
                                          $i = 0;
                                          while ($rows=mysqli_fetch_assoc($res)) :
                                                ++$i;
                                                ?>
                                                      <a href="./comp_competitionInfo_page.php?id=<?php echo $rows['id'] ?>" class="border btn rounded m-3 p-0">
                                                            <card data-image="https://avatars.dicebear.com/api/identicon/<?php echo preg_replace('/\s+/', '_', $rows['id']) ?>.svg" class="m-0">
                                                                  <h4 slot="header" class="fw-bold pop pb-2"><?php echo $rows['title']?></h4><br>
                                                                  <p slot="content" class="cardblack">
                                                                        <small><?php if (isset($rows['event_title']) && $rows['event_title'] != '') echo $rows['event_title']?> </small><br>
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