
<div class="border border-2 rounded p-3 mb-3">
      <div class="row text-center">
            <h5 class="fw-bold">Guardian <?php echo $i?></h5>
      </div>
      <div class="row">
            <div class="col-2 pr-0"><h4>Name :</h4></div>     
            <div class="col-5"><h4><?php echo ($id)? $guardian_data['first_name']." ".(($guardian_data['middle_name'] != '')? $guardian_data['middle_name'][0].'. ' : "" )." ".$guardian_data['family_name']." ".$guardian_data['suffix'] : "No Input" ?></h4></div>
            <div class="col-2 pr-0"><h4>Contact No :</h4></div>        
            <div class="col-3"><h4><?php echo ($id)? $guardian_data['contact'] : "No Input"?></h4></div>
            <div class="col-2 pr-0"><h4>Relationship :</h4></div>        
            <div class="col-3"><h4><?php echo ($id)? $guardian_data['connection'] : "No Input"?></h4></div>
      </div>
</div>