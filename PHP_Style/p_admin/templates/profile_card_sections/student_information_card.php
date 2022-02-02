<!-- Student Information -->
                              <br>
                              <div class="row mb-2">
                                    <h3 class="fw-bold col">Student Informations</h3>
                              </div>
                              <small>Current</small>
<?php 

      $student_Sdata = $ssd->getStudentSchoolDataCurrent($student_data['id']);
                              
      if($student_Sdata != 1 && $student_Sdata != 2)
      {
            $_SESSION['student_Sid']=$student_Sdata['id'];

            $yearSection_data = $ys->getSpecificSchYearData($student_Sdata['yearsection_id']);
            $sch_data = $schyearsem->getDesignatedSchYear($yearSection_data['schyearsemester_id']);
            if($yearSection_data != 1 && $yearSection_data != 2)
            {
                  $_SESSION['return']="class_page.php?year=".$yearSection_data['year']."&section=".$yearSection_data['section'];
?>
                  <div class="border border-2 rounded p-3 mb-3">
                        <div class="row">
                              <div class="col-2 pr-0"><h4>School Year:</h4></div>               
                              <div class="col-4"><h4><?php echo $sch_data['sch_year']?></h4></div>
                              <div class="col-2 pr-0"><h4>Semester: </h4></div>     
                              <div class="col-3"><h4><?php 
                                                      switch ($sch_data['semester']) {
                                                            case 1:
                                                                  echo "1st";
                                                                  break;
                                                            case 2:
                                                                  echo "2nd";
                                                                  break;
                                                            case 3:
                                                                  echo "Mid";
                                                                  break;
                                                            }
                                                            ?> Semester</h4></div>
                              <a href="'.$edit.'" class="btn col-md-1"><i class="fa-solid fa-pen-to-square fa-2x"></i></a>
                        </div>
                        <div class="row">
                              <div class="col-2 pr-0"><h4>Status:</h4></div>        
                              <div class="col-4"><h4><?php echo ucfirst($student_Sdata['student_status'])?></h4></div>
                              <div class="col-2 pr-0"><h4>Standing: </h4></div>     
                              <div class="col-3"><h4><?php echo ($student_Sdata['regular'])? 'Regular' : 'Irregular' ?></h4></div>
                        </div>
                        <div class="row">
                              <div class="col-2 pr-0"><h4>Year & Section:</h4></div>               
                              <div class="col-4"><h4><?php echo 'Year '.$yearSection_data['year'].' - Section '.$yearSection_data['section']?></h4></div>
                              <div class="col-2 pr-0"></div>     
                              <div class="col-3"></div>
                        </div>
                  </div>

<?php 
            }
      }else
            echo "<h1> Errors</h1>";

      
      $student_Sdata = $ssd->getStudentSchoolDataHistory($student_data['id']);

      if($student_Sdata != 1)
      {
?>
            <div class="mx-5">
                  <small>History</small>
<?php 
            foreach ($student_Sdata as $student_Sdata)
            {
                  $yearSection_data = $ys->getSpecificSchYearData($student_Sdata['yearsection_id']);
                  $sch_data = $schyearsem->getDesignatedSchYear($yearSection_data['schyearsemester_id']);
                  if($student_Sdata != 2)
                  {
                        $_SESSION['student_Sid']=$student_Sdata['id'];
                        
                        $yearSection_data = $ys->getStudentYearSection($student_Sdata['yearsection_id']);
                        if($student_Sdata != 1 && $student_Sdata != 2)
                        {
                              foreach ($yearSection_data as $yearSection_data) 
                              {
?>
                              <div class="border border-2 rounded p-3 mb-3">
                                    <div class="row">
                                          <div class="col-2 pr-0"><h4>School Year:</h4></div>               
                                          <div class="col-4"><h4><?php echo $sch_data['sch_year']?></h4></div>
                                          <div class="col-2 pr-0"><h4>Semester: </h4></div>     
                                          <div class="col-3"><h4><?php 
                                                                  switch ($sch_data['semester']) {
                                                                        case 1:
                                                                              echo "1st";
                                                                              break;
                                                                        case 2:
                                                                              echo "2nd";
                                                                              break;
                                                                        case 3:
                                                                              echo "Mid";
                                                                              break;
                                                                        }
                                                                        ?> Semester</h4></div>
                                          <a href="'.$edit.'" class="btn col-md-1"><i class="fa-solid fa-pen-to-square fa-2x"></i></a>

                                    </div>
                                    <div class="row">
                                          <div class="col-2 pr-0"><h4>Status:</h4></div>        
                                          <div class="col-4"><h4><?php echo ucfirst($student_Sdata['student_status'])?></h4></div>
                                          <div class="col-2 pr-0"><h4>Standing: </h4></div>     
                                          <div class="col-3"><h4><?php echo ($student_Sdata['regular'])? 'Regular' : 'Irregular' ?></h4></div>
                                    </div>
                                    <div class="row">
                                          <div class="col-2 pr-0"><h4>Year & Section:</h4></div>               
                                          <div class="col-4"><h4><?php echo 'Year '.$yearSection_data['year'].' - Section '.$yearSection_data['section']?></h4></div>
                                          <div class="col-2 pr-0"></div>     
                                          <div class="col-3"></div>
                                    </div>
                              </div>
<?php 

                              }
                        }
                  }
            }
            }else
                  echo "<h1> Error</h1>";
?>
            </div>
