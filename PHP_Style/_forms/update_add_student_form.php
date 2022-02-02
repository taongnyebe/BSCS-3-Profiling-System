<?php 
      include_once '../Connection/caller.php';
      include_once '../MetaScript/_url.php';

      if (isset($_POST['submit'])){
            echo $studentbasic_id = ($_GET['use'] == "Add")? "":$_GET['id'];

            $first_name = ucwords($_POST['first_name']);
            $middle_name = ucwords($_POST['middle_name']);
            $family_name = ucwords($_POST['family_name']);
            $suffix = ucwords($_POST['suffix']);
            $sex = $_POST['sex'];
            $birthdate = $_POST['date_of_birth'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $student_id = $_POST['student_id'];
            $fb_name = $_POST['fb_name'];
            $permanent_address = $_POST['permanent_address'];
            $current_address = $_POST['current_address'];
            
            $profile_img = $_FILES['profile_img']['name'];
            
            $result['id'] = null;

            if($profile_img != ""){
                  
                  $source_path = $_FILES['profile_img']['tmp_name'];
                  $profile_img = ($_SESSION['image_name'])? $_SESSION['image_name'] : "Profile_Image_".rand().".".end(explode(".", $profile_img));
                  $destination_path = '../Assets/profiles/'.$profile_img;

                  if(!move_uploaded_file($source_path, $destination_path))
                  {
                        $_SESSION['profile_upload']="<div class='error'>Fail to Upload Image</div>";
                  }

            }

            echo ($sd->setStudentData($family_name, $middle_name, $first_name, $suffix, $sex, $birthdate, $contact, $email, $student_id, $fb_name, $permanent_address, $current_address, $studentbasic_id))?
                  "<div class='text-success'>Student Basic Data ".$_GET['use']." Successfully</div>":
                  "<div class='text-error'>Fail to ".$_GET['use']." Student Basic Data</div>";


            if ($_GET['use'] == "Add"){
                  $result = $sd->getNewStudentDataID($family_name, $middle_name, $first_name, $suffix, $sex, $birthdate, $contact, $email);
                  $result['id'].'<br>';

                  if ($profile_img != ""){
                        echo $profile_img."  ".$result['id'];
                        echo ($sd->setProfileImage($profile_img, $result['id']))?
                              "<div class='text-success'>Student Profile ".$_GET['use']." Successfully</div>":
                              "<div class='text-error'>Fail to ".$_GET['use']." Student Profile</div>";
                  }
            } else
            {
                  echo "testing";
                  if ($profile_img != ""){
                        echo $profile_img."  ".$studentbasic_id;
                        echo ($sd->setProfileImage($profile_img, $studentbasic_id))?
                              "<div class='text-success'>Student Profile ".$_GET['use']." Successfully</div>":
                              "<div class='text-error'>Fail to ".$_GET['use']." Student Profile</div>";
                  }
            }

            for ($i=1; $i < ($_POST['ssd-count'] + 1); $i++) {
                  echo $i; 
                  $status = $_POST['status-'.$i];
                  $yearsection = $_POST['yearsectionid-'.$i];
                  $standing = $_POST['standing-'.$i];
                  $id = $_POST['ssd-id-'.$i];
                  $i;
                  
                  echo ($ssd->setStudentSchoolData($yearsection, $standing, $status, $result['id'], $id))?
                        "<div class='text-success'>Student School Data ".$_GET['use']." Successfully</div>":
                        "<div class='text-error'>Fail to ".$_GET['use']." Student School Data</div>";
            }

            for ($i=1; $i < $_POST['g-count']; $i++) { 
                  $g_first_name = ucwords($_POST['g_first_name-'.$i]);
                  $g_middle_name = ucwords($_POST['g_middle_name-'.$i]);
                  $g_family_name = ucwords($_POST['g_family_name-'.$i]);
                  $g_suffix = ucwords($_POST['g_suffix-'.$i]);
                  $g_contact = $_POST['g_contact-'.$i];
                  $connection = $_POST['connection-'.$i];
                  $id = $_POST['g-id-'.$i];

                  echo ($gd->setGuardianData($g_family_name, $g_middle_name, $g_first_name, $g_suffix, $connection, $g_contact, $result['id'], $id))?
                        "<div class='text-success'>Guardian Data ".$_GET['use']." Successfully</div>":
                        "<div class='text-error'>Fail to ".$_GET['use']." Guardian Data</div>";
            }

      }

      echo $address = $homeurl."p_admin/".(($_GET['use'] == "Add")? "a_s_c_studentInfo_page.php?id=".$result['id'] :"a_s_c_studentInfo_page.php?id=".$studentbasic_id);
      echo "<script type='text/javascript'>document.location.href='{$address}';</script>";
      echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $address . '">';

?>