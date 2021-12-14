<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/cardcss.css">'."\n";
      $titleName = "SIMS CS-Org - Class";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['Class'] = 'a';

            $_SESSION['Student'] = null;
            
            include './SectionTemplate/header_2.php';

            include './MinorTemplate/search_tab.php';
            (isset($_GET['year']))? $_SESSION['year'] = $_GET['year'] : '' ;
            (isset($_GET['section']))? $_SESSION['section'] = $_GET['section'] : '' ;
            (isset($_GET['id']))? $_SESSION['section_id'] = $_GET['id'] : '' ;

            $idsection = $_SESSION['section_id'];

            $edit = "./studentInfo_page_update.php?use=Add";
            $title = 'BS Computer Science '.$_SESSION['year'].' - '.$_SESSION['section'];
            $button = 3;
            include './MinorTemplate/back_tab.php'
      ?>

      <section class="cardscss">
            <div class=" pb-5 mb-5">
                  <div id="app" class="container-fluid text-center">
                  <?php
                        $sql="SELECT studentbasic_tb.id, studentbasic_tb.family_name, studentbasic_tb.middle_name, studentbasic_tb.first_name, studentbasic_tb.suffix, studentschool_tb.studentid_no, studentbasic_tb.profile_filename, studentbasic_tb.gender FROM studentbasic_tb INNER JOIN studentschool_tb ON studentbasic_tb.id=studentschool_tb.student_id WHERE studentschool_tb.yearsection_id='$idsection'"; 

                        if ($res=mysqli_query($db->con, $sql)) :
                              if (mysqli_num_rows($res)>0) {
                                    $i = 0;
                                    while ($rows=mysqli_fetch_assoc($res)) :
                                          ++$i;
                                          ?>
                                                <a href="./studentInfo_page.php?id=<?php echo $rows['id'] ?>" class="border btn text-center rounded m-3 p-0">
                                                      <card data-image="<?php echo ($rows['profile_filename'] != "")?
                                                                  './Assets/profiles/'.$rows['profile_filename']:
                                                                  './Assets/placeholders/'.(($rows['gender'])? 'placeholder_profile_male.jpg':'placeholder_profile_female.jpg')?>"
                                                                  class="m-0">
                                                            <h2 slot="header" class="fs-3 pop"><?php echo $rows['family_name'].', '.$rows['first_name'].' '.(($rows['middle_name'] != '')? $rows['middle_name'][0].'. ' : "" ).$rows['suffix'] ?></h2>
                                                            <p slot="content"><?php echo substr_replace($rows['studentid_no'], " - ", 2, 0) ?></p>
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