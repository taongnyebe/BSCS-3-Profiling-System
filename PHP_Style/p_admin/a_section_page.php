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

            unset($_SESSION['Class'], $_SESSION['Student'], $_SESSION['year'], $_SESSION['section'], $_SESSION['section_id'] );

            include './templates/header_2.php';

            $title = "Class List";
            $add = "a_s_class_page_update.php?use=Add";
            $edit = "";
            $add_btn = $sort_btn = true; $delete_btn = $edit_btn = $search_input = false;
            include './templates/back_tab.php'
?>

      <section class="cardscss">
            <div class="d-grid b-5 w-100">
                  <div id="app" class="container-fluid text-center">
<?php
                              $sch_year = $ys->getSchYear();
                              
                              if ($sch_year != 1 && $sch_year != 2) {
                                    $current = true;
                                    foreach ($sch_year as $sch_year) {
                                                $section_data = $ys->getSectionData($sch_year['sch_year'], $sch_year['semester']);
?>
                                                <div class="<?php if ($current) {
                                                                        $current=false;
                                                                        echo "bg-primary rounded hover";
                                                                  } else
                                                                        echo "bg-secondary mx-5 mt-5 rounded hover";?>">
                                                      <h3><?php echo $sch_year['sch_year']?></h3>
                                                      <h4><?php 
                                                            switch ($sch_year['semester']) {
                                                                  case 1:
                                                                        echo "1st";
                                                                        break;
                                                                  case 2:
                                                                        echo "2nd";
                                                                        break;
                                                                  case 3:
                                                                        echo "Mid";
                                                                        break;
                                                            }
                                                            ?> Semester</h4>
                                                </div>
                                    <?php 
                                                foreach ($section_data as $section_data) {
                                                      $count = $ssd->countStudentSectionYear($section_data['id']);

                                    ?>
                                                <a href="./a_s_class_page.php?year=<?php echo $section_data['year']?>&section=<?php echo $section_data['section']?>&id=<?php echo $section_data['id']?>&sch_year=<?php echo $section_data['sch_year']?>&semester=<?php echo $section_data['semester'] ?>" class="border btn text-center rounded m-3 p-0">
                                                      <card data-image="<?php echo (false /*change to file_name*/)? "" : 
                                                            "../Assets/placeholders/year/year".$section_data['year'].".png"?>" class="m-0">
                                                            <h2 slot="header" class="fs-1">BSCS <br><?php echo $section_data['year'].' - '.$section_data['section']?></h2>
                                                            <p slot="content" class="text-light"><?php echo $count['student_count']?></p>
                                                      </card>
                                                </a>
                                                      
                                    <?php 
                                          }     
                                    }
                              }else { 
                              ?>
                                    <div class="border btn text-center rounded m-3 p-0">
                                          <card data-image="../Assets/placeholders/no_available_file.png" class="m-0">
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