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

            if($_GET['use'] == "Update") $yearsection = $ys->getSpecificSchYear($_GET['id']);
?>
      <section>
            <form action="../_forms/update_add_sections_form.php?use=<?php echo $_GET['use']?>&id=<?php echo $_SESSION['section_id'] ?? 0 ?>" method="post" enctype="multipart/form-data">
                  <div class=" p-1 text-center">
                        <img src="<?php
                                    if($_GET['use'] == "Update"){
                                          echo (isset($yearsection['filename']))?
                                                '../Assets/profiles/'.$yearsection['filename']:
                                                "https://avatars.dicebear.com/api/identicon/".$yearsection['year'].$yearsection['semester'].$yearsection['section'].".svg";
                                    }
                                    else{
                                          unset($_SESSION['image'], $_SESSION['image_name']);
                                          echo "https://avatars.dicebear.com/api/identicon/initial.svg";
                                    }
                                    ?>" 
                              id='image' alt="" class="profile rounded border border-3" style="width: 300px; height: 400px; object-fit: cover;" >
                  </div>
                  <div class="p-1 text-center">
                        <input type="file" name="profile_img" onchange="readURL(this);" accept=".png,.jpg">
                  </div>

                  <br>
                  <div class="text-center">
                        <h1>Bachelor of Science in Computer Science</h1>
                  </div>

                  <div class="border rounded container w-100 mx-auto p-5 mb-3">
                        <div class="row">
                              <div class="col">
                                    <div class="row text-center">
                                          <h3>College Year Level</h3>
                                    </div>
                                    <div class="row">
                                          <div class="col text-center">
                                                <select name="year" id="0" class="w-50 text-center h5" style="height: 100%" required>
                                                      <option value='1' <?php if($_GET['use'] == "Update" && $yearsection['year'] == 1) echo 'selected'?>>1st Year</option>";
                                                      <option value='2' <?php if($_GET['use'] == "Update" && $yearsection['year'] == 2) echo 'selected'?>>2nd Year</option>";
                                                      <option value='3' <?php if($_GET['use'] == "Update" && $yearsection['year'] == 3) echo 'selected'?>>3rd Year</option>";
                                                      <option value='4' <?php if($_GET['use'] == "Update" && $yearsection['year'] == 4) echo 'selected'?>>4th Year</option>";
                                                      <option value='5' <?php if($_GET['use'] == "Update" && $yearsection['year'] == 5) echo 'selected'?>>Extended</option>";
                                                </select>
                                          </div>
                                    </div>
                              </div>
                              <div class="col">
                                    <div class="row text-center">
                                          <h3>Section Number</h3>
                                    </div>
                                    <div class="row">
                                          <div class="col text-center">
                                                <input type="number" name="section" required
                                                      class="text-center h5 p-1 w-50"
                                                      placeholder=" Input Section Number" 
                                                      value="<?php if($_GET['use'] == "Update") echo $yearsection['section']?>"/>
                                          </div>
                                    </div>
                              </div>
                        </div>

                        <div class="row">
                              <div class="col">
                                    <div class="row text-center">
                                          <h3>School Year</h3>
                                    </div>
                                    <div class="row">
                                          <div class="col text-center">
                                                <input type="number" name="sch_year_start"
                                                class="text-center h5 p-1 w-50" required
                                                placeholder=" Input Section Number" 
                                                value="<?php if($_GET['use'] == "Update") echo substr($yearsection['sch_year'], 0,4)?>" <?php if($_GET['use'] == "Add") echo 'id="year-start"'?>/>
                                          </div>
                                    </div>
                              </div>
                              <div class="col">
                                    <div class="row text-center">
                                          <h3>Semester</h3>
                                    </div>
                                    <div class="row">
                                          <div class="col text-center">
                                                <select name="semester" id="0" class="h5 w-50 text-center" style="height: 100%">
                                                      <option value='1' <?php if($_GET['use'] == "Update" && $yearsection['semester'] == 1) echo 'selected'?>>1st Semester</option>";
                                                      <option value='2' <?php if($_GET['use'] == "Update" && $yearsection['semester'] == 2) echo 'selected'?>>2nd Semester</option>";
                                                      <option value='3' <?php if($_GET['use'] == "Update" && $yearsection['semester'] == 3) echo 'selected'?>>Mid Semester</option>";
                                                </select>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <script type="text/javascript">
                              var date = new Date();
                              var fullYear = date.getFullYear();
                              document.getElementById("year-start").setAttribute('value',fullYear);
                        </script>

                        

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