<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="../CSS/header_template1.css">'."\n"
            .'<link rel="stylesheet" href="../CSS/cardcss.css">'."\n";
      $titleName = "SIMS CS-Org - Activities";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['MainMenu'] = "activities";

            $_SESSION['Activities'] = null;

            include './templates/header_2.php';

            $title = "Activities";

            $add = "";
            $edit = "";
            $add_btn = $edit_btn = $search_input = $delete_btn = false;
            include './templates/back_tab.php';
      ?>
      <section class="cardscss"> &emsp;
            <div class="mb-5">
                  <div id="app" class="container">
                        <?php 
                              $cardName = array("A<br>W<br>A<br>R<br>D<br>S", " W&emsp; S<br>E &emsp; E<br>B &emsp; M<br>I &emsp; I<br>N &emsp; N<br>A &emsp; A<br>R &emsp; R", "C<br>O<br>M<br>P<br>E<br>T<br>I<br>T<br>I<br>O<br>N");
                              $cardSite = array("./a_act_awards_page.php", "./a_act_webinar_page.php", "./a_act_competition_page.php");
                              $cardIcon = array("../Assets/icons/awards_icon.png",
                                          '../Assets/icons/webinar_icon.png',
                                          '../Assets/icons/contest_icon.png');
                              for ($i=0; $i < count($cardName); $i++) { 
                        ?>
                              <a href="<?php echo $cardSite[$i] ?>" class="border btn rounded m-3 p-0">
                                    <card data-image="<?php echo $cardIcon[$i]?>" class="m-0">
                                          <h2 slot="header" class="fw-bold pop float-start pb-2 fs-5"><?php echo $cardName[$i] ?></h2>
                                          <p slot="content"></p>
                                    </card>
                              </a>
                  <?php }?>
            </div>
      </section>
      <?php
            include './templates/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>     