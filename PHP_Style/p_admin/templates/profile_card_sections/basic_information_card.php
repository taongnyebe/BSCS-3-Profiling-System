<!-- Basic Information -->
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

                        <!-- Profile Image -->
                        <div class="mb-5">
                              <div class="p-1 text-center">
                                    <img src="<?php echo ($student_data['profile_filename'] != "")?
                                                '../Assets/profiles/'.$_SESSION['filename']=$student_data['profile_filename']:
                                                "https://avatars.dicebear.com/api/".(($student_data['sex'])? "male": "female")."/".preg_replace('/\s+/', '_', $student_data['first_name']).".svg"?>"
                                          alt="" class="p-3 profile rounded border border-3 shadow" style="width: 300px; height: 400px; object-fit: cover;" >
                              </div>
                        </div>

                        <div class='container border border-5 rounded mx-auto shadow p-3 mb-5 bg-body'>
                              <div class="row">
                                    <div class="col">
                        
                                          <div class="row mb-2">
                                                      <h3 class="fw-bold col">Basic Informations</h3>
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
                                                            <div class="col-2 pr-0"><h4>Sex :</h4></div>               
                                                            <div class="col-5"><h4><?php echo ($student_data['sex'])? 'Male' : 'Female' ?></h4></div>
                                                            <div class="col-2 pr-0"><h4>Birthdate :</h4></div>     
                                                            <div class="col-3"><h4><?php echo $date ?></h4></div>
                                                      </div>
                                                      <div class="row">
                                                            <div class="col-2 pr-0"><h4>I.D. No :</h4></div>     
                                                            <div class="col-4"><h4><?php echo substr_replace($student_data['student_id_no'], " - ", 2, 0) ?></h4></div>
                                                      </div>
                                                      <div class="row text-center mt-2">
                                                            <h5 class="fw-bold col">Contact Informations</h5>
                                                      </div>
                                                      <div class="row">
                                                            <div class="col-2 pr-0"><h4>Contact No.:</h4></div>               
                                                            <div class="col-5"><h4><?php if ($student_data['contact_number'] != ""){
                                                                                                if ($student_data['contact_number'][0] == 6) echo "+ ";
                                                                                          } echo $student_data['contact_number'] ?></h4></div>
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
                                                            <div class="col-2 pr-0"><h4>Permanent :</h4></div>               
                                                            <div class="col-5"><h4><?php echo $student_data['permanent_address'] ?></h4></div>
                                                            <div class="col-2 pr-0"><h4>Current :</h4></div>     
                                                            <div class="col-3"><h4><?php echo $student_data['current_address'] ?></h4></div>
                                                      </div>
                                                </div>
<?php 

            }
      }else
      echo "<h2> Error ".$student_data." Here</h2>";
?>