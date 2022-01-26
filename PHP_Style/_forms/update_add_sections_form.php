<?php 
      include_once '../Connection/caller.php';
      include_once '../MetaScript/_url.php';

      if (isset($_POST['submit'])){
            echo $studentbasic_id = ($_GET['use'] == "Add")? "":$_GET['id'];

            $year = $_POST['year'];
            $section = $_POST['section'];
            $sch_year = $_POST['sch_year_start']." - ".++$_POST['sch_year_start'];
            $semester = $_POST['semester'];

            echo $profile_img = $_FILES['profile_img']['name'];

            if($profile_img != ""){
                  
                  $source_path = $_FILES['profile_img']['tmp_name'];
                  echo $profile_img = ($_SESSION['image_name'])? $_SESSION['image_name'] : "Profile_Image_".rand().".".end(explode(".", $profile_img));
                  $destination_path = '../Assets/profiles/'.$profile_img;

                  if(!move_uploaded_file($source_path, $destination_path))
                  {
                        $_SESSION['profile_upload']="<div class='error'>Fail to Upload Image</div>";
                  }

            }

            echo ($ys->setYearSection($year, $section, $sch_year, $semester, $studentbasic_id))?
                  "<div class='text-success'>Student Basic Data ".$_GET['use']." Successfully</div>":
                  "<div class='text-error'>Fail to ".$_GET['use']." Student Basic Data</div>";

      }