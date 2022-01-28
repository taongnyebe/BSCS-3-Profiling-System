      <section class="student-data">
            <form action="../_forms/update_add_student_form.php?use=<?php echo $_GET['use']?>&id=<?php echo $id?>" method="post" enctype="multipart/form-data" class='container border border-5 rounded mx-auto shadow p-3 mb-5 bg-body'>
<?php 
      include './templates/profile_card_form_sections/basic_information_card.php';


?>

                  <br>
                  <div class="row mb-2">
                        <h3 class="fw-bold">Student Informations</h3>
                  </div>
                  <small>Current</small>
                              

<?php
      $count = 1;
                  $yearsection = $ys->getSpecificSchYearData($_SESSION['section_id']);
                  $sch_data = $schyearsem->getDesignatedSchYear($yearsection['schyearsemester_id']);
                  include './templates/profile_card_form_sections/student_information_card.php';
?>
                        <br>
                        <div class="row mb-2">
                              <h3 class="fw-bold">Parent/Guardian Informations</h3>
                        </div>
<?php

      for ($i=1; $i <= 2; $i++) { 
            $id =false;
            include './templates/profile_card_form_sections/guardian_card.php';
      }      
?>
                        </div>
                  </div>
                  <br>
                  <div class="text-end">
                        <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="submit">Submit</button>
                  </div>
            </form>
      </section>