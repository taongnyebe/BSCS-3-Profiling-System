<section class="container-fluid bg-back px-5 pb-0 border-dark border-bottom border-5 ">
      <div class="align-items-start w-25 back-left">
      
            <!-- Make this a tab for headings using php -->
            <a href="../Connection/function/f_logout.php" class="btn btn-secondary"><i class="fas fa-home"></i> Home</a> &emsp;
            
            <?php 

                  echo (isset($_SESSION['MainMenu']))?
                              '<a href="./admin_page.php?" class="btn btn-warning">Main Menu</a> &emsp;' 
                              : "";

                  echo (isset($_SESSION['Class']))? 
                              '<a href="./a_section_page.php?page=0" class="btn btn-warning">Section Page</a> &emsp;' 
                              : "";

                  echo (isset($_SESSION['Student']))? 
                              '<a href="./a_s_class_page.php?id='.$_SESSION['section_id'].'" class="btn btn-warning">Class Page</a> &emsp;' 
                              : "";

                  echo (isset($_SESSION['Edit']))? 
                              '<a href="./a_s_c_studentInfo_page.php?id='.$_SESSION['student_id'].'" class="btn btn-warning">Student page</a> &emsp;' 
                              : "";
                  
                  echo (isset($_SESSION['Subject']))? 
                              '<a href="./a_subject_page.php" class="btn btn-warning">Subject Page</a> &emsp;' 
                              : "";
                  
                  echo (isset($_SESSION['Activities']))? 
                              '<a href="./a_activities_page.php" class="btn btn-warning">Activities Page</a> &emsp;' 
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
      <div class="float-end align-items-end row">     
            <?php 
                  echo ($add_btn)? '<a href="'.$add.'" class="btn col"><i class="fa-solid fa-square-plus fa-2x"></i></a> &emsp;':"";
                  // delete prompt will appear with warning "The data of student will permanently deleted and irreversible"
                  echo ($delete_btn)?'<a href="../Connection/function/f_delete_student.php?type='.$datatypeDelete.'" class="btn col"><i class="fa-solid fa-trash-can fa-2x"></i></a> &emsp;':"";
                  echo ($edit_btn)?'<a href="'.$edit.'" class="btn col" ><i class="fa-solid fa-pen-to-square fa-2x"></i></a>':"";
            ?>
      </div>

      <div class="back-right">
            <?php  
                  echo '<h2 class="text-center move-top fw-bold w-50">'.$title.'</h2>';                  
            ?>
            <br>
      

</section>