<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/header_template1.css">'."\n"
                  .'<link rel="stylesheet" href="./CSS/cardcss.css">'."\n";
      $titleName = "SIMS CS-Org - Webinars";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $id = $_GET["id"];
            $awarddata=mysqli_fetch_assoc(mysqli_query($db->con, "SELECT * FROM seminar_tb WHERE id=$id")); 
            
            $_SESSION['seminar'] = $awarddata['title'] ;
            include './templates/header_2.php';

            $title = $_SESSION['seminar'];
            
            $search_input = false;
            include './templates/back_tab.php';
      ?>

      <section>

            <div class="mb-2">
                  <div class=" p-1 text-center">
                        <img src="<?php echo (isset($awarddata['profile_filename']))?
                                    './Assets/profiles/'.$_SESSION['filename']=$awarddata['profile_filename']:
                                    "https://avatars.dicebear.com/api/bottts/".preg_replace('/\s+/', '', $awarddata['title']).".svg"?>"
                              alt="" class="shadow p-3 profile rounded border border-3" style="width: 300px; height: 400px; object-fit: cover;" >
                  </div>
            </div>

            <div class="p-5 mx-auto container shadow">
                  <div class="row text-center">
                        <h3><?php echo $awarddata['host'] ?></h3>
                  </div>
                  <div class="row">
                        <div class="col m-3 mb-0 ">
                              <h4>Date: <?php echo "January 4, 2021" ?></h4>
                        </div>
                        <div class="col m-2">
                        </div>
                  </div>
                  <div class="row text-center">
                        <h3>Description</h3>
                  </div>
                  <br>
                  <div class="row m-5">
                        <td style="display: block; height: 100px; overflow-y: auto"><?php
                              echo $awarddata['description'];
                              ?></td>
                  </div>
                  
            </div>
            <br>
            <div class="row container mx-auto  shadow border">
                  <div class="row m-3">
                        <div class="col">
                              <h4>Participants</h4>
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

      <div class="row w-100">

            <?php
                  include './templates/footer.php';


                  include_once './MetaScript/script.php';
            ?>
      </div>

</body>
</html>     