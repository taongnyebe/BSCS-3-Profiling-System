<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="../CSS/header_template1.css">'."\n"
            .'<link rel="stylesheet" href="../CSS/a.css">'."\n";
      $titleName = "SIMS CS-Org - Webinars";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['Activities'] = "Seminar";

            unset($_SESSION['seminar']);

            include './templates/header_2.php';

            $title = "Seminars";

            $add = "./a_act_web_webInfo_update_page.php";
            $edit = "";
            $add_btn = true; $edit_btn = $search_input = $delete_btn = false;
            include './templates/back_tab.php';
      ?>

      <section>
            <div class="wrapper-grid-research container-fluid pb-5 mb-5">
                  <?php
                        $sql="SELECT * FROM seminar_tb"; 

                        if ($res=mysqli_query($db->con, $sql)) :
                              if (mysqli_num_rows($res)>0) {
                                    $i = 0;
                                    while ($rows=mysqli_fetch_assoc($res)) :
                                          ++$i;
                                          ?>
                                                <div class="card m-3">
                                                      <a href="./a_act_web_webInfo_page.php?id=<?php echo $rows['id'] ?>" class="btn" style="background-image: url('https://cdn.pixabay.com/photo/2020/04/25/10/15/illustration-5090161_1280.jpg');">
                                                            <div class="card-body">
                                                                  <p>
                                                                        <h3 class="card-title fw-bold" rows="4"><?php echo $rows['title'] ?></h3>
                                                                        <h4 class="card-title"></h4>
                                                                  </p>
                                                            </div>
                                                      </a>
                                                </div>
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
      </section>

      <?php
            include './templates/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>     