      <section class="student-data">
            <form action="../_forms/update_add_student_form.php?use=<?php echo $_GET['use']?>&id=<?php echo $id?>" method="post" enctype="multipart/form-data" class='container border border-5 rounded mx-auto shadow p-3 mb-5 bg-body'>
<?php 
      include './templates/profile_card_form_sections/basic_information_card.php';

      $count = 0;
      if ($id)
      {
            $student_Sdata = $ssd->getStudentSchoolDataCurrent($student_data['id']);

            if($student_Sdata != 1 && $student_Sdata != 2)
            {
                        $_SESSION['student_Sid']=$student_Sdata['id'];

                        $yearSection_data = $ys->getSpecificSchYearData($student_Sdata['yearsection_id']);
                        $sch_data = $schyearsem->getDesignatedSchYear($yearSection_data['schyearsemester_id']);
                        if($yearSection_data != 1 && $yearSection_data != 2)
                        {
                                    $_SESSION['return']="class_page.php?year=".$yearSection_data['year']."&section=".$yearSection_data['section'];
                                    $count++;
?>

                                    <br>
                                    <div class="row mb-2">
                                          <h3 class="fw-bold">Student Informations</h3>
                                    </div>
                                    <small>Current</small>
                                    

<?php
                                    include './templates/profile_card_form_sections/student_information_card.php';
                        }
            }
      } else {
            $count++;
      ?>
                                    <br>
                                    <div class="row mb-2">
                                          <h3 class="fw-bold">Student Informations</h3>
                                    </div>
                                    <small>Current</small>
<?php
            include './templates/profile_card_form_sections/student_information_card.php';
      }

      if ($id)
      {
            $student_Sdata = $ssd->getStudentSchoolDataHistory($student_data['id']);
            
            if($student_Sdata != 1)
            {
?>

                                    <div class="mx-5">
                                          <small>History</small>

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
                                          $count++;
                                          include './templates/profile_card_form_sections/student_information_card.php';
                                    }
                              }
                        }
                  }else
                  echo "<h1> Error</h1>";
            }
      }
?>
<input type="hidden" name="ssd-count" value="<?php echo $count ?>">
                              </div>
                              <br>
                              <div class="row mb-2">
                                    <h3 class="fw-bold">Parent/Guardian Informations</h3>
                              </div>
<!-- Guardian Information -->
<?php
      $count = 0;
      if ($id)
      {

            $guardian_data = $gd->getGuardianData($student_data['id']);
            
            if($guardian_data != 1)
            {
                  if($guardian_data != 2)
                  {
                        $i = 0;
                        foreach ($guardian_data as $guardian_data)
                        {
                              $count++;
                              $i++;
                              include './templates/profile_card_form_sections/guardian_card.php';
                        }

                        if ($i == 1) {
                              $count++;
                              $i++;
                              $id = false;
                              include './templates/profile_card_form_sections/guardian_card.php';
                        }
                        
                  }
            }else{
                  for ($i=1; $i <= 2; $i++) { 
                        $count++;
                        $id =false;
                        include './templates/profile_card_form_sections/guardian_card.php';
                  }
            }
      }else{
            for ($i=1; $i <= 2; $i++) {
                  $count++;
                  $id =false;
                  include './templates/profile_card_form_sections/guardian_card.php';
            }
      }
      
?>
<input type="hidden" name="g-count" value="<?php echo $count ?>">

                        </div>
                  </div>
                  <br>
                  <div class="text-end">
                        <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="submit">Submit</button>
                  </div>
            </form>
      </section>