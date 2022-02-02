<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="../CSS/header_template1.css">'."\n"
            .'<link rel="stylesheet" href="../CSS/cardcss.css">'."\n";
      $titleName = "SIMS CS-Org - Research";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['MainMenu'] = "research";
            unset($_SESSION['research']);

            include './templates/header_2.php';
            
            $title = "Researches";

            $add = "./a_researchInfo_update_page.php";
            $edit = "";
            $add_btn = true; $edit_btn = $search_input = $delete_btn = false;
            include './templates/back_tab.php';
      ?>

      <section>
            <div class="wrapper-grid-research container-fluid pb-5 mb-5">
                  <?php
                        $sql="SELECT * FROM research_tb ORDER BY publish_date DESC, title"; 

                        if ($res=mysqli_query($db->con, $sql)) :
                              if (mysqli_num_rows($res)>0) {
                                    $i = 0;
                                    while ($rows=mysqli_fetch_assoc($res)) :
                                          ++$i;
                                          ?>
                                                <div class="card m-3">
                                                      <a href="./a_researchInfo_page.php?id=<?php echo $rows['id']?>" class="btn" style="background-image: url('https://cdn.pixabay.com/photo/2020/04/25/10/15/illustration-5090161_1280.jpg');">
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
            include './templates/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>     