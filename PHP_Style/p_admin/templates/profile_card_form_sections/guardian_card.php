
<div class="border border-2 rounded p-3 mb-3">
      <div class="row text-center">
            <h5 class="fw-bold">Guardian <?php echo $i ?></h5>
      </div>
      <div class="row ">
            <div class="col-2 pr-0"><h4>First Name : <small class="text-danger">*</small></h4></div>     
            <div class="col-5"><input style="width: 100%" type="text" name="g_first_name-<?php echo $count?>" placeholder="ex. Juan Nico" value="<?php if($id) echo $guardian_data['first_name']?>"></div>
            <div class="col-2 pr-0"><h4>Middle Name :</h4></div>     
            <div class="col-3"><input style="width: 100%" type="text" name="g_middle_name-<?php echo $count?>" placeholder="ex. Dela Cruz" value="<?php if($id) echo $guardian_data['middle_name']?>"></div>
      </div>
      <div class="row">
            <div class="col-2 pr-0"><h4>Family Name : <small class="text-danger">*</small></h4></div>     
            <div class="col-5"><input style="width: 100%" type="text" name="g_family_name-<?php echo $count?>" placeholder="ex. Juan" value="<?php if($id) echo $guardian_data['family_name']?>"></div>
            <div class="col-2 pr-0"><h4>Suffix :</h4></div>     
            <div class="col-3"><input style="width: 100%" type="text" name="g_suffix-<?php echo $count?>" placeholder="ex. Jr., Sr. III" value="<?php if($id) echo $guardian_data['suffix']?>"></div>
      </div>

      <div class="row">
            <div class="col-2 pr-0"><h4>Affiliation : <small class="text-danger">*</small></h4></div>               
            <div class="col-5"><input style="width: 100%" type="text" name="connection-<?php echo $count?>" placeholder="ex. Father/Mother" value="<?php if($id) echo $guardian_data['connection']?>"></div>
            <div class="col-2 pr-0"><h4>Contact No. : <small class="text-danger">*</small></h4></div>               
            <div class="col-3"><input style="width: 100%" type="tel" name="g_contact-<?php echo $count?>" placeholder="ex. 09xxxxxxxxxx" value="<?php if($id) echo $guardian_data['contact']?>"></div>
      </div>
      <input type="hidden" name="g-id-<?php echo $count ?>" value="<?php if($id) echo $guardian_data['id']?>">
</div>