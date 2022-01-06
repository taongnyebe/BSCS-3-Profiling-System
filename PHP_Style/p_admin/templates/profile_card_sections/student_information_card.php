<div class="border border-2 rounded p-3">
      <div class="row">
            <div class="col-2 pr-0"><h4>I.D. No. :</h4></div>     
            <div class="col-4"><h4><?php echo substr_replace($student_Sdata['studentid_no'], " - ", 2, 0) ?></h4></div>
            <div class="col-2 pr-0"><h4>Status:</h4></div>        
            <div class="col-3"><h4><?php echo ucfirst($student_Sdata['student_status'])?></h4></div>
            <a href="'.$edit.'" class="btn bg-dark col-md-1"><img src="../Assets/icons/EDIT_ICON.png" alt="" class="extra" ></a>
      </div>
      <div class="row">
            <div class="col-2 pr-0"><h4>Year & Section:</h4></div>               
            <div class="col-4"><h4><?php echo 'Year '.$yearSection_data['year'].' - Section '.$yearSection_data['section']?></h4></div>
            <div class="col-2 pr-0"><h4>Standing: </h4></div>     
            <div class="col-3"><h4><?php echo ($student_Sdata['regular'])? 'Regular' : 'Irregular' ?></h4></div>
      </div>
</div>