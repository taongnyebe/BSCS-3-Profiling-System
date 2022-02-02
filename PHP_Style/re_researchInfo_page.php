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
            $reseachdata = $research->getSpecificResearch($id);
            
            $_SESSION['research'] = $reseachdata['title'] ;
            include './templates/header_2.php';

            $title = $_SESSION['research'];

            $search_input = true;
            include './templates/back_tab.php';
      ?>

      <section>

            <div class="mb-2">
                  <div class=" p-1 text-center">
                        <img src="<?php echo ($reseachdata['profile_filename'] != "")?
                                    './Assets/profiles/'.$_SESSION['filename']=$student_data['profile_filename']:
                                    "https://avatars.dicebear.com/api/bottts/".preg_replace('/\s+/', '', $reseachdata['title']).".svg"?>"
                              alt="" class="shadow p-3 profile rounded border border-3" style="width: 300px; height: 400px; object-fit: cover;" >
                  </div>
            </div>

            <div class="p-5 mx-auto container shadow">
                  <div class="row text-center">
                        <h2>Abstract</h2>
                  </div>
                  <br>
                  <div class="row">
                        <td style="display: block; height: 100px; overflow-y: auto"><?php
                              echo $reseachdata['abstract'];
                              ?></td>
                  </div>
            </div>
            <br>
            <div class="row container mx-auto  shadow border">
                  <div class="row">
                        <div class="col m-2 mb-0">
                              <h4>Published Date: <?php echo $reseachdata['publish_date'] ?></h4>
                        </div>
                        <div class="col m-2">
                        </div>
                  </div>
                  <div class="row m-3">
                        <div class="col">
                              <h4>Publishers</h4>
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