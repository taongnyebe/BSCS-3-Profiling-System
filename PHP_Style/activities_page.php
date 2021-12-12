<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/cardcss.css">'."\n";
      $titleName = "SIMS CS-Org - Activities";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['MainMenu'] = "activities";

            $_SESSION['Activities'] = null;

            include './SectionTemplate/header_2.php';

            $title = "Activities";
            $button = 1;
            include './MinorTemplate/back_tab.php';
      ?>
      <section class="cardscss"> &emsp;
            <div class="mb-5">
                  <div id="app" class="container">
                        <?php 
                              $cardName = array("A<br>W<br>A<br>R<br>D<br>S", " W&emsp; S<br>E &emsp; E<br>B &emsp; M<br>I &emsp; I<br>N &emsp; N<br>A &emsp; A<br>R &emsp; R", "C<br>O<br>M<br>P<br>E<br>T<br>I<br>T<br>I<br>O<br>N");
                              $cardSite = array("./awards_page.php", "./webinar_page.php", "./competition_page.php");
                              $cardIcon = array("https://nexus.leagueoflegends.com/wp-content/uploads/2020/01/CoverImage_xh4ey30pet5zkkpwz7g3.jpg",
                                          'https://images.unsplash.com/photo-1516321165247-4aa89a48be28?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fHdlYmluYXJ8ZW58MHx8MHx8&w=1000&q=80',
                                          'https://media.istockphoto.com/photos/computer-games-playing-place-picture-id1282649271?b=1&k=20&m=1282649271&s=170667a&w=0&h=aB2eJBEebmzouy1yKGuMuKjvBuphjtHUfJCeJmLVG8E=');
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
            include './SectionTemplate/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>     