<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="../CSS/header_template1.css">'."\n"
                  .'<link rel="stylesheet" href="../CSS/cardcss.css">'."\n"
                  .'<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>'."\n"
                  .'<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>';
      $titleName = "SIMS CS-Org - Webinars";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $id = (isset($_GET["id"]))? $_GET["id"] : '';
            if (isset($_GET["id"])) $awarddata=mysqli_fetch_assoc(mysqli_query($db->con, "SELECT * FROM award_tb WHERE id=$id")); 
            
            $_SESSION['awards'] = (isset($_GET["id"]))? $awarddata['title'] : 'Add Awards';
            include './templates/header_2.php';

            $title = $_SESSION['awards'];
            
            $add = "";
            $edit = "";
            $datatypeDelete = 'research' ;
            $add_btn = $search_input = false; $edit_btn = $delete_btn = true;
            include './templates/back_tab.php';
      ?>

      <section>
            <form action="" method="post">
                  <div class="mb-2">
                        <div class=" p-1 text-center">
                              <img src="<?php if ($id != '') {  
                                                echo (isset($awarddata['profile_filename']))?
                                                      '../Assets/profiles/'.$_SESSION['filename']=$awarddata['profile_filename']:
                                                      "https://avatars.dicebear.com/api/bottts/".preg_replace('/\s+/', '', $awarddata['title']).".svg";
                                                } else 
                                                      echo '../Assets/placeholders/starting_profile.png'?>"
                                    id='image' alt="" class="shadow p-3 profile rounded border border-3" style="width: 300px; height: 400px; object-fit: cover;" >
                        </div>
                  </div>
                  <div class="p-1 text-center">
                        <input type="file" name="profile_img" onchange="readURL(this);" accept=".png,.jpg">
                  </div>
                  <br>
                  <div class="p-5 mx-auto container shadow">
                        <div class="row text-center">
                              <h2>Title</h2>
                        </div>
                        <div class="row text-center">
                              <input type="text" name="title" id="" class="h2 text-center">
                        </div>
                        <br>
                        <div class="row text-center">
                              <h3>Competition</h3>
                        </div>
                        <div class="row text-center">
                              <!-- competition drop down -->
                        </div>
                        <div class="row m-3">
                              <div class="col">
                                    <h4>Winners</h4>
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
                  <br>
                  <div class="row container mx-auto  shadow border">
                        <div class="row">
                              <div class="col m-3 mb-0 ">
                                    <h4>Date: <input type="text" name="" id="" value="<?php if ($id != '') echo $awarddata['date_awarded'] ?>" placeholder="YYYY-MM-DD"></h4>
                              </div>
                              <div class="col m-2">
                              </div>
                        </div>
                        <div class="row text-center">
                              <h3>Description</h3>
                        </div>
                        <br>
                        <div class="row pb-5">
                              <td style="display: block; height: 100px; overflow-y: auto">
                                    <textarea name="description" id="" cols="30" rows="10">
                                          <?php if ($id != '') echo $awarddata['description']; ?>
                                    </textarea>
                              </td>
                        </div>
                        <div class="text-end mb-5">
                              <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="submit">Submit</button>
                        </div>
                  </div>
            </form>
            
      </section>

      <div class="row w-100">

            <?php
                  include './templates/footer.php';


                  include_once './MetaScript/script.php';
            ?>
      </div>

</body>
</html>     