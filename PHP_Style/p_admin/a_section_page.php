<!DOCTYPE html>
<html lang="en">

<?php
ob_start();
      $css = '<link rel="stylesheet" href="../CSS/header_template1.css">'."\n"
            .'<link rel="stylesheet" href="../CSS/cardcss.css">'."\n";
      $titleName = "SIMS CS-Org - Section";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['MainMenu'] = "Class";

            $_SESSION['Class'] = null;
            $_SESSION['Student'] = null;

            include './templates/header_2.php';

            $title = "Class List";
            $add = "a_s_class_page_update.php";
            $edit = "";
            $add_btn = $sort_btn = true; $delete_btn = $edit_btn = $search_input = false;
            include './templates/back_tab.php'
      ?>

      <section class="cardscss">
            <div class="d-grid b-5 w-100">
                  <div id="app" class="container-fluid text-center">
                        <?php
                              $sch_year = $ys->getSchYear();
                              
                              if($sch_year != 1 && $sch_year != 2)
                              {
                                    $current = true;
                                    foreach ($sch_year as $sch_year){
                                                $section_data = $ys->getSectionData($sch_year['sch_year'], $sch_year['semester']);
                                    ?>
                                                <!-- ///////////////////////////////// -->
                                                <!-- Create design here -->
                                                <!-- Design:
                                                      1. Current and And Past school year title are different
                                                      2. Elevated Level for Current -->
                                                <div class="<?php if($current) {
                                                                        $current=false;
                                                                        echo "bg-primary fw-bold";
                                                                  }else
                                                                        echo "bg-secondary fw-italic mx-5 mt-5";?>">
                                                      <h3><?php echo $sch_year['sch_year']?></h3>
                                                      <h4><?php echo $sch_year['semester']?> Semester</h4>
                                                </div>
                                    <?php 
                                                foreach ($section_data as $section_data){
                                                      $id = $section_data['id'];
                                                      $count = mysqli_fetch_assoc(mysqli_query($db->con,"SELECT COUNT(id) AS count FROM studentschool_tb WHERE yearsection_id=$id"));
                                    ?>
                                                <a href="./a_s_class_page.php?year=<?php echo $section_data['year']?>&section=<?php echo $section_data['section']?>&id=<?php echo $section_data['id']?>" class="border btn text-center rounded m-3 p-0">
                                                      <card data-image="<?php echo (false /*change to file_name*/)? "" : 
                                                            "../Assets/placeholders/year/year".$section_data['year'].".png"?>" class="m-0">
                                                            <h2 slot="header" class="fs-1">BSCS <br><?php echo $section_data['year'].' - '.$section_data['section']?></h2>
                                                            <p slot="content" ><?php echo $count['count']?></p>
                                                      </card>
                                                </a>
                                                      
                                    <?php 
                                          }     
                                    }
                              }else { 
                              ?>
                                    <div class="border btn text-center rounded m-3 p-0">
                                          <card data-image="./Assets/placeholders/placeholder_profile_male.jpg" class="m-0">
                                                <h2 slot="header" class="fs-3 pop">No Available Class!</h2>
                                                <p slot="content"></p>
                                          </card>
                                    </div>
                              <?php
                              }
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