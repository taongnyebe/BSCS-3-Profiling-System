<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/a.css">'."\n";
      $titleName = "SIMS CS-Org - Admin";

      include_once './MetaScript/meta.php';

      if (isset($_POST['submit'])){
            echo "shit";
      }
?>

<body>

      <?php 
            $_SESSION['Edit'] = ($_GET['use'] == "Add")? "" : "1";

            include './SectionTemplate/header_2.php';

            $title = $_GET['use']." Student";
            $button = 1;
            include './MinorTemplate/back_tab.php'
      ?>

      <section class="student-data">
            <div class="mb-5">
                  <div class=" p-1 text-center">
                        <img src="./Assets/news/257415000_1975091092659522_9073753297819881679_n.jpg" alt="" class="profile rounded" style="width: 300px; height: 400px" >
                  </div>
                  <div class="p-1 text-center">
                        <a href="" class="btn btn-warning">Upload Image</a>
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
                                          <div class="col-5"><input style="width: 100%" type="text" name="first_name" placeholder="ex. Juan Nico" value="<?php echo ''?>" required></div>
                                          <div class="col-2 pr-0"><h4>Middle Name :</h4></div>     
                                          <div class="col-3"><input style="width: 100%" type="text" name="middle_name" placeholder="ex. Dela Cruz" value="<?php echo ''?>"></div>
                                    </div>
                                    <div class="row">
                                          <div class="col-2 pr-0"><h4>Family Name : <small class="text-danger">*</small></h4></div>     
                                          <div class="col-5"><input style="width: 100%" type="text" name="family_name" placeholder="ex. Juan" value="<?php echo ''?>" required></div>
                                          <div class="col-2 pr-0"><h4>Suffix :</h4></div>     
                                          <div class="col-3"><input style="width: 100%" type="text" name="suffix" placeholder="ex. Jr., Sr. III" value="<?php echo ''?>"></div>
                                    </div>
                                    <div class="row">
                                          <div class="col-2 pr-0"><h4>Gender : <small class="text-danger">*</small></h4></div>               
                                          <div class="col-5">
                                                <!-- if($use=="Update" && $rows['highlight'] == 1) echo "checked"; -->
                                                <input type="radio" name="highlight" value=1 required>Male
                                                <input type="radio" name="highlight" value=0>Female
                                          </div>
                                          <div class="col-2 pr-0"><h4>Birthdate : <small class="text-danger">*</small></h4></div>     
                                          <div class="col-3"><input type="date" id="date_of_birth" name="date_of_birth" required></div>
                                    </div>
                                    
                                    <div class="row text-center mt-2">
                                          <h5 class="fw-bold">Contact Informations</h5>
                                    </div>
                                    <div class="row">
                                          <div class="col-2 pr-0"><h4>Contact No. : <small class="text-danger">*</small></h4></div>               
                                          <div class="col-5"><input style="width: 100%" type="contect" name="contact" placeholder="ex. 09xxxxxxxxxx" value="<?php echo ''?>" required></div>
                                          <div class="col-2 pr-0"><h5>Email :</h5></div>     
                                          <div class="col-3"><input style="width: 100%" type="email" name="contact" placeholder="ex. abcdefg1234@gmail.com" value="<?php echo ''?>"></div>
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
                                          <div class="col-5"><input style="width: 100%" type="number" name="id_no" placeholder="ex. no dash and space" value="<?php echo ''?>"></div>
                                          <div class="col-2 pr-0"><h4>Status : <small class="text-danger">*</small></h4></div>        
                                          <div class="col-3">
                                                <select name="status" id="0">
                                                      <option value='0'>Active</option>
                                                      <option value='1'>Transferee</option>
                                                      <option value='2'>Shifter</option>
                                                      <option value='3'>Drop</option>
                                                </select>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-2 pr-0"><h4>Year & Section : <small class="text-danger">*</small></h4></div>               
                                          <div class="col-5">
                                                <select name="status" id="0">
                                                      <?php 
                                                            $sql = mysqli_query($db->con,"SELECT * FROM yearsection_tb");
                                                            $n=1;

                                                            if(mysqli_num_rows($sql)){
                                                                  while($cat = mysqli_fetch_assoc($sql)) {
                                                                        $n++;
                                                                  echo "<option value='".$cat['id']."'>Year ".$cat['year']." - Section ".$cat['section']."</option>";
                                                                  }
                                                            }else
                                                                  echo "<option value='0'>No Category Available</option>";
                                                      ?>
                                                </select>
                                          </div>
                                          <div class="col-2 pr-0"><h4>Standing : </h4></div>     
                                          <div class="col-3">
                                                <input type="radio" id="1" name="fav_language" value="HTML" class="col" required>
                                                <label for="html">Regular</label>
                                                <input type="radio" id="0" name="fav_language" value="CSS" class="col">
                                                <label for="css">Irregular</label>
                                          </div>
                                    </div>
                              </div>
                              
                              <br>
                              <div class="row mb-2">
                                    <h3 class="fw-bold">Parent/Guardian Informations</h3>
                              </div>
                              <div class="border border-2 rounded p-3">
                                    <div class="row text-center">
                                          <h5 class="fw-bold">Guardian 1 <small class="text-danger">*</small></h5>
                                    </div>
                                    <div class="row ">
                                          <div class="col-2 pr-0"><h4>First Name :</h4></div>     
                                          <div class="col-5"><input style="width: 100%" type="text" name="g1_first_name" placeholder="ex. Juan Nico" value="<?php echo ''?>" required></div>
                                          <div class="col-2 pr-0"><h4>Middle Name :</h4></div>     
                                          <div class="col-3"><input style="width: 100%" type="text" name="g1_middle_name" placeholder="ex. Dela Cruz" value="<?php echo ''?>"></div>
                                    </div>
                                    <div class="row">
                                          <div class="col-2 pr-0"><h4>Family Name :</h4></div>     
                                          <div class="col-5"><input style="width: 100%" type="text" name="g1_family_name" placeholder="ex. Juan" value="<?php echo ''?>" required></div>
                                          <div class="col-2 pr-0"><h4>Suffix :</h4></div>     
                                          <div class="col-3"><input style="width: 100%" type="text" name="g1_suffix" placeholder="ex. Jr., Sr. III" value="<?php echo ''?>"></div>
                                    </div>

                                    <div class="row">
                                          <div class="col-2 pr-0"><h4>Contact No. :</h4></div>               
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
            include './SectionTemplate/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>