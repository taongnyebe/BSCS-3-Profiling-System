<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="../CSS/header_template1.css">'."\n"
                  .'<link rel="stylesheet" href="../CSS/cardcss.css">'."\n";
      $titleName = "SIMS CS-Org - Webinars";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $id = $_GET["id"];
            $subject=$subj->getSubjectCardDataSpecific($id);
            
            $_SESSION['Subject'] = $subject['code'].' - '.$subject['title'] ;
            include './templates/header_2.php';

            $title = $_SESSION['Subject'];
            
            $add = "";
            $edit = "./a_su_subjectInfo_page_update.php?use=Update&s_id=".$id;
            $add_btn = $search_input = $delete_btn = false; $edit_btn = true;
            include './templates/back_tab.php';
      ?>

      <section>

            <div class="mb-2">
                  <div class=" p-1 text-center">
                        <img src="<?php
                                    if ($id || isset($_GET['s_id'])) {
                                          echo (isset($subject['filename']))?
                                                '../Assets/profiles/'.$student_data['profile_filename']:
                                                "https://avatars.dicebear.com/api/initials/".$subject['title'].".svg";
                                    }
                                    else {
                                          $_SESSION['image'] = null;
                                          $_SESSION['image_name'] = null;
                                          echo '../Assets/placeholders/starting_profile.png';
                                    }
                                    ?>"
                              alt="" class="profile rounded shadow" style="width: 300px; height: 400px; object-fit: cover;" >
                  </div>
            </div>
            <br>
            <div class="p-5 mx-auto container shadow">
                  <div class="row text-center">
                        <h2>Professor/s In charge</h2>
                  </div>
                  <br>
                  <div class="row">
                        <td style="display: block; height: 100px; overflow-y: auto">
                        <?php echo $subject['description'] ?>
                        </td>
                  </div>
            </div>
            <?php
                  if (isset($subject['prerequisite']) && $subject['prerequisite'] != "") {
            ?>
            <br>
            <div class="row container mx-auto">
                  <div class="col shadow border m-2">
                        <div class="row">
                              <h4>Pre-requisite</h4>
                        </div>
                        <div class="row">
                              <h5><?php echo $subject['prerequisite']?></h5>
                        </div>
                  </div>
                  <div class="col m-2">
                  </div>
            </div>
            <?php 
                  }
            ?>

            <br><br>

            <div class="row container mx-auto  shadow border">
                  <div class="row m-3">
                        <div class="col">
                              <h4>Students</h4>
                        </div>
                        <div class="grid-container grid-container--fit">
                              <?php for ($i=0; $i < 5; $i++) { ?>
                              <a href="" class="btn btn-primary m-3 border" style="height: 250px;">
                                    <img src="https://avatars.dicebear.com/api/avataaars/<?php echo rand() ?>.svg" alt="" class="rounded-circle bg-light mx-auto mt-3" style="height: 100px; width: 100px">
                                          
                                    </img>
                                    <div class="grid-element text-center h3 mb-0">
                                          <script type='text/javascript'>
                                                consonnants = [
                                                      'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 
                                                      'n', 'p', 'r', 's', 't', 'th', 'v', 'x', 'z'];
                                                vowels = ['a', 'au', 'e', 'i', 'o', 'ou', 'u', 'y'];
      
                                                name = "";
                                                length = Math.floor(Math.random() * 3) + 2; 
                                                for (i = 0; i < length; i++)
                                                      name += (consonnants[Math.floor(Math.random()*consonnants.length)]
                                                                  + vowels[Math.floor(Math.random()*vowels.length)]);
                                                name = name.charAt(0).toUpperCase() + name.slice(1);
                                                document.write("<p id='name'>" + name + "</p>"); 
                                          </script>
                                    </div>
                              </a>
                              <?php } ?>
                        </div>
                        <div class="grid-container grid-container--fit">
                              <?php for ($i=0; $i < 5; $i++) { ?>
                              <a href="" class="btn btn-primary m-3 border" style="height: 250px;">
                                    <img src="https://avatars.dicebear.com/api/avataaars/<?php echo rand() ?>.svg" alt="" class="rounded-circle bg-light mx-auto mt-3" style="height: 100px; width: 100px">
                                          
                                    </img>
                                    <div class="grid-element text-center h3 mb-0">
                                          <script type='text/javascript'>
                                                consonnants = [
                                                      'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 
                                                      'n', 'p', 'r', 's', 't', 'th', 'v', 'x', 'z'];
                                                vowels = ['a', 'au', 'e', 'i', 'o', 'ou', 'u', 'y'];
      
                                                name = "";
                                                length = Math.floor(Math.random() * 3) + 2; 
                                                for (i = 0; i < length; i++)
                                                      name += (consonnants[Math.floor(Math.random()*consonnants.length)]
                                                                  + vowels[Math.floor(Math.random()*vowels.length)]);
                                                name = name.charAt(0).toUpperCase() + name.slice(1);
                                                document.write("<p id='name'>" + name + "</p>"); 
                                          </script>
                                    </div>
                              </a>
                              <?php } ?>
                        </div>
                        <div class="grid-container grid-container--fit">
                              <?php for ($i=0; $i < 5; $i++) { ?>
                              <a href="" class="btn btn-primary m-3 border" style="height: 250px;">
                                    <img src="https://avatars.dicebear.com/api/avataaars/<?php echo rand() ?>.svg" alt="" class="rounded-circle bg-light mx-auto mt-3" style="height: 100px; width: 100px">
                                          
                                    </img>
                                    <div class="grid-element text-center h3 mb-0">
                                          <script type='text/javascript'>
                                                consonnants = [
                                                      'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 
                                                      'n', 'p', 'r', 's', 't', 'th', 'v', 'x', 'z'];
                                                vowels = ['a', 'au', 'e', 'i', 'o', 'ou', 'u', 'y'];
      
                                                name = "";
                                                length = Math.floor(Math.random() * 3) + 2; 
                                                for (i = 0; i < length; i++)
                                                      name += (consonnants[Math.floor(Math.random()*consonnants.length)]
                                                                  + vowels[Math.floor(Math.random()*vowels.length)]);
                                                name = name.charAt(0).toUpperCase() + name.slice(1);
                                                document.write("<p id='name'>" + name + "</p>"); 
                                          </script>
                                    </div>
                              </a>
                              <?php } ?>
                        </div>
                        <div class="grid-container grid-container--fit">
                              <?php for ($i=0; $i < 5; $i++) { ?>
                              <a href="" class="btn btn-primary m-3 border" style="height: 250px;">
                                    <img src="https://avatars.dicebear.com/api/avataaars/<?php echo rand() ?>.svg" alt="" class="rounded-circle bg-light mx-auto mt-3" style="height: 100px; width: 100px">
                                          
                                    </img>
                                    <div class="grid-element text-center h3 mb-0">
                                          <script type='text/javascript'>
                                                consonnants = [
                                                      'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 
                                                      'n', 'p', 'r', 's', 't', 'th', 'v', 'x', 'z'];
                                                vowels = ['a', 'au', 'e', 'i', 'o', 'ou', 'u', 'y'];
      
                                                name = "";
                                                length = Math.floor(Math.random() * 3) + 2; 
                                                for (i = 0; i < length; i++)
                                                      name += (consonnants[Math.floor(Math.random()*consonnants.length)]
                                                                  + vowels[Math.floor(Math.random()*vowels.length)]);
                                                name = name.charAt(0).toUpperCase() + name.slice(1);
                                                document.write("<p id='name'>" + name + "</p>"); 
                                          </script>
                                    </div>
                              </a>
                              <?php } ?>
                        </div>

                  </div>
            </div>
      </section>

      <?php
            include './templates/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>     