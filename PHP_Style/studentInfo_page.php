<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/a.css">'."\n";
      $titleName = "SIMS CS-Org - Admin";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['Student'] = "1";

            $_SESSION['Edit'] = null;
            $_SESSION['image'] = null;
            $_SESSION['image_name'] = null;

            include './SectionTemplate/header_2.php';
            
            $id = $_GET['id'];

            $edit = "./studentInfo_page_update.php?use=Update&id=$id";
            $title = "Student Informations";
            $button = 4;
            include './MinorTemplate/back_tab.php';

            $sql="SELECT studentbasic_tb.*, studentschool_tb.id AS studentschool_id, studentschool_tb.yearsection_id, studentschool_tb.studentid_no, studentschool_tb.regular, studentschool_tb.student_status, yearsection_tb.year, yearsection_tb.section
                  FROM ((studentbasic_tb 
                  INNER JOIN studentschool_tb 
                  ON studentbasic_tb.id=studentschool_tb.student_id)
                  INNER JOIN yearsection_tb
                  ON yearsection_tb.id=studentschool_tb.yearsection_id)
                  WHERE studentbasic_tb.id='$id'"; 

            if ($res=mysqli_query($db->con, $sql)) :
                  if (mysqli_num_rows($res)>0) {
                        $i = 0;
                        while ($rows=mysqli_fetch_assoc($res)) :
                              ++$i;
                              ?>

                              <section class="student-data">
                                          <div class="mb-5">
                                                <div class=" p-1 text-center">
                                                      <img src="<?php echo ($rows['profile_filename'] != "")?
                                                                  './Assets/profiles/'.$rows['profile_filename']:
                                                                  './Assets/placeholders/'.(($rows['gender'])? 'placeholder_profile_male.jpg':'placeholder_profile_female.jpg')?>"
                                                            alt="" class="profile rounded border border-3" style="width: 300px; height: 400px" >
                                                </div>
                                          </div>
                                          <div class="text-center">
                                                <?php
                                                      if(isset($_SESSION['basic_data'])){
                                                            echo $_SESSION['basic_data'];
                                                            unset($_SESSION['basic_data']);
                                                      }

                                                      if(isset($_SESSION['profile_upload'])){
                                                            echo $_SESSION['profile_upload'];
                                                            unset($_SESSION['profile_upload']);
                                                      }
                                                      if(isset($_SESSION['school_data'])){
                                                            echo $_SESSION['school_data'];
                                                            unset($_SESSION['school_data']);
                                                      }
                                                ?>
                                          </div>

                                          <div class='container border border-5 rounded mx-auto shadow p-3 mb-5 bg-body'>
                                                <div class="row">
                                                      <div class="col">
                                                            <div class="row mb-2">
                                                                  <h3 class="fw-bold">Basic Informations</h3>
                                                            </div>
                                                            <div class="border border-2 rounded p-3">
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Name :</h4></div>     
                                                                        <div class="col-5"><h4><?php echo $rows['family_name'].', '.$rows['first_name'].' '.(($rows['middle_name'] != '')? $rows['middle_name'][0].'. ' : "" ).$rows['suffix'] ?></h4></div>
                                                                        <div class="col-2 pr-0"><h4>Age :</h4></div>        
                                                                        <div class="col-3"><h4><?php 
                                                                                                      $date = date_format(date_create($rows['date_of_birth']), 'm/d/Y');
                                                                                                      $birthDate = explode('/', $date);
                                                                                                      echo (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2])); 
                                                                                                ?></h4></div>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Gender :</h4></div>               
                                                                        <div class="col-5"><h4><?php echo ($rows['gender'])? 'Male' : 'Female' ?></h4></div>
                                                                        <div class="col-2 pr-0"><h4>Birthdate :</h4></div>     
                                                                        <div class="col-3"><h4><?php echo $date ?></h4></div>
                                                                  </div>
                                                                  
                                                                  <div class="row text-center mt-2">
                                                                        <h5 class="fw-bold">Contact Informations</h5>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Contact No.:</h4></div>               
                                                                        <div class="col-5"><h4><?php if($rows['contact_number'] != ""){if($rows['contact_number'][0] == 6) echo "+ ";} echo $rows['contact_number'] ?></h4></div>
                                                                        <div class="col-2 pr-0"><h5>Email:</h5></div>     
                                                                        <div class="col-3"><h5><?php echo $rows['email'] ?></h5></div>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>FB Name :</h4></div>               
                                                                        <div class="col-5"><h4>No database data</h4></div>
                                                                        <div class="col-2 pr-0"></div>     
                                                                        <div class="col-3"></div>
                                                                  </div>
                                    
                                                                  <div class="row text-center mt-2">
                                                                        <h5 class="fw-bold">Address</h5>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Home :</h4></div>               
                                                                        <div class="col-5"><h4>No database data</h4></div>
                                                                        <div class="col-2 pr-0"><h4>Boarding :</h4></div>     
                                                                        <div class="col-3"><h4>No database data</h4></div>
                                                                  </div>
                                                            </div>
                                                            
                                                            <br>
                                                            <div class="row mb-2">
                                                                  <h3 class="fw-bold">Student Informations</h3>
                                                            </div>
                                                            <div class="border border-2 rounded p-3">
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>I.D. No. :</h4></div>     
                                                                        <div class="col-5"><h4><?php echo substr_replace($rows['studentid_no'], " - ", 2, 0) ?></h4></div>
                                                                        <div class="col-2 pr-0"><h4>Status:</h4></div>        
                                                                        <div class="col-3"><h4><?php echo ucfirst($rows['student_status'])?></h4></div>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Year & Section:</h4></div>               
                                                                        <div class="col-5"><h4><?php echo 'Year '.$rows['year'].' - Section '.$rows['section']?></h4></div>
                                                                        <div class="col-2 pr-0"><h4>Standing: </h4></div>     
                                                                        <div class="col-3"><h4><?php echo ($rows['regular'])? 'Regular' : 'Irregular' ?></h4></div>
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
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Name :</h4></div>     
                                                                        <div class="col-5"><h4>No database data</h4></div>
                                                                        <div class="col-2 pr-0"><h4>Contact No:</h4></div>        
                                                                        <div class="col-3"><h4>No database data</h4></div>
                                                                  </div>
                                                                  <div class="row text-center mt-2">
                                                                        <h5 class="fw-bold">Guardian 2</h5>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Name :</h4></div>     
                                                                        <div class="col-5"><h4>No database data</h4></div>
                                                                        <div class="col-2 pr-0"><h4>Contact No:</h4></div>        
                                                                        <div class="col-3"><h4>No database data</h4></div>
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
                                                                  <div class="row">
                                                                        <div class="col-auto pr-0 pb-2"><a href="./activities_page.php" class="btn btn-secondary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pr-0 pb-2"><a href="./activities_page.php" class="btn btn-secondary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pr-0 pb-2"><a href="./activities_page.php" class="btn btn-secondary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pr-0 pb-2"><a href="./activities_page.php" class="btn btn-secondary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pr-0 pb-2"><a href="./activities_page.php" class="btn btn-secondary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                  </div>
                                                                  <div class="row text-center">
                                                                        <h5 class="fw-bold">Competition</h5>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-auto pr-0 pb-2"><a href="./activities_page.php" class="btn btn-warning">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pr-0 pb-2"><a href="./activities_page.php" class="btn btn-warning">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pr-0 pb-2"><a href="./activities_page.php" class="btn btn-warning">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pr-0 pb-2"><a href="./activities_page.php" class="btn btn-warning">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pr-0 pb-2"><a href="./activities_page.php" class="btn btn-warning">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                  </div>
                                                                  <div class="row text-center">
                                                                        <h5 class="fw-bold">Webinar</h5>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-auto pr-0 pb-2"><a href="./activities_page.php" class="btn btn-primary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pr-0 pb-2"><a href="./activities_page.php" class="btn btn-primary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pr-0 pb-2"><a href="./activities_page.php" class="btn btn-primary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pr-0 pb-2"><a href="./activities_page.php" class="btn btn-primary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                        <div class="col-auto pr-0 pb-2"><a href="./activities_page.php" class="btn btn-primary">
                                                                              Activities Page<br>
                                                                              <small>March 3, 2021</small>
                                                                        </a></div>     
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </section>

      
                               <?php 
                        endwhile;
                  }
            endif;

            include './SectionTemplate/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>