<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n"
            .'<link rel="stylesheet" href="./CSS/cardcss.css">'."\n";
      $titleName = "SIMS CS-Org - Class";

      include_once './MetaScript/meta.php'
?>

<body>

      <?php 
            $_SESSION['Class'] = $_GET['title'];

            $_SESSION['Student'] = null;
            
            include './SectionTemplate/header_2.php';

            include './MinorTemplate/search_tab.php';

            $title = $_GET['title'];
            $button = 3;
            include './MinorTemplate/back_tab.php'
      ?>

      <section class="cardscss">
            <div class=" pb-5 mb-5">
                  <div id="app" class="container-fluid text-center">
                        <?php for ($i=0; $i < 50; $i++) { ?>
                                    <a href="./studentInfo_page.php?name=Aspiras, Carlo&id=19-2100&section=<?php echo $_GET['title'] ?>" class="border btn text-center rounded m-3 p-0">
                                          <card data-image="./Assets/news/258538367_266892435276147_8137347319153813587_n.jpg" class="m-0">
                                                <h2 slot="header" class="fs-3 pop">Aspiras, Carlo</h2>
                                                <p slot="content">19-2100</p>
                                          </card>
                                    </a>
                                    
                                    <a href="./studentInfo_page.php?name=Calderon, Kathleen&id=19-2104&section=<?php echo $_GET['title'] ?>" class="border btn text-center rounded m-3 p-0">
                                          <card data-image="./Assets/news/257415000_1975091092659522_9073753297819881679_n.jpg" class="m-0">
                                                <h2 slot="header" class="fs-3 pop">Calderon, Kathleen</h2>
                                                <p slot="content">19-2104</p>
                                          </card>
                                    </a>
                                    <a href="./studentInfo_page.php?name=Dela Cruz, Andrei&id=19-2103&section=<?php echo $_GET['title'] ?>" class="border btn text-center rounded m-3 p-0">
                                          <card data-image="./Assets/news/news3.jpg" class="m-0">
                                                <h2 slot="header" class="fs-3 pop">Dela Cruz, Andrei</h2>
                                                <p slot="content">19-2103</p>
                                          </card>
                                    </a>
                                    <a href="./studentInfo_page.php?name=Valdez, Carl Xavier&id=19-2101&section=<?php echo $_GET['title'] ?>" class="border btn text-center rounded m-3 p-0">
                                          <card data-image="./Assets/news/carl.jpg" class="m-0">
                                                <h2 slot="header" class="fs-3 pop">Valdez, Carl Xavier</h2>
                                                <p slot="content">19-2101</p>
                                          </card>
                                    </a>
                        <?php }?>
                  </div>
            </div>
      </section>

      <?php 
            include './SectionTemplate/footer.php';


            include_once './MetaScript/script.php';
      ?>

</body>
</html>     