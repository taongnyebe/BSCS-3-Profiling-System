<section class="container-fluid bg-back px-5 pb-0 border-dark border-bottom border-5 ">
      <div class="align-items-start w-25 back-left">
      
            <!-- Make this a tab for headings using php -->
            <a href="./index.php" class="btn btn-secondary"><i class="fas fa-home"></i> Home</a> &emsp;
            
            <?php 

                  echo (isset($_SESSION['Class']))? 
                              '<a href="./section_page.php?page=0" class="btn btn-warning">Section Page</a> &emsp;' 
                              : "";

                  echo (isset($_SESSION['Student']))? 
                              '<a href="./a_s_class_page.php?id='.$_SESSION['section_id'].'" class="btn btn-warning">Class Page</a> &emsp;' 
                              : "";

                  echo (isset($_SESSION['Edit']))? 
                              '<a href="./a_s_c_studentInfo_page.php?id='.$_SESSION['student_id'].'" class="btn btn-warning">Student page</a> &emsp;' 
                              : "";
                  
                  echo (isset($_SESSION['Subject']))? 
                              '<a href="./subject_page.php?page=0" class="btn btn-warning">Subject Page</a> &emsp;' 
                              : "";

                  echo (isset($_SESSION['research']))?
                              '<a href="./research_page.php" class="btn btn-warning">Research Page</a> &emsp;'
                              : "";
                  
                  echo (isset($_SESSION['awards']))?
                              '<a href="./awards_page.php" class="btn btn-warning">Awards Page</a> &emsp;'
                              : "";

                  echo (isset($_SESSION['seminar']))?
                              '<a href="./webinar_page.php" class="btn btn-warning">Seminar Page</a> &emsp;'
                              : "";

                  echo (isset($_SESSION['competition']))?
                              '<a href="./competition_page.php" class="btn btn-warning">Competition Page</a> &emsp;'
                              : "";
                  ?>

      </div>
      
<?php 
      if ($search_input) :
?>
            <div class="float-end row">     
                        <input type="text" class="form-control col" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                      <span class="input-group-text col-2" id="inputGroup-sizing-sm"><i class="fa-solid fa-magnifying-glass"></i></span> &emsp;';
            </div>
            <br>
<?php
      endif;
?>

      <div class="back-right">
            <?php  
                  echo '<h2 class="text-center move-top fw-bold w-50">'.$title.'</h2>';                  
            ?>
            <br>
      

</section>