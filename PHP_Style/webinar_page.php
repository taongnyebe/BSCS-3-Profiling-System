<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/a.css">'."\n";
      $titleName = "SIMS CS-Org - Webinars";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['Activities'] = "Seminar";

            include './SectionTemplate/header_2.php';

            include './MinorTemplate/search_tab.php';

            $edit = '';
            $title = "Seminars and Webinars";
            $button = 2;
            include './MinorTemplate/back_tab.php';
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
                                                      <a href="" class="btn <?php switch ($rows['level']) {
                                                            case 1:
                                                                  echo 'btn-primary';
                                                                  break;
                                                            case 2:
                                                                  echo 'btn-warning';
                                                                  break;
                                                            case 3:
                                                                  echo 'btn-danger';
                                                                  break;
                                                      } ?>">
                                                            <div class="card-body">
                                                                  <p>
                                                                        <h3 class="card-title fw-bold" rows="4"><?php echo $rows['title'] ?></h3>
                                                                        <h4 class="card-title"><?php echo $rows['date_start'].(($rows['date_end'] != '')? ' : '.$rows['date_end']:'') ?></h4>
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
            include './SectionTemplate/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>     