<?php 
      include_once '../Connection/caller.php';
      include_once '../MetaScript/_url.php';

      if (isset($_POST['submit'])){
            $studentbasic_id = ($_GET['use'] == "Add")? "":$_GET['id'];

            $first_name = ucwords($_POST['first_name']);
            $middle_name = ucwords($_POST['middle_name']);
            $family_name = ucwords($_POST['family_name']);
            $suffix = ucwords($_POST['suffix']);
            $gender = $_POST['gender'];
            $birthdate = $_POST['date_of_birth'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $fb_name = $_POST['fb_name'];
            $home = $_POST['home'];
            $boarding = $_POST['boarding'];

            $id_no = $_POST['id_no'];
            $status = ucwords($_POST['status']);
            $yearsection = $_POST['yearsection'];
            $standing = $_POST['standing'];

            $g1_first_name = ucwords($_POST['g1_first_name']);
            $g1_middle_name = ucwords($_POST['g1_middle_name']);
            $g1_family_name = ucwords($_POST['g1_family_name']);
            $g1_suffix = ucwords($_POST['g1_suffix']);
            $g1_contact = $_POST['g1_contact'];
/*
            $g2_first_name = ucwords($_POST['g2_first_name']);
            $g2_middle_name = ucwords($_POST['g2_middle_name']);
            $g2_family_name = ucwords($_POST['g2_family_name']);
            $g2_suffix = ucwords($_POST['g2_suffix']);
            $g2_contact = $_POST['g2_contact'];
*/
            $profile_img = $_FILES['profile_img']['name'];
            $image_upload = false;

            if($profile_img != ""){
                  
                  $source_path = $_FILES['profile_img']['tmp_name'];
                  $profile_img = ($_SESSION['image'])? $_SESSION['image_name'] : "Profile_Image_".rand().".".end(explode(".", $profile_img));
                  $destination_path = '../Assets/profiles/'.$profile_img;

                  if(!move_uploaded_file($source_path, $destination_path))
                  {
                        $_SESSION['profile_upload']="<div class='error'>Fail to Upload Image</div>";
                  }

                  $image_upload = true;
            }

            $sql1 = (($_GET['use'] == "Add")? "INSERT INTO" : "UPDATE")
                  ." studentbasic_tb SET"
                  ." family_name='$family_name', middle_name='$middle_name', first_name='$first_name', suffix='$suffix',"
                  ." gender='$gender', date_of_birth='$birthdate', contact_number='$contact', email='$email',"
                  ." fb_name='$fb_name', home='$home', boarding='$boarding'"
                  .(($image_upload)? ", profile_filename='$profile_img'" : '')
                  .(($_GET['use'] == "Add")? "":" WHERE id='$studentbasic_id'");

            echo (mysqli_query($db->con, $sql1))? 
                  "<div class='text-success'>Student Basic Data ".$_GET['use']." Successfully</div>":
                  "<div class='text-error'>Fail to ".$_GET['use']." Student School Data: <br>".$sql1."</div>";

            $result = mysqli_fetch_assoc(mysqli_query($db->con,"SELECT id FROM studentbasic_tb WHERE family_name='$family_name' && middle_name='$middle_name' && first_name='$first_name' && suffix='$suffix' && gender='$gender' && date_of_birth='$birthdate' && contact_number='$contact' && email='$email'"));
            $newid = $result['id'];

            $sql2 = (($_GET['use'] == "Add")? "INSERT INTO" : "UPDATE") 
                  ." studentschool_tb SET "
                  .(($_GET['use'] == "Add")? "student_id='$newid', " : "")
                  ." yearsection_id='$yearsection', studentid_no='$id_no', regular='$standing', student_status='$status' "
                  .(($_GET['use'] == "Add")? "":"WHERE student_id='$studentbasic_id'");

            $ys=mysqli_fetch_assoc(mysqli_query($db->con,"SELECT * FROM yearsection_tb WHERE id='$yearsection'")); 

            echo (mysqli_query($db->con, $sql2))? 
                  "<div class='text-success'>Student School Data ".$_GET['use']." Successfully</div>":
                  "<div class='text-error'>Fail to ".$_GET['use']." Student School Data</div>";

            header("location:http://localhost/PHP-Codes/BSCS-3-Profiling-System/PHP_Style/p_admin/".(($_GET['use'] == "Add")? "a_s_c_studentInfo_page.php?id=".$newid :"a_s_c_studentInfo_page.php?id=".$studentbasic_id));
      }

?>