<div class="border border-2 rounded p-3 mb-3">
      <div class="row">
            <div class="col-2 pr-0"><h4>School Year:</h4></div>               
            <div class="col-5" ><?php echo "";/*
                  Year Start <input disabled type="number" name="sch_year_s-<?php echo $count?>" min="2018" max="2099" step="1" placeholder="" value="<?php if($id) echo substr($yearSection_data['sch_year'], 0, 4); ?>" id="id1"/>
                   - 
                  Year Start <input disabled type="number" name="sch_year_e-<?php echo $count?>" min="2018" max="2099" step="1" placeholder="" value="<?php if($id) echo substr($yearSection_data['sch_year'], 7,11); ?>" id="id2"/>
                  <script type="text/javascript">
                        var date = new Date();
                        var fullYear = date.getFullYear();
                        document.getElementById("id1").setAttribute('placeholder',fullYear);
                        document.getElementById("id2").setAttribute('placeholder',++fullYear);
                  </script>
                  */  ?>
                  <h4><?php echo ($id)? $yearSection_data['sch_year'] : $_SESSION['sch_year']?></h4>
            </div>
            <div class="col-2 pr-0"><h4>Semester: </h4></div>     
            <div class="col-3"><?php echo "";/*
                  <select name="semester-<?php echo $count?>" id="0">
                        <option value='active' <?php if ($id) echo ($yearSection_data['semester']=='1')? "selected": "" ?>>1st Semester</option>
                        <option value='transferee' <?php if ($id) echo ($yearSection_data['semester']=='2')? "selected": "" ?>>2nd Semester</option>
                        <option value='shifter' <?php if ($id) echo ($yearSection_data['semester']=='3')? "selected": "" ?>>Mid Semester</option>
                  </select>*/?>
                  <h4><?php 
                        switch (($id)? ($yearSection_data['semester']) : $_SESSION['semester']) {
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
                  ?> Semester</h4>
            </div>
      </div>
      <div class="row">
            <div class="col-2 pr-0"><h4>Status : <small class="text-danger">*</small></h4></div>        
            <div class="col-5">
                  <select name="status-<?php echo $count?>" id="0">
                        <option value='Active' <?php if($id) echo ($student_Sdata['student_status']=='Active')? "selected": "" ?>>Active</option>
                        <option value='Transferee' <?php if($id) echo ($student_Sdata['student_status']=='Transferee')? "selected": "" ?>>Transferee</option>
                        <option value='Shifter' <?php if($id) echo ($student_Sdata['student_status']=='Shifter')? "selected": "" ?>>Shifter</option>
                        <option value='Drop' <?php if($id) echo ($student_Sdata['student_status']=='Drop')? "selected": "" ?>>Drop</option>
                  </select>
            </div>
            <div class="col-2 pr-0"><h4>Standing : </h4></div>     
            <div class="col-3">
                  <input type="radio" id="1" name="standing-<?php echo $count?>" value="1" class="col" <?php if ($id && $student_Sdata['regular']) echo "checked";?> required>
                  <label for="Regular">Regular</label>
                  <input type="radio" id="0" name="standing-<?php echo $count?>" value="0" class="col" <?php if ($id && !$student_Sdata['regular']) echo "checked";?>>
                  <label for="Irregular">Irregular</label>
            </div>
      </div>
      <div class="row">
            <div class="col-2 pr-0"><h4>Year & Section :<small class="text-danger">*</small></h4></div>               
            <div class="col-5"><?php
                                    echo "<h5>Year ".(($id)?$yearSection_data['year']:$_SESSION['year'])." - ";

                                    if ($id) {
                              ?>
                  <select name="yearsectionid-<?php echo $count?>">
                        <?php 
                              $sections = $ys->getSectionlistYear($yearSection_data['sch_year'], $yearSection_data['semester'], $yearSection_data['year']);
                              if ($sections != 1 && $sections != 2) {
                                    $n=1;
                                    foreach ($sections as $sections) {
                                          $n++;
                                          echo "<option value='".$sections['id']."' ".(($student_Sdata['yearsection_id'] == $sections['id'])? "selected":"" ).">Section ".$sections['section']."</option>";
                                    }
                              } else
                                    echo "<option value='0'>No Category Available</option>";

                              echo "</h5>"
                        ?>
                  </select>
                  <?php } else {
                        echo "Section ".$_SESSION['section']."</h5>";
                        echo '<input type="hidden" name="yearsectionid-'.$count.'" value="'.$_SESSION['section_id'].'">';

                  } ?>
            </div>
            <div class="col-2 pr-0"><h4></h4></div>     
            <div class="col-3"></div>
            <input type="hidden" name="ssd-id-<?php echo $count ?>" value="<?php if($id) echo $student_Sdata['id']?>">
      </div>
</div>