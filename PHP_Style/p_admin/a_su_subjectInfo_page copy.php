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
            $userdata=mysqli_fetch_assoc(mysqli_query($db->con,"SELECT * FROM subject_tb WHERE id='$id'"));
            
            $_SESSION['Subject'] = $userdata['code'].' - '.$userdata['title'] ;
            include './templates/header_2.php';

            $title = $_SESSION['Subject'];
            
            $add = "";
            $edit = "";
            $add_btn = $edit_btn = $search_input = $delete_btn = false;
            include './templates/back_tab.php';
      ?>

      <section style="height: 100vh">

            <div class="mb-2">
                  <div class=" p-1 text-center">
                        <img src="<?php echo ($student_data['profile_filename'] != "")?
                                    '../Assets/profiles/'.$_SESSION['filename']=$student_data['profile_filename']:
                                    "https://avatars.dicebear.com/api/".(($student_data['gender'])? "male": "female")."/".preg_replace('/\s+/', '_', $student_data['first_name']).".svg"?>"
                              alt="" class="profile rounded border border-3" style="width: 300px; height: 400px; object-fit: cover;" >
                  </div>
            </div>

            <div class="p-5 mx-auto container shadow">
                  <div class="row text-center">
                        <h2>Proffesors In charge</h2>
                  </div>
                  <br>
                  <div class="row">
                        <td style="display: block; height: 100px; overflow-y: auto"><?php
                              for ($i=0; $i < 10; $i++) { 
                                    echo "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit alias ducimus corporis earum, dolorem quaerat sint quam blanditiis. Voluptates molestiae, suscipit tenetur tempore facilis iste assumenda eaque minima reiciendis eos.";
                              }?></td>
                  </div>
            </div>
            <br>
            <div class="row container mx-auto">
                  <div class="col shadow border m-2">
                        <h4>Pre-requisite</h4>
                  </div>
                  <div class="col shadow border m-2">
                        <h4>Pre-requisite</h4>
                  </div>
            </div>
            
      </section>

      <?php
            include './templates/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>     