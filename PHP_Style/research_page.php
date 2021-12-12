<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/a.css">'."\n";
      $titleName = "SIMS CS-Org - Research";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['MainMenu'] = "research";

            include './SectionTemplate/header_2.php';
            
            $edit = '';
            $title = "Researches";
            $button = 2;
            include './MinorTemplate/back_tab.php';
      ?>

      <section>
            <div class="wrapper-grid-research container-fluid pb-5 mb-5">
                  <?php
                        $sql="SELECT * FROM research_tb"; 

                        if ($res=mysqli_query($db->con, $sql)) :
                              if (mysqli_num_rows($res)>0) {
                                    $i = 0;
                                    while ($rows=mysqli_fetch_assoc($res)) :
                                          ++$i;
                                          ?>
                                                <div class="card m-3">
                                                      <a href="" class="btn btn-primary">
                                                            <div class="card-body">
                                                                  <p>
                                                                        <h3 class="card-title fw-bold" rows="4"><?php echo $rows['title']?></h3>
                                                                        <h4 class="card-title"><?php echo $rows['publish_date']?></h4>
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
                                    <div class="card m-3">
                                          <a href="" class="btn btn-primary">
                                                <div class="card-body">
                                                      <p>
                                                            <h3 class="card-title fw-bold" rows="4">No Available</h3>
                                                            <h4 class="card-title"></h4>
                                                      </p>
                                                </div>
                                          </a>
                                    </div>
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