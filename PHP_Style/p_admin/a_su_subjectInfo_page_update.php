<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="../CSS/header_template1.css">'."\n"
                  .'<link rel="stylesheet" href="../CSS/cardcss.css">'."\n"
                  .'<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>'."\n"
                  .'<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>';
      $titleName = "SIMS CS-Org - Subject";

      include_once './MetaScript/meta.php'
?>

<body style="height: 100vh">

      <?php 
            $id = (isset($_GET["id"]))? $_GET["id"] : "";
            
            $_SESSION['Subject'] = (isset($_GET["id"]))? $userdata['code'].' - '.$userdata['title'] : true;
            include './templates/header_2.php';

            $title = (isset($_GET["id"]))? $_SESSION['Subject'] : (($_GET['use'] == 'Add')? "Add Subject" : "Update Subject");

            if (isset($_GET['s_id'])) $subject = $subj->getSubjectCardDataSpecific($_GET['s_id']);
            
            $add = "";
            $edit = "";
            $add_btn = $edit_btn = $search_input = $delete_btn = false;
            include './templates/back_tab.php';
      ?>

      <section >
            <form action="" method="post">
                  <div class="mb-5">
                        <div class=" p-1 text-center">
                              <img src="<?php
                                          if ($id || isset($_GET['s_id'])) {
                                                echo (isset($subject['filename']))?
                                                      '../Assets/profiles/'.$subject['filename']:
                                                      "https://avatars.dicebear.com/api/initials/".$subject['title'].".svg";
                                          }
                                          else {
                                                $_SESSION['image'] = null;
                                                $_SESSION['image_name'] = null;
                                                echo '../Assets/placeholders/starting_profile.png';
                                          }
                                          ?>" 
                                    id='image' alt="" class="profile rounded border border-3 shadow" style="width: 300px; height: 400px; object-fit: cover;" >
                        </div>
                        <div class="p-1 text-center">
                              <input type="file" name="profile_img" onchange="readURL(this);" accept=".png,.jpg">
                        </div>
                  </div>
                  <br>
                  <div class="shadow container mx-auto">
                        
                        <div class="px-5 pt-5">
                              <div class="row text-center">
                                    <div class="col">
                                          <h3>Subject Name</h3>
                                    </div>
                                    <div class="col">
                                          <h3>Subject Code</h3>
                                    </div>
                              </div>
                              <div class="row text-center">
                                    <div class="col">
                                          <input class="w-50 text-center h4" type="text" name="s_name" value="<?php if (isset($_GET['s_id'])) echo $subject['title'] ?>">
                                    </div>
                                    <div class="col">
                                          <input class="w-50 text-center h4" type="text" name="s_code" value="<?php if (isset($_GET['s_id'])) echo $subject['code'] ?>">
                                    </div>
                              </div>
                              <div class="row text-center">
                                    <div class="col">
                                          <h3>School Year</h3>
                                    </div>
                                    <div class="col">
                                          <h3>Semester</h3>
                                    </div>
                              </div>
                              <div class="row text-center">
                                    <div class="col">
                                          <input class="w-50 text-center h4" type="text" name="sch_year" value="<?php echo 1 ?>">
                                    </div>
                                    <div class="col">
                                          <input class="w-50 text-center h4" type="text" name="semester" value="<?php echo 1 ?>">
                                    </div>
                              </div>
                              <div class="row text-center">
                                    <div class="col">
                                          <h3>Proffesor in Charge</h3>
                                    </div>
                              </div>
                              <div class="row text-center">
                                    <div class="col">
                                          <input class="w-50 text-center h4" type="text" name="s_name" id="">
                                    </div>
                              </div>
                              <br>
                              <div class="row">
                                    <div class="col">
                                          <h5>Description</h5>
                                    </div>
                              </div>
                              <div class="row">
                                    <td style="display: block; height: 100px; overflow-y: auto">
                                          <textarea name="description" id="" cols="30" rows="10">
                                                <?php if (isset($_GET['s_id'])) echo $subject['description'] ?>
                                          </textarea>
                                    </td>
                              </div>
                        </div>
                        <div class="row container px-5 py-4 mx-auto">
                              <div class="col">
                                    <div class="row">
                                          <h4>Pre-requisite</h4>
                                    </div>
                                    <div class="row h5">
                                          <select name="prereq" id="0">
                                                <option value='' selected>None</option>
      
                                                <?php 
                                                      $subject = $subj->getSubjectTitles();
                                                      if ($subject != 1 && $subject != 2) {
                                                            foreach ($subject as $subject) {
                                                ?>
                                                                  <option value='<?php echo $subject['id'] ?>'><?php echo $subject['title']." - ".$subject['code'] ?></option>
                                                <?php 
                                                            }
                                                      }
                                                ?>
                                          </select>
                                    </div>
                              </div>
                              <div class="col text-end">
                                    <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="submit">Submit</button>
                              </div>
                        </div>
                  </div>
            </form>

            
      </section>

      <?php
            include './templates/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>     