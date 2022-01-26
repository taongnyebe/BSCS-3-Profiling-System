<!-- Guardian Information -->
      <br>
      <div class="row mb-2">
            <h3 class="fw-bold col">Parent/Guardian Informations</h3>
      </div>
<?php

      $guardian_data = $gd->getGuardianData($student_data['id']);

      if($guardian_data != "1")
      {
            if($guardian_data != 2)
            {
                  $i = 0;
                  foreach ($guardian_data as $guardian_data)
                  {
                        $i++;
                        include './templates/profile_card_sections/_guardian_card.php';
                  }
                  
            }else{
                  for ($i=1; $i <= 2; $i++) { 
                        include './templates/profile_card_sections/_guardian_card.php';
                  }
            }
      }else{
            $id = false;
            $i = 1;
            include './templates/profile_card_sections/_guardian_card.php';

      }
?>