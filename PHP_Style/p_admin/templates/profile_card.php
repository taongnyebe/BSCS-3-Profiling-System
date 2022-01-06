<?php 
      $student_data = $sd->getStudentData($id);
            
      if($student_data != 1 && $student_data != 2)
      {
            foreach ($student_data as $student_data) {
                  //$guardian_data = $sd->getGuardianData($student_data['id']);

                  $_SESSION['student_id']=$student_data['id'];
                  $_SESSION['table1_delete']='studentbasic_tb';
                  $_SESSION['table2_delete']='studentschool_tb';
?>

                  <section class="student-data">
                        <!-- Profile Image -->
                        <div class="mb-5">
                              <div class=" p-1 text-center">
                                    <img src="<?php echo ($student_data['profile_filename'] != "")?
                                                '../Assets/profiles/'.$_SESSION['filename']=$student_data['profile_filename']:
                                                "https://avatars.dicebear.com/api/".(($student_data['gender'])? "male": "female")."/".preg_replace('/\s+/', '_', $student_data['first_name']).".svg"?>"
                                          alt="" class="profile rounded border border-3" style="width: 300px; height: 400px" >
                              </div>
                        </div>

                        <div class='container border border-5 rounded mx-auto shadow p-3 mb-5 bg-body'>
                              <div class="row">
                                    <div class="col">
                        
<?php 

                  include './templates/profile_card_sections/basic_information_card.php';
            }
      }else
            echo "<h2> Error ".$student_data." Here</h2>";

      $student_Sdata = $ssd->getStudentSchoolDataCurrent($student_data['id']);
                              
      if($student_Sdata != 1 && $student_Sdata != 2)
      {
            foreach ($student_Sdata as $student_Sdata)
            {
                  $_SESSION['student_Sid']=$student_Sdata['id'];

                  $yearSection_data = $ys->getStudentYearSection($student_Sdata['yearsection_id']);
                  if($student_Sdata != 1 && $student_Sdata != 2)
                  {
                        foreach ($yearSection_data as $yearSection_data) 
                        {
                              $_SESSION['return']="class_page.php?year=".$yearSection_data['year']."&section=".$yearSection_data['section'];
?>
                                    <br>
                                    <div class="row mb-2">
                                          <h3 class="fw-bold col">Student Informations</h3>
                                          <a href="'.$edit.'" class="btn bg-dark col-md-1"><img src="../Assets/icons/ADD1.png" alt="" class="extra" ></a>
                                    </div>
                                    <small>Current</small>
<?php
                              include './templates/profile_card_sections/student_information_card.php'; 
                        }
                  }
            }
      }else
            echo "<h1> Error</h1>";
?>

                                          <br><br>
                                          <small class="mx-5">History</small>

<?php
      
      $student_Sdata = $ssd->getStudentSchoolDataHistory($student_data['id']);
                              
      if($student_Sdata != 1 && $student_Sdata != 2)
      {
            foreach ($student_Sdata as $student_Sdata)
            {
                  $_SESSION['student_Sid']=$student_Sdata['id'];

                  $yearSection_data = $ys->getStudentYearSection($student_Sdata['yearsection_id']);
                  if($student_Sdata != 1 && $student_Sdata != 2)
                  {
                        foreach ($yearSection_data as $yearSection_data) 
                        {
                              include './templates/profile_card_sections/student_information_card.php'; 
                        }
                  }
            }
      }else
            echo "<h1> Error</h1>";
?>
                        
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
                                    <div class="col-5"><h4><?php //if(isset($student_data['g1_family_name'])) echo $student_data['g1_family_name'].', '.$student_data['g1_first_name'].' '.(($student_data['g1_middle_name'] != '')? $student_data['g1_middle_name'][0].'. ' : "" ).$student_data['g1_suffix'] ?></h4></div>
                                    <div class="col-2 pr-0"><h4>Contact No:</h4></div>        
                                    <div class="col-3"><h4><?php //echo $student_data['g1_contact'] ?></h4></div>
                              </div>
                              <div class="row text-center mt-2">
                                    <h5 class="fw-bold">Guardian 2</h5>
                              </div>
                              <div class="row">
                                    <div class="col-2 pr-0"><h4>Name :</h4></div>     
                                    <div class="col-5"><h4><?php //if(isset($student_data['g2_family_name'])) echo $student_data['g2_family_name'].', '.$student_data['g2_first_name'].' '.(($student_data['g2_middle_name'] != '')? $student_data['g2_middle_name'][0].'. ' : "" ).$student_data['g2_suffix'] ?></h4></div>
                                    <div class="col-2 pr-0"><h4>Contact No:</h4></div>        
                                    <div class="col-3"><h4><?php //echo $student_data['g2_contact'] ?></h4></div>
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