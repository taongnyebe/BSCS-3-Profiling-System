<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/a.css">'."\n";
      $titleName = "SIMS CS-Org - Admin";

      include_once './MetaScript/meta.php';

      if (isset($_POST['submit'])){
            $studentbasic_id = $_SESSION['studentbasic_id'];

            $first_name = $_POST['first_name'];
            $middle_name = $_POST['middle_name'];
            $family_name = $_POST['family_name'];
            $suffix = $_POST['suffix'];
            $gender = $_POST['gender'];
            $birthdate = $_POST['date_of_birth'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $fb_name = $_POST['fb_name'];
            $home = $_POST['home'];
            $boarding = $_POST['boarding'];

            $id_no = $_POST['id_no'];
            $status = $_POST['status'];
            $yearsection = $_POST['yearsection'];
            $standing = $_POST['standing'];

            $g1_first_name = $_POST['g1_first_name'];
            $g1_middle_name = $_POST['g1_middle_name'];
            $g1_family_name = $_POST['g1_family_name'];
            $g1_suffix = $_POST['g1_suffix'];
            $g1_contact = $_POST['g1_contact'];

            $g2_first_name = $_POST['g2_first_name'];
            $g2_middle_name = $_POST['g2_middle_name'];
            $g2_family_name = $_POST['g2_family_name'];
            $g2_suffix = $_POST['g2_suffix'];
            $g2_contact = $_POST['g2_contact'];

            $profile_img = $_FILES['profile_img']['name'];
            $image_upload = false;

            if($profile_img){
                  
                  $source_path = $_FILES['profile_img']['tmp_name'];
                  $profile_img="Profile Image - ".rand().".".end(explode(".", $profile_img));
                  $destination_path = './Assets/profiles/'.$profile_img;

                  if(!move_uploaded_file($source_path, $destination_path))
                  {
                        $_SESSION['profile_upload']="<div class='error'>Fail to Upload Image</div>";
                  }

                  $image_upload = true;
            }

            //$sql1 = "UPDATE studentbasic_tb SET family_name='$family_name', middle_name='$middle_name', first_name='$first_name', suffix='$suffix', gender='$gender', date_of_birth='$birthdate', contact_number='$contact', email='$email'"
            //      .(($image_upload)? ", profile_filename='$profile_img'" : '')
            //      ."WHERE id='$studentbasic_id'";
            $sql2 = '';
            $sql3 = '';

            
      }
?>

<body>

      <?php 
            $_SESSION['Edit'] = ($_GET['use'] == "Add")? "" : "1";

            include './SectionTemplate/header_2.php';

            $title = $_GET['use']." Student";
            $button = 1;
            
            $id = (isset($_GET['id']))? $_GET['id'] : '';
            
            $sql="SELECT studentbasic_tb.*, studentschool_tb.id AS studentschool_id, studentschool_tb.yearsection_id, studentschool_tb.studentid_no, studentschool_tb.regular, studentschool_tb.student_status, yearsection_tb.year, yearsection_tb.section
                  FROM ((studentbasic_tb 
                  INNER JOIN studentschool_tb 
                  ON studentbasic_tb.id=studentschool_tb.student_id)
                  INNER JOIN yearsection_tb
                  ON yearsection_tb.id=studentschool_tb.yearsection_id)
                  WHERE studentbasic_tb.id='$id'"; 

            if ($res=mysqli_query($db->con, $sql)) {
                  if (mysqli_num_rows($res)>0) {
                        $i = 0;
                        while ($rows=mysqli_fetch_assoc($res)) :
                              ++$i;
                              include './MinorTemplate/back_tab.php';
                              $_SESSION['studentbasic_id'] = $rows['id'];
                              ?>
                                    <section class="student-data">
                                          <div class="mb-5">
                                                <div class=" p-1 text-center">
                                                      <img src="<?php echo ($rows['profile_filename'] != "")?
                                                                  './Assets/profiles/'.$rows['profile_filename']:
                                                                  './Assets/placeholders/'.(($rows['gender'])? 'placeholder_profile_male.jpg':'placeholder_profile_female.jpg')?>" 
                                                            alt="" class="profile rounded border border-3" style="width: 300px; height: 400px" >
                                                </div>
                                                <div class="p-1 text-center">
                                                      <input type="file" name="profile_img">
                                                </div>
                                          </div>
                                          <form method="post" class='container border border-5 rounded mx-auto shadow p-3 mb-5 bg-body'>
                                                <div class="row">
                                                      <div class="col">
                                                            <div class="row mb-2">
                                                                  <h3 class="fw-bold">Basic Informations</h3>
                                                            </div>
                                                            <div class="border border-2 rounded p-3">
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>First Name : <small class="text-danger">*</small></h4></div>     
                                                                        <div class="col-5"><input style="width: 100%" type="text" name="first_name" placeholder="ex. Juan Nico" value="<?php echo $rows['first_name']?>" required></div>
                                                                        <div class="col-2 pr-0"><h4>Middle Name :</h4></div>     
                                                                        <div class="col-3"><input style="width: 100%" type="text" name="middle_name" placeholder="ex. Dela Cruz" value="<?php echo $rows['middle_name']?>"></div>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Family Name : <small class="text-danger">*</small></h4></div>     
                                                                        <div class="col-5"><input style="width: 100%" type="text" name="family_name" placeholder="ex. Juan" value="<?php echo $rows['family_name']?>" required></div>
                                                                        <div class="col-2 pr-0"><h4>Suffix :</h4></div>     
                                                                        <div class="col-3"><input style="width: 100%" type="text" name="suffix" placeholder="ex. Jr., Sr. III" value="<?php echo $rows['suffix']?>"></div>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Gender : <small class="text-danger">*</small></h4></div>               
                                                                        <div class="col-5">
                                                                              <input type="radio" name="gender" value=1 <?php if($_GET['use']=="Update" && $rows['gender'] == 1) echo "checked"; ?> required>Male
                                                                              <input type="radio" name="gender" value=0 <?php if($_GET['use']=="Update" && $rows['gender'] == 0) echo "checked"; ?>>Female
                                                                        </div>
                                                                        <div class="col-2 pr-0"><h4>Birthdate : <small class="text-danger">*</small></h4></div>     
                                                                        <div class="col-3"><input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo date($rows['date_of_birth']);?>" required></div>
                                                                  </div>
                                                                  
                                                                  <div class="row text-center mt-2">
                                                                        <h5 class="fw-bold">Contact Informations</h5>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Contact No. : <small class="text-danger">*</small></h4></div>               
                                                                        <div class="col-5"><input style="width: 100%" type="number" name="contact" placeholder="ex. 09xxxxxxxxxx" value="<?php echo $rows['contact_number']?>" required></div>
                                                                        <div class="col-2 pr-0"><h4>Email :</h4></div>     
                                                                        <div class="col-3"><input style="width: 100%" type="email" name="email" placeholder="ex. abcdefg1234@gmail.com" value="<?php echo $rows['email']?>"></div>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>FB Name :</h4></div>               
                                                                        <div class="col-5"><input style="width: 100%" type="text" name="fb_name" placeholder="ex.dr. Mundo" value="<?php echo ''?>"></div>
                                                                        <div class="col-2 pr-0"></div>     
                                                                        <div class="col-3"></div>
                                                                  </div>
                                                                  
                                                                  <div class="row text-center mt-2">
                                                                        <h5 class="fw-bold">Address</h5>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Home : <small class="text-danger">*</small></h4></div>               
                                                                        <div class="col-5"><input style="width: 100%" type="text" name="home" placeholder="ex. south west" value="<?php echo ''?>" required></div>
                                                                        <div class="col-2 pr-0"><h4>Boarding :</h4></div>     
                                                                        <div class="col-3"><input style="width: 100%" type="text" name="boarding" placeholder="ex. isabela" value="<?php echo ''?>"></div>
                                                                  </div>
                                                            </div>
                                                            
                                                            <br>
                                                            <div class="row mb-2">
                                                                  <h3 class="fw-bold">Student Informations</h3>
                                                            </div>
                                                            <div class="border border-2 rounded p-3">
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>I.D. No. : <small class="text-danger">*</small></h4></div>     
                                                                        <div class="col-5"><input style="width: 100%" type="number" name="id_no" placeholder="ex. no dash and space" value="<?php echo $rows['studentid_no'] ?>"></div>
                                                                        <div class="col-2 pr-0"><h4>Status : <small class="text-danger">*</small></h4></div>        
                                                                        <div class="col-3">
                                                                              <select name="status" id="0">
                                                                                    <option value='active' <?php echo ($rows['student_status']=='active')? "selected": "" ?>>Active</option>
                                                                                    <option value='transferee' <?php echo ($rows['student_status']=='transferee')? "selected": "" ?>>Transferee</option>
                                                                                    <option value='shifter' <?php echo ($rows['student_status']=='shifter')? "selected": "" ?>>Shifter</option>
                                                                                    <option value='drop' <?php echo ($rows['student_status']=='drop')? "selected": "" ?>>Drop</option>
                                                                              </select>
                                                                        </div>
                                                                  </div>
                                                                  <div class="row">
                                                                        <p><small>&emsp; Note: Dont use dash (-). ex. ID No. 17-0321 in the input 170312 </small></p>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Year & Section : <small class="text-danger">*</small></h4></div>               
                                                                        <div class="col-5">
                                                                              <select name="yearsection" id="0">
                                                                                    <?php 
                                                                                          $sql = mysqli_query($db->con,"SELECT * FROM yearsection_tb");
                                                                                          $n=1;

                                                                                          if(mysqli_num_rows($sql)){
                                                                                                while($cat = mysqli_fetch_assoc($sql)) {
                                                                                                      $n++;
                                                                                                echo "<option value='".$cat['id']."' ".(($rows['yearsection_id'] == $cat['id'])? "selected":"" ).">Year ".$cat['year']." - Section ".$cat['section']."</option>";
                                                                                                }
                                                                                          }else
                                                                                                echo "<option value='0'>No Category Available</option>";
                                                                                    ?>
                                                                              </select>
                                                                        </div>
                                                                        <div class="col-2 pr-0"><h4>Standing : </h4></div>     
                                                                        <div class="col-3">
                                                                              <input type="radio" id="1" name="standing" value="Regular" class="col" <?php if($_GET['use'] == "Update" && $rows['regular']) echo "checked";?> required>
                                                                              <label for="Regular">Regular</label>
                                                                              <input type="radio" id="0" name="standing" value="Irregular" class="col" <?php if($_GET['use'] == "Update" && !$rows['regular']) echo "checked";?>>
                                                                              <label for="Irregular">Irregular</label>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            
                                                            <br>
                                                            <div class="row mb-2">
                                                                  <h3 class="fw-bold">Parent/Guardian Informations</h3>
                                                            </div>
                                                            <div class="border border-2 rounded p-3">
                                                                  <div class="row text-center">
                                                                        <h5 class="fw-bold">Guardian 1</h5>
                                                                  </div>
                                                                  <div class="row ">
                                                                        <div class="col-2 pr-0"><h4>First Name : <small class="text-danger">*</small></h4></div>     
                                                                        <div class="col-5"><input style="width: 100%" type="text" name="g1_first_name" placeholder="ex. Juan Nico" value="<?php echo ''?>" required></div>
                                                                        <div class="col-2 pr-0"><h4>Middle Name :</h4></div>     
                                                                        <div class="col-3"><input style="width: 100%" type="text" name="g1_middle_name" placeholder="ex. Dela Cruz" value="<?php echo ''?>"></div>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Family Name : <small class="text-danger">*</small></h4></div>     
                                                                        <div class="col-5"><input style="width: 100%" type="text" name="g1_family_name" placeholder="ex. Juan" value="<?php echo ''?>" required></div>
                                                                        <div class="col-2 pr-0"><h4>Suffix :</h4></div>     
                                                                        <div class="col-3"><input style="width: 100%" type="text" name="g1_suffix" placeholder="ex. Jr., Sr. III" value="<?php echo ''?>"></div>
                                                                  </div>

                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Contact No. : <small class="text-danger">*</small></h4></div>               
                                                                        <div class="col-5"><input style="width: 100%" type="contect" name="g1_contact" placeholder="ex. 09xxxxxxxxxx" value="<?php echo ''?>" required></div>
                                                                        <div class="col-2 pr-0"></div>     
                                                                        <div class="col-3"></div>
                                                                  </div>
                                                                  <div class="row text-center">
                                                                        <h5 class="fw-bold">Guardian 2</h5>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>First Name :</h4></div>     
                                                                        <div class="col-5"><input style="width: 100%" type="text" name="g2_first_name" placeholder="ex. Juan Nico" value="<?php echo ''?>"></div>
                                                                        <div class="col-2 pr-0"><h4>Middle Name :</h4></div>     
                                                                        <div class="col-3"><input style="width: 100%" type="text" name="g2_middle_name" placeholder="ex. Dela Cruz" value="<?php echo ''?>"></div>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Family Name :</h4></div>     
                                                                        <div class="col-5"><input style="width: 100%" type="text" name="g2_family_name" placeholder="ex. Juan" value="<?php echo ''?>"></div>
                                                                        <div class="col-2 pr-0"><h4>Suffix :</h4></div>     
                                                                        <div class="col-3"><input style="width: 100%" type="text" name="g2_suffix" placeholder="ex. Jr., Sr. III" value="<?php echo ''?>"></div>
                                                                  </div>

                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Contact No. :</h4></div>               
                                                                        <div class="col-5"><input style="width: 100%" type="contect" name="g2_contact" placeholder="ex. 09xxxxxxxxxx" value="<?php echo ''?>"></div>
                                                                        <div class="col-2 pr-0"></div>     
                                                                        <div class="col-3"></div>
                                                                  </div>
                                                            </div>
                                                            
                                                            <br>
                                                            <div class="row mb-2">
                                                                  <h3 class="fw-bold">Activities and Research</h3>
                                                            </div>
                                                            <div class="border border-2 rounded p-3">
                                                                  <div class="row text-center">
                                                                        <h5 class="fw-bold">Research</h5>
                                                                  </div>
                                                                  <div class="row px-5">
                                                                        <a href="./activities_page.php" class="btn btn-success">
                                                                              <strong>Equity Risk Premium Puzzle and Investors' Behavioral Analysis: A Theoretical and Empirical Explanation from the Stock Markets in the U.S. & China</strong><br>
                                                                              <small>March 3, 2021</small>
                                                                        </a>
                                                                  </div>
                                                                  <div class="row text-center">
                                                                        <h5 class="fw-bold">Awards</h5>
                                                                  </div>
                                                                  <div class="row justify-content-center">
                                                                        <div class="col text-center pb-2"><a href="./activities_page.php" class="btn btn-secondary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col text-center pb-2"><a href="./activities_page.php" class="btn btn-secondary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col text-center pb-2"><a href="./activities_page.php" class="btn btn-secondary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col text-center pb-2"><a href="./activities_page.php" class="btn btn-secondary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col text-center pb-2"><a href="./activities_page.php" class="btn btn-secondary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col text-center pb-2"><a href="./activities_page.php" class="btn btn-secondary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col text-center pb-2"><a href="./activities_page.php" class="btn btn-secondary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col text-center pb-2"><a href="./activities_page.php" class="btn btn-secondary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                  </div>
                                                                  <div class="row text-center">
                                                                        <h5 class="fw-bold">Competition</h5>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-auto pb-2"><a href="./activities_page.php" class="btn btn-warning">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pb-2"><a href="./activities_page.php" class="btn btn-warning">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pb-2"><a href="./activities_page.php" class="btn btn-warning">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pb-2"><a href="./activities_page.php" class="btn btn-warning">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pb-2"><a href="./activities_page.php" class="btn btn-warning">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                  </div>
                                                                  <div class="row text-center">
                                                                        <h5 class="fw-bold">Webinar</h5>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-auto pb-2"><a href="./activities_page.php" class="btn btn-primary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pb-2"><a href="./activities_page.php" class="btn btn-primary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pb-2"><a href="./activities_page.php" class="btn btn-primary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pb-2"><a href="./activities_page.php" class="btn btn-primary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pb-2"><a href="./activities_page.php" class="btn btn-primary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                                <br>
                                                <div class="text-end">
                                                      <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="submit">Submit</button>
                                                </div>
                                          </form>
                                    </section>
                              <?php
                        endwhile;
                  }
            }
      
            include './SectionTemplate/footer.php';

            include_once './MetaScript/script.php';
      ?>

</body>
</html>