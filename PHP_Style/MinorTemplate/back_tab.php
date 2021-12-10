<section class="container-fluid bg-back px-5 pb-0 border-dark border-bottom border-5">
      <div class="align-items-start w-25 back-left">
      
            <!-- Make this a tab for headings using php -->
            <a href="./Connection/logout.php" class="btn btn-secondary"><i class="fas fa-home"></i></a> &emsp;
            <!-- <a href="./Connection/logout.php" class="btn btn-secondary">Home</a> &emsp; -->
            
            <?php 

                  echo (isset($_SESSION['MainMenu']))?'<a href="./admin_page.php?back=1" class="btn btn-warning">Main Menu</a> &emsp;' : "";

                  echo (isset($_SESSION['Class']))? '<a href="./section_page.php" class="btn btn-warning">Section Page</a> &emsp;' : "";
                  echo (isset($_SESSION['Student']))? '<a href="./class_page.php?title='.$_SESSION['Class'].'" class="btn btn-warning">Class Page</a> &emsp;' : "";
                  
                  echo (isset($_SESSION['Subject']))? '<a href="./subject_page.php" class="btn btn-warning">Subject Page</a> &emsp;' : "";
                  
                  echo (isset($_SESSION['Activities']))? '<a href="./activities_page.php" class="btn btn-warning">Activities Page</a> &emsp;' : "";
            ?>

      </div>

      <div class="float-end">     

            <?php 
                  echo ($button>1 && $button<4)?'<a href="./" class="btn"><img src="./Assets/icons/AWARDS_ICON.png" alt="" class="extra" ></a> &emsp;':"";
                  echo ($button>3)?'<a href="./" class="btn"><img src="./Assets/icons/DELETE_ICON.png" alt="" class="extra" ></a> &emsp; <a href="./" class="btn float-end"><img src="./Assets/icons/EDIT_ICON.png" alt="" class="extra" ></a>':"";
            ?>
      </div>

      <div class="back-right">
            <?php  
                  echo '<h2 class="text-center move-top fw-bold w-50">'.$title.'</h2>';
                  echo ($button>3)?'<h4 class="text-center mx-auto mb-0 w-50">'.$subtitle.'</h4>':"";
                  
            ?>
            <br>
      

</section>