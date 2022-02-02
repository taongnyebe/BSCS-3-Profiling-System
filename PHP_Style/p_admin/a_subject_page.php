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
            
            $add = "./a_su_subjectInfo_page_update.php?use=Add&page=".(isset($_GET['page'])? $_GET['page'] : '' );
            $edit = "";
            $add_btn = true; $edit_btn = $search_input = $delete_btn = false;
            include './templates/back_tab.php';
      ?>

      <section class="cardscss">
            <div class="pb-5 mb-5">
                  <div id="app" class="container-fluid text-center">
<?php
                              $page = $_GET['page'];
                              $year = $schyearsem->getSelectedSchYear($page);
?>
                              <!-- Header And Page Controls -->
                              <div class="row mb-3">
                                    <?php echo ($_GET['page'] > 0)? '<a href="./a_subject_page.php?page='. --$page .'" class="col-1 btn btn-primary">Prev</a>' : '<div class="col-1"></div>' ?>
                                    <h3 class="col" ><?php if ($year != 1 && $year != 2) echo $year['sch_year']?></h3>
                                    <?php echo ($year != 1 && $year != 2)? '<a href="./a_subject_page.php?page='.++$_GET['page'].'" class="col-1 btn btn-primary">Next</a>' : '<div class="col-1"></div>'?>
                              </div>
<?php
                              if ($year != 1 && $year != 2) {
                                    $semesters = $schyearsem->getAllSemeter_Schyear($year['sch_year']);

                                    if ($semesters != 1 && $semesters != 2) {
                                          $current = true;
                                          foreach ($semesters as $semesters) {

?>
                                                <div class="py-2 <?php if ($current) {
                                                                        $current=false;
                                                                        echo "bg-primary rounded hover";
                                                                  } else
                                                                        echo "bg-secondary mx-5 mt-5 rounded hover";?>">
                                                      <h4><?php 
                                                            switch ($semesters['semester']) {
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

                                                $subject = $subj->getSubjectCard_YearSemester($semesters['id']); 
                                                if ($subject != 1 && $subject != 2) {
                                                      $i = 0;
                                                      foreach ($subject as $subject) :
                                                            ++$i;
?>
                                                                  <a href="./a_su_subjectInfo_page.php?id=<?php echo $subject['id']?>" class="border btn text-center rounded m-3 p-0">
                                                                        <card data-image="../Assets/general_subject.png" class="m-auto">
                                                                              <h2 slot="header" class="fs-1 pop"><?php echo $subject['code']?></h2>
                                                                              <p slot="content"><?php echo $subject['title']?></p>
                                                                        </card>
                                                                  </a>
<?php
                                                      endforeach;
                                                
                                          }else { 
                                                $tag = "No Available Subject!";
                                                include './templates/not_available_card.php';
                                          }
                                    }
                        }else { 
                              $tag = "No Available Subject!";
                              include './templates/not_available_card.php';
                        }
                  }else { 
                        $tag = "No Available Subject!";
                        include './templates/not_available_card.php';
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