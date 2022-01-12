<div class="checklist border rounded mb-3">
      <div class="col"><input type="checkbox" name="" value=""></div>
      <div class="col text-center name"><h3><?php echo $student_data['family_name'].", ".$student_data['first_name']?></h3></div>
      <div class="col text-center"><h5><?php echo substr_replace($student_data['student_id'], " - ", 2, 0) ?></h5></div>
      <div class="btn rounded-pill bg-primary w-100">Regular</div>
      <div class="text-center mt-1">
            <select name="student_status" id="0">
                  <option value='1'>Active</option>";
                  <option value='2'>Drop Out</option>";
                  <option value='3'>Transferee</option>";
            </select>
      </div>
</div>