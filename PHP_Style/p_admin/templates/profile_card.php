      <section class="student-data">
<?php 
      include './templates/profile_card_sections/basic_information_card.php';

      include './templates/profile_card_sections/student_information_card.php';   

      include './templates/profile_card_sections/guardian_information_card.php';       
?>
                        <br>
                        <div class="row mb-2">
                              <h3 class="fw-bold col">Activities and Research</h3>
                              <a href="'.$edit.'" class="btn bg-dark col-md-1"><img src="../Assets/icons/add_icon.png" alt="" class="extra" ></a>
                        </div>
                        <div class="border border-2 rounded p-3">
<?php 
                        include './templates/profile_card_sections/reaserch_information_card.php';
                        
                        include './templates/profile_card_sections/awards_information_card.php';

                        include './templates/profile_card_sections/competition_information_card.php';

                        include './templates/profile_card_sections/webinar_information_card.php';
?>
                        </div>
                  </div>
            </div>
      </div>
</section>