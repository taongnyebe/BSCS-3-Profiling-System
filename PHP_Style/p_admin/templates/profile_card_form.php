      <section class="student-data">
            <form action="../_forms/update_add_student_form.php?use=<?php echo $_GET['use']?>&id=<?php echo $id?>" method="post" enctype="multipart/form-data" class='container border border-5 rounded mx-auto shadow p-3 mb-5 bg-body'>
                  <div class="mb-5">
                        <div class=" p-1 text-center">
                              <img src="<?php
                                          if($id){
                                                $_SESSION['image'] = ($student_data['profile_filename'] != "");
                                                $_SESSION['image_name'] = $student_data['profile_filename'];
                                                echo ($_SESSION['image'])?
                                                      '../Assets/profiles/'.$student_data['profile_filename']:
                                                      "https://avatars.dicebear.com/api/".(($student_data['gender'])? "male": "female")."/".preg_replace('/\s+/', '_', $student_data['first_name']).".svg";
                                          }
                                          else{
                                                $_SESSION['image'] = null;
                                                $_SESSION['image_name'] = null;
                                                echo '../Assets/placeholders/starting_profile.png';
                                          }
                                          ?>" 
                                    id='image' alt="" class="profile rounded border border-3" style="width: 300px; height: 400px" >
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
                                    
                                    <div class="row text-center mt-2">
                                          <h5 class="fw-bold">Contact Informations</h5>
                                    </div>
                                    <div class="row">
                                          <div class="col-2 pr-0"><h4>Contact No. : <small class="text-danger">*</small></h4></div>               
                                          <div class="col-5"><input style="width: 100%" type="number" name="contact" placeholder="ex. 09xxxxxxxxxx" value="<?php if($id) echo $student_data['contact_number']?>" required></div>
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
                              
                              <br>
                              <div class="row mb-2">
                                    <h3 class="fw-bold">Student Informations</h3>
                              </div>
                              <div class="border border-2 rounded p-3">
                                    <div class="row">
                                          <div class="col-2 pr-0"><h4>I.D. No. : <small class="text-danger">*</small></h4></div>     
                                          <div class="col-5"><input style="width: 100%" type="number" name="id_no" placeholder="ex. no dash and space" value="<?php if($id) echo $student_data['studentid_no'] ?>"></div>
                                          <div class="col-2 pr-0"><h4>Status : <small class="text-danger">*</small></h4></div>        
                                          <div class="col-3">
                                                <select name="status" id="0">
                                                      <option value='active' <?php if($id) echo ($student_data['student_status']=='active')? "selected": "" ?>>Active</option>
                                                      <option value='transferee' <?php if($id) echo ($student_data['student_status']=='transferee')? "selected": "" ?>>Transferee</option>
                                                      <option value='shifter' <?php if($id) echo ($student_data['student_status']=='shifter')? "selected": "" ?>>Shifter</option>
                                                      <option value='drop' <?php if($id) echo ($student_data['student_status']=='drop')? "selected": "" ?>>Drop</option>
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
                                                            $sections = $ys->getSectionlist();

                                                            if($sections != 1 && $sections != 2)
                                                            {
                                                                  $n=1;
                                                                  foreach ($sections as $sections) 
                                                                  {
                                                                        $n++;
                                                                        echo "<option value='".$sections['id']."' ".(($student_data['yearsection_id'] == $sections['id'])? "selected":"" ).">Year ".$sections['year']." - Section ".$sections['section']."</option>";
                                                                  }
                                                            }else
                                                                  echo "<option value='0'>No Category Available</option>";
                                                      ?>
                                                </select>
                                          </div>
                                          <div class="col-2 pr-0"><h4>Standing : </h4></div>     
                                          <div class="col-3">
                                                <input type="radio" id="1" name="standing" value="1" class="col" <?php if($id && $student_data['regular']) echo "checked";?> required>
                                                <label for="Regular">Regular</label>
                                                <input type="radio" id="0" name="standing" value="0" class="col" <?php if($id && !$student_data['regular']) echo "checked";?>>
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
                                          <div class="col-5"><input style="width: 100%" type="text" name="g1_first_name" placeholder="ex. Juan Nico" value="<?php //if($id) echo $student_data['g1_first_name']?>" required></div>
                                          <div class="col-2 pr-0"><h4>Middle Name :</h4></div>     
                                          <div class="col-3"><input style="width: 100%" type="text" name="g1_middle_name" placeholder="ex. Dela Cruz" value="<?php //if($id) echo $student_data['g1_middle_name']?>"></div>
                                    </div>
                                    <div class="row">
                                          <div class="col-2 pr-0"><h4>Family Name : <small class="text-danger">*</small></h4></div>     
                                          <div class="col-5"><input style="width: 100%" type="text" name="g1_family_name" placeholder="ex. Juan" value="<?php //if($id) echo $student_data['g1_family_name']?>" required></div>
                                          <div class="col-2 pr-0"><h4>Suffix :</h4></div>     
                                          <div class="col-3"><input style="width: 100%" type="text" name="g1_suffix" placeholder="ex. Jr., Sr. III" value="<?php //if($id) echo $student_data['g1_suffix']?>"></div>
                                    </div>

                                    <div class="row">
                                          <div class="col-2 pr-0"><h4>Contact No. : <small class="text-danger">*</small></h4></div>               
                                          <div class="col-5"><input style="width: 100%" type="contect" name="g1_contact" placeholder="ex. 09xxxxxxxxxx" value="<?php //if($id) echo $student_data['g1_contact']?>" required></div>
                                          <div class="col-2 pr-0"></div>     
                                          <div class="col-3"></div>
                                    </div>
                                    <div class="row text-center">
                                          <h5 class="fw-bold">Guardian 2</h5>
                                    </div>
                                    <div class="row">
                                          <div class="col-2 pr-0"><h4>First Name :</h4></div>     
                                          <div class="col-5"><input style="width: 100%" type="text" name="g2_first_name" placeholder="ex. Juan Nico" value="<?php //if($id) echo $student_data['g2_first_name']?>"></div>
                                          <div class="col-2 pr-0"><h4>Middle Name :</h4></div>     
                                          <div class="col-3"><input style="width: 100%" type="text" name="g2_middle_name" placeholder="ex. Dela Cruz" value="<?php //if($id) echo $student_data['g2_middle_name']?>"></div>
                                    </div>
                                    <div class="row">
                                          <div class="col-2 pr-0"><h4>Family Name :</h4></div>     
                                          <div class="col-5"><input style="width: 100%" type="text" name="g2_family_name" placeholder="ex. Juan" value="<?php //if($id) echo $student_data['g2_family_name']?>"></div>
                                          <div class="col-2 pr-0"><h4>Suffix :</h4></div>     
                                          <div class="col-3"><input style="width: 100%" type="text" name="g2_suffix" placeholder="ex. Jr., Sr. III" value="<?php //if($id) echo $student_data['g2_suffix']?>"></div>
                                    </div>

                                    <div class="row">
                                          <div class="col-2 pr-0"><h4>Contact No. :</h4></div>               
                                          <div class="col-5"><input style="width: 100%" type="contect" name="g2_contact" placeholder="ex. 09xxxxxxxxxx" value="<?php //if($id) echo $student_data['g2_contact']?>"></div>
                                          <div class="col-2 pr-0"></div>     
                                          <div class="col-3"></div>
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