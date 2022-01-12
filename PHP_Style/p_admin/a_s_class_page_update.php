<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="../CSS/header_template1.css">'
      .'<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />'."\n"
      .'<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>'."\n"
      .'<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>';
      $titleName = "SIMS CS-Org - Class ".$_GET['use'];

      include_once './MetaScript/meta.php'
?>

<body>

<?php 
            include './templates/header_2.php';

            $title = $_GET['use']." Class";
            $_SESSION['Class'] = true;

            $add = "";
            $edit = "";
            $add_btn = $edit_btn = $search_input = $delete_btn = false;
            include './templates/back_tab.php';

?>
      <section>
            <form action="../_forms/update_add_sections_form.php?use=<?php echo $_GET['use']?>&id=<?php echo $_SESSION['section_id'] ?? 0 ?>" method="post" enctype="multipart/form-data">
                  <div class=" p-1 text-center">
                        <img src="<?php
                                    if($_GET['use'] == "UPDATE"){
                                          $_SESSION['image_name'] = $student_data['profile_filename'];
                                          echo ($_SESSION['image'])?
                                                '../Assets/profiles/'.$student_data['profile_filename']:
                                                "https://avatars.dicebear.com/api/avatars-identicon-sprites/".preg_replace('/\s+/', '_', $student_data['first_name']).".svg";
                                    }
                                    else{
                                          unset($_SESSION['image'], $_SESSION['image_name']);
                                          echo "https://avatars.dicebear.com/api/identicon/initial.svg";
                                    }
                                    ?>" 
                              id='image' alt="" class="profile rounded border border-3" style="width: 300px; height: 400px" >
                  </div>
                  <div class="p-1 text-center">
                        <input type="file" name="profile_img" onchange="readURL(this);" accept=".png,.jpg">
                  </div>

                  <div class="text-center">
                        <h1><?php echo 'Bachelor of Science in Computer Science'?></h1>
                  </div>

                  <div class="border rounded container w-100 mx-auto p-5 mb-3">
                        <div class="row">
                              <div class="col">
                                    <div class="row text-center">
                                          <h4>College Year Level</h4>
                                    </div>
                                    <div class="row">
                                          <div class="col text-center">
                                                <select name="year" id="0" required>
                                                      <option value='1'>1st Year</option>";
                                                      <option value='2'>2nd Year</option>";
                                                      <option value='3'>3rd Year</option>";
                                                      <option value='4'>4th Year</option>";
                                                      <option value='5'>Extended</option>";
                                                </select>
                                          </div>
                                    </div>
                              </div>
                              <div class="col">
                                    <div class="row text-center">
                                          <h4>Section Number</h4>
                                    </div>
                                    <div class="row">
                                          <div class="col text-center">
                                                <input type="number" name="section" required
                                                      class="text-center"
                                                      placeholder=" Input Section Number" 
                                                max="1" />
                                          </div>
                                    </div>
                              </div>
                        </div>

                        <div class="row mt-3">
                              <div class="col text-center">
                                    <h4>School Year</h4>
                              </div>
                        </div>
                        <div class="row">
                              <div class="col text-center">
                                    <label>Start</label>
                              </div>
                              <div class="col text-center">
                                    <label>End</label>
                              </div>
                        </div>
                        <div class="row mb-5">
                              <div class="col text-center">
                                    <input type="number" name="sch_year_start"
                                          class="text-center" required
                                          placeholder=" Input Section Number" 
                                          value="" id="year-start"/>
                              </div>
                              <div class="col text-center">
                                    <input type="number" name="sch_year_end"
                                          class="text-center" required
                                          placeholder=" Input Section Number" 
                                          value="" id="year-end"/>
                              </div>
                        </div>
                        <script type="text/javascript">
                              var date = new Date();
                              var fullYear = date.getFullYear();
                              document.getElementById("year-start").setAttribute('value',fullYear);
                              document.getElementById("year-end").setAttribute('value',++fullYear);
                        </script>

                        <div class="row text-center">
                              <h4>Semester</h4>
                        </div>
                        <div class="row">
                              <div class="col text-center">
                                    <select name="semester" id="0">
                                          <option value='1'>1st Semester</option>";
                                          <option value='2'>2nd Semester</option>";
                                          <option value='3'>Mid Semester</option>";
                                    </select>
                              </div>
                        </div>

                        <div class="text-center mt-5">
                              <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="submit">Submit</button>
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