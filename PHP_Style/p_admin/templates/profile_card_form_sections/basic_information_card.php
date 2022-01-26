<div class="mb-5">
      <div class=" p-1 text-center">
            <img src="<?php
                        if ($id) {
                              $_SESSION['image'] = ($student_data['profile_filename'] != "");
                              $_SESSION['image_name'] = $student_data['profile_filename'];
                              echo ($_SESSION['image'])?
                                    '../Assets/profiles/'.$student_data['profile_filename']:
                                    "https://avatars.dicebear.com/api/".(($student_data['gender'])? "male": "female")."/".preg_replace('/\s+/', '_', $student_data['first_name']).".svg";
                        }
                        else {
                              $_SESSION['image'] = null;
                              $_SESSION['image_name'] = null;
                              echo '../Assets/placeholders/starting_profile.png';
                        }
                        ?>" 
                  id='image' alt="" class="profile rounded border border-3" style="width: 300px; height: 400px; object-fit: cover;" >
      </div>
      <div class="p-1 text-center">
            <input type="file" name="profile_img" onchange="readURL(this);" accept=".png,.jpg">
      </div>
</div>
<div class="row">
      <div class="col">
            <div class="row mb-2">
                  <h3 class="fw-bold">Basic Informations</h3>
            </div>
            <div class="border border-2 rounded p-3">
                  <div class="row">
                        <div class="col-2 pr-0"><h4>First Name : <small class="text-danger">*</small></h4></div>     
                        <div class="col-5"><input style="width: 100%" type="text" name="first_name" placeholder="ex. Juan Nico" value="<?php if($id) echo $student_data['first_name']?>" required></div>
                        <div class="col-2 pr-0"><h4>Middle Name :</h4></div>     
                        <div class="col-3"><input style="width: 100%" type="text" name="middle_name" placeholder="ex. Dela Cruz" value="<?php if($id) echo $student_data['middle_name']?>"></div>
                  </div>
                  <div class="row">
                        <div class="col-2 pr-0"><h4>Family Name : <small class="text-danger">*</small></h4></div>     
                        <div class="col-5"><input style="width: 100%" type="text" name="family_name" placeholder="ex. Juan" value="<?php if($id) echo $student_data['family_name']?>" required></div>
                        <div class="col-2 pr-0"><h4>Suffix :</h4></div>     
                        <div class="col-3"><input style="width: 100%" type="text" name="suffix" placeholder="ex. Jr., Sr. III" value="<?php if($id) echo $student_data['suffix']?>"></div>
                  </div>
                  <div class="row">
                        <div class="col-2 pr-0"><h4>Gender : <small class="text-danger">*</small></h4></div>               
                        <div class="col-5">
                              <input type="radio" name="gender" value=1 <?php if($id && $student_data['gender'] == 1) echo "checked"; ?> required>Male
                              <input type="radio" name="gender" value=0 <?php if($id && $student_data['gender'] == 0) echo "checked"; ?>>Female
                        </div>
                        <div class="col-2 pr-0"><h4>Birthdate : <small class="text-danger">*</small></h4></div>     
                        <div class="col-3"><input type="date" id="date_of_birth" name="date_of_birth" value="<?php if($id) echo date($student_data['date_of_birth']);?>" required></div>
                  </div>
                  <div class="row">
                        <div class="col-2 pr-0"><h4>I.D. No. : <small class="text-danger">*</small></h4></div>     
                        <div class="col-5"><input
                                                oninput="javascript: 
                                                            if (this.value.length > this.maxLength) 
                                                                  this.value = this.value.slice(0, this.maxLength);"
                                                style="width: 100%" 
                                                type="number" name="student_id" 
                                                maxlength="6" minlength=6 placeholder="ex. no dash and space" 
                                                value="<?php if($id) echo $student_data['student_id'] ?>" required>
                        </div>
                  </div>
                  <div class="row">
                        <p><small>&emsp; Note: Dont use dash (-). ex. ID No. 17-0321 in the input 170312 </small></p>
                  </div>
                  <div class="row text-center mt-2">
                        <h5 class="fw-bold">Contact Informations</h5>
                  </div>
                  <div class="row">
                        <div class="col-2 pr-0"><h4>Contact No. : <small class="text-danger">*</small></h4></div>               
                        <div class="col-5"><input style="width: 100%" type="tel" name="contact" placeholder="ex. 09xxxxxxxxxx" minlength="11" value="<?php if($id) echo $student_data['contact_number']?>" required></div>
                        <div class="col-2 pr-0"><h4>Email :</h4></div>     
                        <div class="col-3"><input style="width: 100%" type="email" name="email" placeholder="ex. abcdefg1234@gmail.com" value="<?php if($id) echo $student_data['email']?>"></div>
                  </div>
                  <div class="row">
                        <div class="col-2 pr-0"><h4>FB Name :</h4></div>               
                        <div class="col-5"><input style="width: 100%" type="text" name="fb_name" placeholder="ex.dr. Mundo" value="<?php if($id) echo $student_data['fb_name']?>"></div>
                        <div class="col-2 pr-0"></div>     
                        <div class="col-3"></div>
                  </div>
                  
                  <div class="row text-center mt-2">
                        <h5 class="fw-bold">Address</h5>
                  </div>
                  <div class="row">
                        <div class="col-2 pr-0"><h4>Home : <small class="text-danger">*</small></h4></div>               
                        <div class="col-5"><input style="width: 100%" type="text" name="home" placeholder="ex. south west" value="<?php if($id) echo $student_data['home']?>" required></div>
                        <div class="col-2 pr-0"><h4>Boarding :</h4></div>     
                        <div class="col-3"><input style="width: 100%" type="text" name="boarding" placeholder="ex. isabela" value="<?php if($id) echo $student_data['boarding']?>"></div>
                  </div>
            </div>