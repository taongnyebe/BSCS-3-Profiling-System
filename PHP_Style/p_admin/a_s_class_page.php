<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="../CSS/header_template1.css">'."\n"
            .'<link rel="stylesheet" href="../CSS/cardcss.css">'."\n";
      $titleName = "SIMS CS-Org - Class";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['Class'] = 'a';

            $_SESSION['Student'] = null;

            $_SESSION['id_delete'] = null;
            $_SESSION['table_delete'] = null;
            $_SESSION['return'] = null;
            $_SESSION['image_name'] = null;
            
            include './templates/header_2.php';

            (isset($_GET['year']))? $_SESSION['year'] = $_GET['year'] : '' ;
            (isset($_GET['section']))? $_SESSION['section'] = $_GET['section'] : '' ;
            (isset($_GET['id']))? $_SESSION['section_id'] = $_GET['id'] : '' ;

            $idsection = $_SESSION['section_id'];

            $title = 'BS Computer Science '.$_SESSION['year'].' - '.$_SESSION['section'];
            
            $add = "./a_s_c_studentinfo_page_update.php?use=Add";
            $edit = "./a_s_class_page_update.php";
            $add_btn = $edit_btn = $search_input = true; $delete_btn = false;
            include './templates/back_tab.php'
      ?>

      <section class="cardscss">
            <div class=" pb-5 mb-5">
                  <div id="app" class="container-fluid text-center">
                  <?php
                        $student_data = $sd->getDisplayCardData($idsection);
                        $i = 0;

                        if($student_data != 1 && $student_data != 2)
                        {
                              foreach ($student_data as $student_data) {
                                    ++$i;
                                    ?>
                                          <a href="./a_s_c_studentInfo_page.php?id=<?php echo $student_data['id'] ?>" class="border btn text-center rounded m-3 p-0">
                                                <card data-image="<?php echo ($student_data['profile_filename'] != "")?
                                                            '../Assets/profiles/'.$student_data['profile_filename']:
                                                            "https://avatars.dicebear.com/api/".(($student_data['gender'])? "male": "female")."/".preg_replace('/\s+/', '_', $student_data['first_name']).".svg"?>"
                                                            class="m-0">
                                                      <h2 slot="header" class="fs-3 pop"><?php echo $student_data['family_name'].', '.$student_data['first_name'].' '.(($student_data['middle_name'] != '')? $student_data['middle_name'][0].'. ' : "" ).$student_data['suffix'] ?></h2>
                                                      <p slot="content" style="color:black"><?php echo substr_replace($student_data['studentid_no'], " - ", 2, 0) ?></p>
                                                </card>
                                          </a>
                                    <?php
                              }
                        }
                        // Change this into card that display notification for no available yet
                        else { 
                        ?>
                              <div class="border btn text-center rounded m-3 p-0">
                                    <card data-image="../Assets/placeholders/no_available_file.png" class="m-0">
                                          <h2 slot="header" class="fs-3 pop">No Available Students!</h2>
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