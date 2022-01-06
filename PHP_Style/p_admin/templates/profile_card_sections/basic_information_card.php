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