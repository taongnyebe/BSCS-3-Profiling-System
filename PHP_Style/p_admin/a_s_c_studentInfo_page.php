<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="../CSS/header_template1.css">';
      $titleName = "SIMS CS-Org - Admin";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['Student'] = "1";

            $_SESSION['Edit'] = null;
            $_SESSION['image'] = null;
            $_SESSION['image_name'] = null;
            $_SESSION['return'] = null;

            include './templates/header_2.php';
            
            $id = $_GET['id'];

            $title = "Student Informations";
            
            $add = "";
            $edit = "";
            $add_btn = $search_input = false; $edit_btn = $delete_btn = true;
            include './templates/back_tab.php';

            $student_data = $sd->getFullStudentData($id);

            if($student_data != 1 && $student_data != 2)
                  {
                        foreach ($student_data as $student_data) {

                              $_SESSION['id1_delete']=$student_data['id'];
                              $_SESSION['id2_delete']=$student_data['studentschool_id'];
                              $_SESSION['table1_delete']='studentbasic_tb';
                              $_SESSION['table2_delete']='studentschool_tb';
                              $_SESSION['return']="class_page.php?year=".$student_data['year']."&section=".$student_data['section'];
                              ?>

                              <section class="student-data">
                                          <div class="mb-5">
                                                <div class=" p-1 text-center">
                                                      <img src="<?php echo ($student_data['profile_filename'] != "")?
                                                                  '../Assets/profiles/'.$student_data['profile_filename']:
                                                                  "https://avatars.dicebear.com/api/".(($student_data['gender'])? "male": "female")."/".preg_replace('/\s+/', '_', $student_data['first_name']).".svg"?>"
                                                            alt="" class="profile rounded border border-3" style="width: 300px; height: 400px" >
                                                </div>
                                          </div>
                                          <div class="text-center">
                                                <!-- <?php
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
                                                ?> -->
                                          </div>

                                          <div class='container border border-5 rounded mx-auto shadow p-3 mb-5 bg-body'>
                                                <div class="row">
                                                      <div class="col">
                                                            <div class="row mb-2">
                                                                  <h3 class="fw-bold col">Basic Informations</h3>
                                                                  <a href="'.$edit.'" class="btn bg-dark col-md-1"><img src="../Assets/icons/EDIT_ICON.png" alt="" class="extra" ></a>
                                                            </div>
                                                            <div class="border border-2 rounded p-3">
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Name :</h4></div>     
                                                                        <div class="col-5"><h4><?php echo $student_data['family_name'].', '.$student_data['first_name'].' '.(($student_data['middle_name'] != '')? $student_data['middle_name'][0].'. ' : "" ).$student_data['suffix'] ?></h4></div>
                                                                        <div class="col-2 pr-0"><h4>Age :</h4></div>        
                                                                        <div class="col-3"><h4><?php 
                                                                                                      $date = date_format(date_create($student_data['date_of_birth']), 'm/d/Y');
                                                                                                      $birthDate = explode('/', $date);
                                                                                                      echo (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2])); 
                                                                                                ?></h4></div>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Gender :</h4></div>               
                                                                        <div class="col-5"><h4><?php echo ($student_data['gender'])? 'Male' : 'Female' ?></h4></div>
                                                                        <div class="col-2 pr-0"><h4>Birthdate :</h4></div>     
                                                                        <div class="col-3"><h4><?php echo $date ?></h4></div>
                                                                  </div>
                                                                  
                                                                  <div class="row text-center mt-2">
                                                                        <h5 class="fw-bold col">Contact Informations</h5>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Contact No.:</h4></div>               
                                                                        <div class="col-5"><h4><?php if($student_data['contact_number'] != ""){if($student_data['contact_number'][0] == 6) echo "+ ";} echo $student_data['contact_number'] ?></h4></div>
                                                                        <div class="col-2 pr-0"><h5>Email:</h5></div>     
                                                                        <div class="col-3"><h5><?php echo $student_data['email'] ?></h5></div>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>FB Name :</h4></div>               
                                                                        <div class="col-5"><h4><?php echo $student_data['fb_name'] ?></h4></div>
                                                                        <div class="col-2 pr-0"></div>     
                                                                        <div class="col-3"></div>
                                                                  </div>
                                    
                                                                  <div class="row text-center mt-2">
                                                                        <h5 class="fw-bold">Address</h5>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Home :</h4></div>               
                                                                        <div class="col-5"><h4><?php echo $student_data['home'] ?></h4></div>
                                                                        <div class="col-2 pr-0"><h4>Boarding :</h4></div>     
                                                                        <div class="col-3"><h4><?php echo $student_data['boarding'] ?></h4></div>
                                                                  </div>
                                                            </div>
                                                            
                                                            <br>
                                                            <div class="row mb-2">
                                                                  <h3 class="fw-bold col">Student Informations</h3>
                                                                  <a href="'.$edit.'" class="btn bg-dark col-md-1"><img src="../Assets/icons/ADD1.png" alt="" class="extra" ></a>
                                                            </div>
                                                            <small>Current</small>
                                                            <div class="border border-2 rounded p-3">
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>I.D. No. :</h4></div>     
                                                                        <div class="col-4"><h4><?php echo substr_replace($student_data['studentid_no'], " - ", 2, 0) ?></h4></div>
                                                                        <div class="col-2 pr-0"><h4>Status:</h4></div>        
                                                                        <div class="col-3"><h4><?php echo ucfirst($student_data['student_status'])?></h4></div>
                                                                        <a href="'.$edit.'" class="btn bg-dark col-md-1"><img src="../Assets/icons/EDIT_ICON.png" alt="" class="extra" ></a>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Year & Section:</h4></div>               
                                                                        <div class="col-4"><h4><?php echo 'Year '.$student_data['year'].' - Section '.$student_data['section']?></h4></div>
                                                                        <div class="col-2 pr-0"><h4>Standing: </h4></div>     
                                                                        <div class="col-3"><h4><?php echo ($student_data['regular'])? 'Regular' : 'Irregular' ?></h4></div>
                                                                  </div>
                                                            </div>
                                                            
                                                            <br><br>
                                                            <small class="mx-5">History</small>
                                                            <div class="border border-2 rounded p-3 mx-5">
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>I.D. No. :</h4></div>     
                                                                        <div class="col-4"><h4><?php echo substr_replace($student_data['studentid_no'], " - ", 2, 0) ?></h4></div>
                                                                        <div class="col-2 pr-0"><h4>Status:</h4></div>        
                                                                        <div class="col-3"><h4><?php echo ucfirst($student_data['student_status'])?></h4></div>
                                                                        <a href="'.$edit.'" class="btn bg-dark col-md-1"><img src="../Assets/icons/EDIT_ICON.png" alt="" class="extra" ></a>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Year & Section:</h4></div>               
                                                                        <div class="col-4"><h4><?php echo 'Year '.$student_data['year'].' - Section '.$student_data['section']?></h4></div>
                                                                        <div class="col-2 pr-0"><h4>Standing: </h4></div>     
                                                                        <div class="col-3"><h4><?php echo ($student_data['regular'])? 'Regular' : 'Irregular' ?></h4></div>
                                                                  </div>
                                                            </div>
                                                            <br>
                                                            <div class="border border-2 rounded p-3 mx-5">
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>I.D. No. :</h4></div>     
                                                                        <div class="col-4"><h4><?php echo substr_replace($student_data['studentid_no'], " - ", 2, 0) ?></h4></div>
                                                                        <div class="col-2 pr-0"><h4>Status:</h4></div>        
                                                                        <div class="col-3"><h4><?php echo ucfirst($student_data['student_status'])?></h4></div>
                                                                        <a href="'.$edit.'" class="btn bg-dark col-md-1"><img src="../Assets/icons/EDIT_ICON.png" alt="" class="extra" ></a>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Year & Section:</h4></div>               
                                                                        <div class="col-4"><h4><?php echo 'Year '.$student_data['year'].' - Section '.$student_data['section']?></h4></div>
                                                                        <div class="col-2 pr-0"><h4>Standing: </h4></div>     
                                                                        <div class="col-3"><h4><?php echo ($student_data['regular'])? 'Regular' : 'Irregular' ?></h4></div>
                                                                  </div>
                                                            </div>
                                                            
                                                            <br>
                                                            <div class="row mb-2">
                                                                  <h3 class="fw-bold col">Parent/Guardian Informations</h3>
                                                                  <a href="'.$edit.'" class="btn bg-dark col-md-1"><img src="../Assets/icons/EDIT_ICON.png" alt="" class="extra" ></a>
                                                            </div>
                                                            <div class="border border-2 rounded p-3">
                                                                  <div class="row text-center">
                                                                        <h5 class="fw-bold">Guardian 1</h5>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Name :</h4></div>     
                                                                        <div class="col-5"><h4><?php if(isset($student_data['g1_family_name'])) echo $student_data['g1_family_name'].', '.$student_data['g1_first_name'].' '.(($student_data['g1_middle_name'] != '')? $student_data['g1_middle_name'][0].'. ' : "" ).$student_data['g1_suffix'] ?></h4></div>
                                                                        <div class="col-2 pr-0"><h4>Contact No:</h4></div>        
                                                                        <div class="col-3"><h4><?php echo $student_data['g1_contact'] ?></h4></div>
                                                                  </div>
                                                                  <div class="row text-center mt-2">
                                                                        <h5 class="fw-bold">Guardian 2</h5>
                                                                  </div>
                                                                  <div class="row">
                                                                        <div class="col-2 pr-0"><h4>Name :</h4></div>     
                                                                        <div class="col-5"><h4><?php if(isset($student_data['g2_family_name'])) echo $student_data['g2_family_name'].', '.$student_data['g2_first_name'].' '.(($student_data['g2_middle_name'] != '')? $student_data['g2_middle_name'][0].'. ' : "" ).$student_data['g2_suffix'] ?></h4></div>
                                                                        <div class="col-2 pr-0"><h4>Contact No:</h4></div>        
                                                                        <div class="col-3"><h4><?php echo $student_data['g2_contact'] ?></h4></div>
                                                                  </div>
                                                            </div>
                                                            
                                                            <br>
                                                            <div class="row mb-2">
                                                                  <h3 class="fw-bold col">Activities and Research</h3>
                                                                  <a href="'.$edit.'" class="btn bg-dark col-md-1"><img src="../Assets/icons/EDIT_ICON.png" alt="" class="extra" ></a>
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
                        }
                  }

            include './templates/footer.php';

            include_once './MetaScript/script.php';
      ?>

</body>
</html>